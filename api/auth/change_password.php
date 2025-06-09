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

if (!isset($_POST['current_password']) || !isset($_POST['new_password']) || !isset($_POST['confirm_password'])) {
    $_SESSION['error'] = 'Visi lauki ir obligāti.';
    header('Location: ../../profile.php');
    exit;
}

$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

if ($new_password !== $confirm_password) {
    $_SESSION['error'] = 'Jaunās paroles nesakrīt.';
    header('Location: ../../profile.php');
    exit;
}

if (strlen($new_password) < 8) {
    $_SESSION['error'] = 'Jaunajai parolei jābūt vismaz 8 rakstzīmēm garai.';
    header('Location: ../../profile.php');
    exit;
}

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

// Verify current password
$stmt = $conn->prepare("SELECT password_hash FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!password_verify($current_password, $user['password_hash'])) {
    $_SESSION['error'] = 'Nepareiza pašreizējā parole.';
    header('Location: ../../profile.php');
    exit;
}

// Update password
$new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("UPDATE users SET password_hash = ? WHERE id = ?");
$stmt->bind_param("si", $new_password_hash, $_SESSION['user_id']);

if ($stmt->execute()) {
    $_SESSION['success'] = 'Parole veiksmīgi nomainīta.';
} else {
    $_SESSION['error'] = 'Kļūda mainot paroli.';
}

$stmt->close();
$conn->close();

header('Location: ../../profile.php');
exit; 