
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

if (!$input || !isset($input['category']) || !isset($input['amount'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Category and amount are required']);
    exit;
}

$userId = $_SESSION['user_id'];
$category = $input['category'];
$amount = floatval($input['amount']);

try {
    // Calculate current spent amount for this category
    $spentStmt = $pdo->prepare("SELECT SUM(amount) as total_spent FROM transactions WHERE user_id = ? AND category = ? AND type = 'expense'");
    $spentStmt->execute([$userId, $category]);
    $spentResult = $spentStmt->fetch();
    $spent = $spentResult['total_spent'] ?? 0;

    $stmt = $pdo->prepare("INSERT INTO budgets (user_id, category, amount, spent) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE amount = VALUES(amount), spent = VALUES(spent)");
    $stmt->execute([$userId, $category, $amount, $spent]);

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
