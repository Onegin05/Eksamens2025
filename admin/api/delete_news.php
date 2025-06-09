<?php
session_start();

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: ../../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['news_id'])) {
    header('Location: ../index.php?tab=news');
    exit;
}

$news_id = (int)$_POST['news_id'];

// Database connection
$host = "localhost";
$user = "grobina1_cebotars";
$password = "pr4lpgCz@";
$dbname = "grobina1_cebotars";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    $_SESSION['error'] = "Connection failed: " . $conn->connect_error;
    header('Location: ../index.php?tab=news');
    exit;
}

// Delete the news item
$sql = "DELETE FROM news WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $news_id);

if ($stmt->execute()) {
    $_SESSION['success'] = "Jaunums veiksmīgi dzēsts!";
} else {
    $_SESSION['error'] = "Kļūda dzēšot jaunumu: " . $conn->error;
}

$conn->close();
header('Location: ../index.php?tab=news');
exit; 