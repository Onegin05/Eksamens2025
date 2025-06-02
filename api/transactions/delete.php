
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
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
    // Get transaction details for budget update
    $stmt = $pdo->prepare("SELECT * FROM transactions WHERE id = ? AND user_id = ?");
    $stmt->execute([$transactionId, $userId]);
    $transaction = $stmt->fetch();

    if (!$transaction) {
        http_response_code(404);
        echo json_encode(['error' => 'Transaction not found']);
        exit;
    }

    // Delete transaction
    $deleteStmt = $pdo->prepare("DELETE FROM transactions WHERE id = ? AND user_id = ?");
    $deleteStmt->execute([$transactionId, $userId]);

    // Update budget if it was an expense
    if ($transaction['type'] === 'expense') {
        $budgetStmt = $pdo->prepare("UPDATE budgets SET spent = spent - ? WHERE user_id = ? AND category = ?");
        $budgetStmt->execute([$transaction['amount'], $userId, $transaction['category']]);
    }

    echo json_encode(['success' => true]);

} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error']);
    error_log($e->getMessage());
}
?>
