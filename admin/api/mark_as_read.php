<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

// Check if message_id is provided
if (!isset($_POST['message_id'])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Message ID is required']);
    exit;
}

$message_id = (int)$_POST['message_id'];

// Database connection
$host = "localhost";
$user = "grobina1_cebotars";
$password = "pr4lpgCz@";
$dbname = "grobina1_cebotars";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

// Get current read status
$check_query = "SELECT is_read FROM contact_messages WHERE id = ?";
$check_stmt = $conn->prepare($check_query);
$check_stmt->bind_param("i", $message_id);
$check_stmt->execute();
$result = $check_stmt->get_result();
$message = $result->fetch_assoc();

if (!$message) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Message not found']);
    exit;
}

// Toggle read status
$new_status = !$message['is_read'];
$update_query = "UPDATE contact_messages SET is_read = ? WHERE id = ?";
$update_stmt = $conn->prepare($update_query);
$update_stmt->bind_param("ii", $new_status, $message_id);

if ($update_stmt->execute()) {
    if (isset($_POST['redirect']) && $_POST['redirect'] === 'true') {
        header('Location: ../index.php?tab=messages&marked=true');
        exit;
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'is_read' => $new_status]);
    }
} else {
    if (isset($_POST['redirect']) && $_POST['redirect'] === 'true') {
        header('Location: ../index.php?tab=messages&error=mark_failed');
        exit;
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Failed to update message status']);
    }
}

$conn->close();
?> 