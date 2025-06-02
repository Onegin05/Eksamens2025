
<?php
// Common functions for the website

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function format_currency($amount) {
    return '€' . number_format($amount, 2, ',', ' ');
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function get_current_page() {
    return basename($_SERVER['PHP_SELF']);
}

function redirect($url) {
    header("Location: $url");
    exit();
}
?>
