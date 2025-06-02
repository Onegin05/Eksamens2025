
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

if (!$input) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid input data']);
    exit;
}

$userId = $_SESSION['user_id'];
$salary = floatval($input['salary'] ?? 0);
$otherIncome = floatval($input['otherIncome'] ?? 0);
$housing = floatval($input['housing'] ?? 0);
$food = floatval($input['food'] ?? 0);
$transport = floatval($input['transport'] ?? 0);
$utilities = floatval($input['utilities'] ?? 0);
$entertainment = floatval($input['entertainment'] ?? 0);
$otherExpenses = floatval($input['otherExpenses'] ?? 0);

$totalIncome = $salary + $otherIncome;
$totalExpenses = $housing + $food + $transport + $utilities + $entertainment + $otherExpenses;
$balance = $totalIncome - $totalExpenses;

try {
    $stmt = $pdo->prepare("INSERT INTO budget_calculations 
        (user_id, salary, other_income, housing, food, transport, utilities, entertainment, other_expenses, total_income, total_expenses, balance) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->execute([
        $userId, $salary, $otherIncome, $housing, $food, $transport, 
        $utilities, $entertainment, $otherExpenses, $totalIncome, $totalExpenses, $balance
    ]);

    echo json_encode([
        'success' => true,
        'id' => $pdo->lastInsertId(),
        'calculation' => [
            'totalIncome' => $totalIncome,
            'totalExpenses' => $totalExpenses,
            'balance' => $balance
        ]
    ]);

} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error']);
    error_log($e->getMessage());
}
?>
