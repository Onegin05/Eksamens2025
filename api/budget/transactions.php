<?php
session_start();
header('Content-Type: application/json');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
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
    echo json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

// Set charset to utf8
$conn->set_charset("utf8");

// Handle different request methods
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Get transactions for the current month
        $year = isset($_GET['year']) ? (int)$_GET['year'] : (int)date('Y');
        $month = isset($_GET['month']) ? (int)$_GET['month'] : (int)date('m');
        
        $start_date = date('Y-m-01', strtotime("$year-$month-01"));
        $end_date = date('Y-m-t', strtotime("$year-$month-01"));
        
        // Log the query parameters
        error_log("Fetching transactions for user {$_SESSION['user_id']} between $start_date and $end_date");
        
        $stmt = $conn->prepare("
            SELECT 
                t.id,
                t.type,
                t.amount,
                t.description,
                t.transaction_date,
                c.name as category_name
            FROM budget_transactions t
            JOIN budget_categories c ON t.category_id = c.id
            WHERE t.user_id = ? AND t.transaction_date BETWEEN ? AND ?
            ORDER BY t.transaction_date DESC
        ");
        
        if (!$stmt) {
            error_log("Failed to prepare statement: " . $conn->error);
            http_response_code(500);
            echo json_encode(['error' => 'Failed to prepare statement: ' . $conn->error]);
            exit;
        }
        
        $stmt->bind_param("iss", $_SESSION['user_id'], $start_date, $end_date);
        
        if (!$stmt->execute()) {
            error_log("Failed to execute statement: " . $stmt->error);
            http_response_code(500);
            echo json_encode(['error' => 'Failed to execute statement: ' . $stmt->error]);
            exit;
        }
        
        $result = $stmt->get_result();
        $transactions = [];
        
        while ($row = $result->fetch_assoc()) {
            $transactions[] = $row;
        }
        
        error_log("Found " . count($transactions) . " transactions");
        
        echo json_encode(['success' => true, 'transactions' => $transactions]);
        break;
        
    case 'POST':
        // Add new transaction
        $data = json_decode(file_get_contents('php://input'), true);
        
        // Log received data
        error_log('Received data: ' . print_r($data, true));
        
        if (!isset($data['type']) || !isset($data['category_id']) || !isset($data['amount']) || !isset($data['transaction_date'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Missing required fields']);
            exit;
        }
        
        $stmt = $conn->prepare("
            INSERT INTO budget_transactions (user_id, category_id, type, amount, description, transaction_date)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        
        if (!$stmt) {
            error_log("Failed to prepare statement: " . $conn->error);
            http_response_code(500);
            echo json_encode(['error' => 'Failed to prepare statement: ' . $conn->error]);
            exit;
        }
        
        $stmt->bind_param(
            "iisdss",
            $_SESSION['user_id'],
            $data['category_id'],
            $data['type'],
            $data['amount'],
            $data['description'],
            $data['transaction_date']
        );
        
        if ($stmt->execute()) {
            $newId = $conn->insert_id;
            error_log("Successfully added transaction with ID: $newId");
            echo json_encode(['success' => true, 'id' => $newId]);
        } else {
            error_log("Failed to add transaction: " . $stmt->error);
            http_response_code(500);
            echo json_encode(['error' => 'Failed to add transaction: ' . $stmt->error]);
        }
        break;
        
    case 'DELETE':
        // Delete transaction
        $data = json_decode(file_get_contents('php://input'), true);
        
        if (!isset($data['id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Missing transaction ID']);
            exit;
        }
        
        $stmt = $conn->prepare("DELETE FROM budget_transactions WHERE id = ? AND user_id = ?");
        
        if (!$stmt) {
            error_log("Failed to prepare statement: " . $conn->error);
            http_response_code(500);
            echo json_encode(['error' => 'Failed to prepare statement: ' . $conn->error]);
            exit;
        }
        
        $stmt->bind_param("ii", $data['id'], $_SESSION['user_id']);
        
        if ($stmt->execute()) {
            error_log("Successfully deleted transaction ID: {$data['id']}");
            echo json_encode(['success' => true]);
        } else {
            error_log("Failed to delete transaction: " . $stmt->error);
            http_response_code(500);
            echo json_encode(['error' => 'Failed to delete transaction: ' . $stmt->error]);
        }
        break;
        
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}

$conn->close();
?> 