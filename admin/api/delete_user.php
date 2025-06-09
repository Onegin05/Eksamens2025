<?php
session_start();

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: ../../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['user_id'])) {
    $_SESSION['error'] = 'Nederīga pieprasījuma metode.';
    header('Location: ../index.php');
    exit;
}

$user_id = (int)$_POST['user_id'];

// Don't allow self-deletion
if ($user_id === $_SESSION['user_id']) {
    $_SESSION['error'] = 'Nevar dzēst savu kontu.';
    header('Location: ../index.php');
    exit;
}

$host = "localhost";
$user = "grobina1_cebotars";
$password = "pr4lpgCz@";
$dbname = "grobina1_cebotars";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    $_SESSION['error'] = 'Datubāzes kļūda.';
    header('Location: ../index.php');
    exit;
}

// Delete user
$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    $_SESSION['success'] = 'Lietotājs veiksmīgi dzēsts.';
} else {
    $_SESSION['error'] = 'Kļūda dzēšot lietotāju.';
}

$stmt->close();
$conn->close();

header('Location: ../index.php');
exit; 