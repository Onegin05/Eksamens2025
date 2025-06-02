
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

session_start();
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

require_once '../../config/database.php';

$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Transaction ID required']);
    exit;
}

$userId = $_SESSION['user_id'];
$transactionId = $input['id'];

try {
    // Get original transaction for budget updates
    $stmt = $pdo->prepare("SELECT * FROM transactions WHERE id = ? AND user_id = ?");
    $stmt->execute([$transactionId, $userId]);
    $originalTransaction = $stmt->fetch();

    if (!$originalTransaction) {
        http_response_code(404);
        echo json_encode(['error' => 'Transaction not found']);
        exit;
    }

    // Update transaction
    $type = $input['type'] ?? $originalTransaction['type'];
    $category = $input['category'] ?? $originalTransaction['category'];
    $amount = isset($input['amount']) ? floatval($input['amount']) : $originalTransaction['amount'];
    $description = $input['description'] ?? $originalTransaction['description'];
    $transactionDate = $input['date'] ?? $originalTransaction['transaction_date'];

    $updateStmt = $pdo->prepare("UPDATE transactions SET type = ?, category = ?, amount = ?, description = ?, transaction_date = ? WHERE id = ? AND user_id = ?");
    $updateStmt->execute([$type, $category, $amount, $description, $transactionDate, $transactionId, $userId]);

    // Update budget spending if necessary
    if ($originalTransaction['type'] === 'expense') {
        // Subtract original amount
        $budgetStmt = $pdo->prepare("UPDATE budgets SET spent = spent - ? WHERE user_id = ? AND category = ?");
        $budgetStmt->execute([$originalTransaction['amount'], $userId, $originalTransaction['category']]);
    }

    if ($type === 'expense') {
        // Add new amount
        $budgetStmt = $pdo->prepare("UPDATE budgets SET spent = spent + ? WHERE user_id = ? AND category = ?");
        $budgetStmt->execute([$amount, $userId, $category]);
    }

    echo json_encode(['success' => true]);

} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error']);
    error_log($e->getMessage());
}
?>
