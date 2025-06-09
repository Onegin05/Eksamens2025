<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'error' => 'Not authorized']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Invalid data format']);
    exit;
}

// Database connection
$host = "localhost";
$user = "grobina1_cebotars";
$password = "pr4lpgCz@";
$dbname = "grobina1_cebotars";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Database connection failed']);
    exit;
}

// Prepare the data
$user_id = $_SESSION['user_id'];
$salary = isset($data['salary']) ? (float)$data['salary'] : 0;
$other_income = isset($data['other_income']) ? (float)$data['other_income'] : 0;
$housing = isset($data['housing']) ? (float)$data['housing'] : 0;
$food = isset($data['food']) ? (float)$data['food'] : 0;
$transport = isset($data['transport']) ? (float)$data['transport'] : 0;
$utilities = isset($data['utilities']) ? (float)$data['utilities'] : 0;
$entertainment = isset($data['entertainment']) ? (float)$data['entertainment'] : 0;
$other_expenses = isset($data['other_expenses']) ? (float)$data['other_expenses'] : 0;

// Calculate totals
$total_income = $salary + $other_income;
$total_expenses = $housing + $food + $transport + $utilities + $entertainment + $other_expenses;
$balance = $total_income - $total_expenses;

// Check if user already has a budget entry
$stmt = $conn->prepare("SELECT id FROM budget_calculations WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update existing entry
    $stmt = $conn->prepare("UPDATE budget_calculations SET 
        salary = ?, 
        other_income = ?, 
        housing = ?, 
        food = ?, 
        transport = ?, 
        utilities = ?, 
        entertainment = ?, 
        other_expenses = ?, 
        total_income = ?, 
        total_expenses = ?, 
        balance = ? 
        WHERE user_id = ?");
    
    $stmt->bind_param("dddddddddddi", 
        $salary, 
        $other_income, 
        $housing, 
        $food, 
        $transport, 
        $utilities, 
        $entertainment, 
        $other_expenses, 
        $total_income, 
        $total_expenses, 
        $balance, 
        $user_id
    );
} else {
    // Insert new entry
    $stmt = $conn->prepare("INSERT INTO budget_calculations 
        (user_id, salary, other_income, housing, food, transport, utilities, entertainment, other_expenses, total_income, total_expenses, balance) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("iddddddddddd", 
        $user_id, 
        $salary, 
        $other_income, 
        $housing, 
        $food, 
        $transport, 
        $utilities, 
        $entertainment, 
        $other_expenses, 
        $total_income, 
        $total_expenses, 
        $balance
    );
}

if ($stmt->execute()) {
    echo json_encode([
        'success' => true,
        'message' => 'Budget data saved successfully',
        'data' => [
            'total_income' => $total_income,
            'total_expenses' => $total_expenses,
            'balance' => $balance
        ]
    ]);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Failed to save budget data']);
}

$stmt->close();
$conn->close(); 