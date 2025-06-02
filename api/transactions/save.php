
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
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

if (!$input || !isset($input['type']) || !isset($input['category']) || !isset($input['amount'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

$userId = $_SESSION['user_id'];
$type = $input['type'];
$category = $input['category'];
$amount = floatval($input['amount']);
$description = $input['description'] ?? '';
$transactionDate = $input['date'] ?? date('Y-m-d');

try {
    $stmt = $pdo->prepare("INSERT INTO transactions (user_id, type, category, amount, description, transaction_date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$userId, $type, $category, $amount, $description, $transactionDate]);

    // Update budget spending if it's an expense
    if ($type === 'expense') {
        $updateStmt = $pdo->prepare("UPDATE budgets SET spent = spent + ? WHERE user_id = ? AND category = ?");
        $updateStmt->execute([$amount, $userId, $category]);
    }

    echo json_encode([
        'success' => true,
        'id' => $pdo->lastInsertId()
    ]);

} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error']);
    error_log($e->getMessage());
}
?>
