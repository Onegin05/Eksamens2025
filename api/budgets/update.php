
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
    echo json_encode(['error' => 'Budget ID required']);
    exit;
}

$userId = $_SESSION['user_id'];
$budgetId = $input['id'];

try {
    $category = $input['category'] ?? null;
    $amount = isset($input['amount']) ? floatval($input['amount']) : null;

    $updateFields = [];
    $updateValues = [];

    if ($category !== null) {
        $updateFields[] = "category = ?";
        $updateValues[] = $category;
    }

    if ($amount !== null) {
        $updateFields[] = "amount = ?";
        $updateValues[] = $amount;
    }

    if (empty($updateFields)) {
        http_response_code(400);
        echo json_encode(['error' => 'No fields to update']);
        exit;
    }

    $updateValues[] = $budgetId;
    $updateValues[] = $userId;

    $stmt = $pdo->prepare("UPDATE budgets SET " . implode(", ", $updateFields) . " WHERE id = ? AND user_id = ?");
    $stmt->execute($updateValues);

    echo json_encode(['success' => true]);

} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error']);
    error_log($e->getMessage());
}
?>
