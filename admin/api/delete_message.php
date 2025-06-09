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

// Delete the message
$delete_query = "DELETE FROM contact_messages WHERE id = ?";
$delete_stmt = $conn->prepare($delete_query);
$delete_stmt->bind_param("i", $message_id);

if ($delete_stmt->execute()) {
    if (isset($_POST['redirect']) && $_POST['redirect'] === 'true') {
        header('Location: ../index.php?tab=messages&deleted=true');
        exit;
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
    }
} else {
    if (isset($_POST['redirect']) && $_POST['redirect'] === 'true') {
        header('Location: ../index.php?tab=messages&error=delete_failed');
        exit;
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Failed to delete message']);
    }
}

$conn->close();
?> 