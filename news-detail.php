<?php
session_start();

// Database connection
$host = "localhost";
$user = "grobina1_cebotars";
$password = "pr4lpgCz@";
$dbname = "grobina1_cebotars";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8
$conn->set_charset("utf8");

require_once 'includes/header.php';

// Check if news ID is provided
if (!isset($_GET['id'])) {
    header('Location: news.php');
    exit();
}

$news_id = (int)$_GET['id'];

// Get news item with author name
$sql = "SELECT n.*, u.username as author_name 
        FROM news n 
        LEFT JOIN users u ON n.author_id = u.id 
        WHERE n.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $news_id);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Error fetching news: " . $conn->error);
}

$news = $result->fetch_assoc();

if (!$news) {
    header('Location: news.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($news['title']); ?> - ZaļāAugsme</title>
</head>
<body>
    <main class="container mx-auto px-4 py-8">
        <article class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($news['title']); ?></h1>
            
            <div class="text-gray-600 text-sm mb-6">
                <p>Autors: <?php echo htmlspecialchars($news['author_name']); ?></p>
                <p>Publicēts: <?php echo date('d.m.Y H:i', strtotime($news['created_at'])); ?></p>
            </div>
            
            <?php if ($news['image_url']): ?>
                <img src="<?php echo htmlspecialchars($news['image_url']); ?>" 
                     alt="<?php echo htmlspecialchars($news['title']); ?>"
                     class="w-full h-96 object-cover rounded-lg mb-6">
            <?php endif; ?>
            
            <div class="prose max-w-none">
                <?php echo nl2br(htmlspecialchars($news['content'])); ?>
            </div>
            
            <div class="mt-8">
                <a href="news.php" 
                   class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition-colors">
                    Atpakaļ uz jaunumiem
                </a>
            </div>
        </article>
    </main>

<?php require_once 'includes/footer.php'; ?>
</body>
</html> 