<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../profile.php');
    exit;
}

if (!isset($_FILES['avatar']) || $_FILES['avatar']['error'] !== UPLOAD_ERR_OK) {
    $_SESSION['error'] = 'Kļūda augšupielādējot bildi.';
    header('Location: ../../profile.php');
    exit;
}

$file = $_FILES['avatar'];
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
$max_size = 5 * 1024 * 1024; // 5MB

if (!in_array($file['type'], $allowed_types)) {
    $_SESSION['error'] = 'Atļautie failu formāti: JPG, PNG, GIF';
    header('Location: ../../profile.php');
    exit;
}

if ($file['size'] > $max_size) {
    $_SESSION['error'] = 'Faila izmērs nedrīkst pārsniegt 5MB';
    header('Location: ../../profile.php');
    exit;
}

// Create uploads directory if it doesn't exist
$upload_dir = '../../uploads/avatars/';
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// Generate unique filename
$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
$filename = uniqid('avatar_') . '.' . $extension;
$filepath = $upload_dir . $filename;

// Move uploaded file
if (!move_uploaded_file($file['tmp_name'], $filepath)) {
    $_SESSION['error'] = 'Kļūda saglabājot failu.';
    header('Location: ../../profile.php');
    exit;
}

// Update database
$host = "localhost";
$user = "grobina1_cebotars";
$password = "pr4lpgCz@";
$dbname = "grobina1_cebotars";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    $_SESSION['error'] = 'Datubāzes kļūda.';
    header('Location: ../../profile.php');
    exit;
}

$relative_path = 'uploads/avatars/' . $filename;
$stmt = $conn->prepare("UPDATE users SET avatar_path = ? WHERE id = ?");
$stmt->bind_param("si", $relative_path, $_SESSION['user_id']);

if ($stmt->execute()) {
    $_SESSION['avatar_path'] = $relative_path;
    $_SESSION['success'] = 'Profila bilde veiksmīgi atjaunināta.';
} else {
    $_SESSION['error'] = 'Kļūda atjauninot profila bildi.';
}

$stmt->close();
$conn->close();

header('Location: ../../profile.php');
exit; 