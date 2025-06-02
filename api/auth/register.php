<?php
header('Content-Type: application/json');

// Настройки подключения к БД — поправь под свой хостинг
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

// Проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["error" => "Method not allowed"]);
    exit;
}

// Получаем данные из $_POST (а не из JSON, т.к. форма обычная)
if (
    !isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['password-confirm'])
) {
    http_response_code(400);
    echo json_encode(["error" => "Missing required fields"]);
    exit;
}

// Разбиваем имя на firstName и lastName (пример простой, можно лучше)
$fullName = trim($_POST['name']);
$nameParts = explode(' ', $fullName, 2);
$firstName = $nameParts[0];
$lastName = isset($nameParts[1]) ? $nameParts[1] : '';

$email = trim($_POST['email']);
$password = $_POST['password'];
$passwordConfirm = $_POST['password-confirm'];

if ($password !== $passwordConfirm) {
    http_response_code(400);
    echo json_encode(["error" => "Passwords do not match"]);
    exit;
}

if (strlen($password) < 8) {
    http_response_code(400);
    echo json_encode(["error" => "Password too short"]);
    exit;
}

// Проверяем уникальность email
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    http_response_code(409);
    echo json_encode(["error" => "Email already exists"]);
    $stmt->close();
    exit;
}
$stmt->close();

// Хешируем пароль
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Вставляем в БД
$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password_hash) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $firstName, $lastName, $email, $passwordHash);

if ($stmt->execute()) {
    $userName = urlencode($firstName . " " . $lastName);
    header("Location: ../../register.php?success=1&name=$userName");
    exit;
} else {
    http_response_code(500);
    echo json_encode(["error" => "Failed to insert user"]);
}

$stmt->close();
$conn->close();
