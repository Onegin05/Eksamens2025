<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'Nav autorizēts']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Nederīga pieprasījuma metode']);
    exit;
}

$required_fields = ['type', 'category_id', 'amount', 'date', 'description'];
foreach ($required_fields as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
        echo json_encode(['success' => false, 'error' => 'Trūkst obligātu lauku']);
        exit;
    }
}

$type = $_POST['type'];
$category_id = (int)$_POST['category_id'];
$amount = (float)$_POST['amount'];
$date = $_POST['date'];
$description = trim($_POST['description']);

if (!in_array($type, ['income', 'expense'])) {
    echo json_encode(['success' => false, 'error' => 'Nederīgs ieraksta tips']);
    exit;
}

if ($amount <= 0) {
    echo json_encode(['success' => false, 'error' => 'Summai jābūt lielākai par 0']);
    exit;
}

// Database connection
$host = "localhost";
$user = "grobina1_cebotars";
$password = "pr4lpgCz@";
$dbname = "grobina1_cebotars";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Datubāzes savienojuma kļūda']);
    exit;
}

// Verify category exists
$stmt = $conn->prepare("SELECT id FROM budget_categories WHERE id = ?");
$stmt->bind_param("i", $category_id);
$stmt->execute();
if ($stmt->get_result()->num_rows === 0) {
    echo json_encode(['success' => false, 'error' => 'Nederīga kategorija']);
    exit;
}

// Insert entry
$stmt = $conn->prepare("INSERT INTO budget_entries (user_id, type, category_id, amount, date, description) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isidss", $_SESSION['user_id'], $type, $category_id, $amount, $date, $description);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Kļūda saglabājot ierakstu']);
}

$stmt->close();
$conn->close(); 