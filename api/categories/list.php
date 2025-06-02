
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

require_once '../../config/database.php';

try {
    $stmt = $pdo->prepare("SELECT * FROM categories ORDER BY type, name");
    $stmt->execute();
    $categories = $stmt->fetchAll();

    $categoriesByType = [
        'income' => [],
        'expense' => []
    ];

    foreach ($categories as $category) {
        $categoriesByType[$category['type']][] = $category['name'];
    }

    echo json_encode([
        'success' => true,
        'categories' => $categoriesByType
    ]);

} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error']);
    error_log($e->getMessage());
}
?>
