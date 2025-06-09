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

// Debug: Check if we can connect to the database
echo "<!-- Debug: Database connection successful -->";

// Get all news items with author names
$sql = "SELECT n.*, CONCAT(u.first_name, ' ', u.last_name) as author_name 
        FROM news n 
        LEFT JOIN users u ON n.author_id = u.id 
        ORDER BY n.created_at DESC";

// Debug: Print the SQL query
echo "<!-- Debug: SQL Query: " . $sql . " -->";

$result = $conn->query($sql);

if (!$result) {
    die("Error fetching news: " . $conn->error);
}

// Debug: Check number of rows
echo "<!-- Debug: Number of news items found: " . $result->num_rows . " -->";

// Debug: Print first row if exists
if ($result->num_rows > 0) {
    $first_row = $result->fetch_assoc();
    echo "<!-- Debug: First news item: " . print_r($first_row, true) . " -->";
    // Reset the pointer back to the beginning
    $result->data_seek(0);
}
?>

<div class="min-h-screen flex flex-col">
    <main class="flex-grow container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold mb-12 text-center text-gray-800">Jaunumi</h1>
        
        <?php if ($result->num_rows > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while($row = $result->fetch_assoc()): ?>
                    <article class="group bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                        <?php if ($row['image_url']): ?>
                            <div class="relative h-56 overflow-hidden">
                                <img src="<?php echo htmlspecialchars($row['image_url']); ?>" 
                                     alt="<?php echo htmlspecialchars($row['title']); ?>"
                                     class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                            </div>
                        <?php endif; ?>
                        
                        <div class="p-6">
                            <h2 class="text-xl font-semibold mb-3 text-gray-800 group-hover:text-green-600 transition-colors">
                                <?php echo htmlspecialchars($row['title']); ?>
                            </h2>
                            
                            <div class="flex items-center text-sm text-gray-500 mb-4 space-x-4">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <?php echo htmlspecialchars($row['author_name']); ?>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <?php echo date('d.m.Y', strtotime($row['created_at'])); ?>
                                </div>
                            </div>
                            
                            <div class="relative">
                                <p class="text-gray-600 leading-relaxed mb-4 news-content" data-full-content="<?php echo htmlspecialchars(strip_tags($row['content'])); ?>">
                                    <?php 
                                    $content = strip_tags($row['content']);
                                    $isTruncated = strlen($content) > 150;
                                    echo $isTruncated ? substr($content, 0, 150) . '...' : $content;
                                    ?>
                                </p>
                                
                                <?php if ($isTruncated): ?>
                                    <div class="absolute bottom-0 left-0 right-0 h-12 bg-gradient-to-t from-white to-transparent fade-gradient"></div>
                                <?php endif; ?>
                            </div>

                            <?php if ($isTruncated): ?>
                                <button class="inline-flex items-center text-green-600 font-medium hover:text-green-700 transition-colors read-more-btn">
                                    Lasīt vairāk
                                    <svg class="w-4 h-4 ml-1 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-12">
                <p class="text-gray-600 text-lg">Nav pieejamu jaunumu.</p>
            </div>
        <?php endif; ?>
    </main>

    <?php require_once 'includes/footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const readMoreButtons = document.querySelectorAll('.read-more-btn');
            
            readMoreButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const article = this.closest('article');
                    const content = article.querySelector('.news-content');
                    const fadeGradient = article.querySelector('.fade-gradient');
                    const arrow = this.querySelector('svg');
                    
                    if (content.classList.contains('expanded')) {
                        // Collapse
                        content.textContent = content.dataset.fullContent.substring(0, 150) + '...';
                        content.classList.remove('expanded');
                        fadeGradient.classList.remove('hidden');
                        this.innerHTML = 'Lasīt vairāk <svg class="w-4 h-4 ml-1 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>';
                    } else {
                        // Expand
                        content.textContent = content.dataset.fullContent;
                        content.classList.add('expanded');
                        fadeGradient.classList.add('hidden');
                        this.innerHTML = 'Sakļaut <svg class="w-4 h-4 ml-1 transform rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>';
                    }
                });
            });
        });
    </script>
</div>
</body>
</html> 