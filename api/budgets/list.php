
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
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

$userId = $_SESSION['user_id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM budgets WHERE user_id = ? ORDER BY category");
    $stmt->execute([$userId]);
    $budgets = $stmt->fetchAll();

    echo json_encode([
        'success' => true,
        'budgets' => $budgets
    ]);

} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error']);
    error_log($e->getMessage());
}
?>
