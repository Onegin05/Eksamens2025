<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: ../login.php');
    exit;
}

// Database connection
$host = "localhost";
$user = "grobina1_cebotars";
$password = "pr4lpgCz@";
$dbname = "grobina1_cebotars";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$news = [
    'id' => '',
    'title' => '',
    'content' => '',
    'image_url' => ''
];

// If editing existing news
if (isset($_GET['id'])) {
    $news_id = (int)$_GET['id'];
    $sql = "SELECT * FROM news WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $news_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $news = $result->fetch_assoc();
    } else {
        header('Location: index.php?tab=news');
        exit;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $image_url = trim($_POST['image_url']);
    
    if (empty($title) || empty($content)) {
        $_SESSION['error'] = "Virsraksts un saturs ir obligāti lauki.";
    } else {
        if (isset($_GET['id'])) {
            // Update existing news
            $sql = "UPDATE news SET title = ?, content = ?, image_url = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssi', $title, $content, $image_url, $news_id);
        } else {
            // Insert new news
            $sql = "INSERT INTO news (title, content, image_url, author_id) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssi', $title, $content, $image_url, $_SESSION['user_id']);
        }
        
        if ($stmt->execute()) {
            $_SESSION['success'] = isset($_GET['id']) ? "Jaunums veiksmīgi atjaunināts!" : "Jaunums veiksmīgi pievienots!";
            header('Location: index.php?tab=news');
            exit;
        } else {
            $_SESSION['error'] = "Kļūda saglabājot jaunumu: " . $conn->error;
        }
    }
}

// Only start output after all potential redirects
$page_title = "Jaunumu rediģēšana - ZaļāAugsme";
include '../includes/header.php';
?>

<main class="flex-grow">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    <?php echo isset($_GET['id']) ? 'Rediģēt jaunumu' : 'Pievienot jaunu jaunumu'; ?>
                </h3>
            </div>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="px-4 py-3 bg-red-50 border-b border-red-200">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800">
                                <?php 
                                echo htmlspecialchars($_SESSION['error']);
                                unset($_SESSION['error']);
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                <form action="" method="POST" class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Virsraksts
                        </label>
                        <div class="mt-1">
                            <input type="text" name="title" id="title" 
                                   value="<?php echo htmlspecialchars($news['title']); ?>"
                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                   required>
                        </div>
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">
                            Saturs
                        </label>
                        <div class="mt-1">
                            <textarea name="content" id="content" rows="10"
                                      class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                      required><?php echo htmlspecialchars($news['content']); ?></textarea>
                        </div>
                    </div>

                    <div>
                        <label for="image_url" class="block text-sm font-medium text-gray-700">
                            Attēla URL
                        </label>
                        <div class="mt-1">
                            <input type="url" name="image_url" id="image_url" 
                                   value="<?php echo htmlspecialchars($news['image_url']); ?>"
                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="index.php?tab=news" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Atcelt
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <?php echo isset($_GET['id']) ? 'Saglabāt izmaiņas' : 'Pievienot jaunumu'; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?> 