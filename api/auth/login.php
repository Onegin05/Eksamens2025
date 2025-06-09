<?php
header('Content-Type: application/json');

// Database connection settings
$host = "localhost";
$user = "grobina1_cebotars";
$password = "pr4lpgCz@";
$dbname = "grobina1_cebotars";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

// Check request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["error" => "Method not allowed"]);
    exit;
}

// Get data from POST
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    http_response_code(400);
    echo json_encode(["error" => "Missing required fields"]);
    exit;
}

$email = trim($_POST['email']);
$password = $_POST['password'];

// Get user from database
$stmt = $conn->prepare("SELECT id, first_name, last_name, password_hash, is_admin FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    http_response_code(401);
    echo json_encode(["error" => "Invalid email or password"]);
    exit;
}

$user = $result->fetch_assoc();

// Verify password
if (!password_verify($password, $user['password_hash'])) {
    http_response_code(401);
    echo json_encode(["error" => "Invalid email or password"]);
    exit;
}

// Start session and set user data
session_start();
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
$_SESSION['user_email'] = $email;
$_SESSION['is_admin'] = (bool)$user['is_admin'];

// Return success response
echo json_encode([
    "success" => true,
    "message" => "Login successful",
    "user" => [
        "name" => $_SESSION['user_name'],
        "email" => $_SESSION['user_email'],
        "is_admin" => $_SESSION['is_admin']
    ]
]);

$stmt->close();
$conn->close();
