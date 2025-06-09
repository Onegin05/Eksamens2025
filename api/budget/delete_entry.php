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

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id']) || !is_numeric($data['id'])) {
    echo json_encode(['success' => false, 'error' => 'Nederīgs ieraksta ID']);
    exit;
}

$entry_id = (int)$data['id'];

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

// Verify entry belongs to user
$stmt = $conn->prepare("SELECT id FROM budget_entries WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $entry_id, $_SESSION['user_id']);
$stmt->execute();
if ($stmt->get_result()->num_rows === 0) {
    echo json_encode(['success' => false, 'error' => 'Ieraksts nav atrasts']);
    exit;
}

// Delete entry
$stmt = $conn->prepare("DELETE FROM budget_entries WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $entry_id, $_SESSION['user_id']);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Kļūda dzēšot ierakstu']);
}

$stmt->close();
$conn->close(); 