
<?php
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'ZaļāAugsme Finanšu Pakalpojumi'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#16a34a',
                        secondary: '#dc2626'
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen flex flex-col bg-white">
    <!-- Navbar -->
    <header class="sticky top-0 z-50 w-full backdrop-blur-sm bg-white/80 border-b border-gray-200">
        <div class="container flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8 mx-auto">
            <a href="index.php" class="flex items-center gap-2">
                <div class="bg-gradient-to-r from-green-500 to-green-600 p-2 rounded-lg">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <span class="text-xl font-bold text-gray-800">ZaļāAugsme</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-8">
                <?php $current_page = get_current_page(); ?>
                <a href="index.php" class="text-gray-600 hover:text-green-600 transition-colors <?php echo $current_page == 'index.php' ? 'text-green-600 font-medium' : ''; ?>">Sākums</a>
                <a href="calculator.php" class="text-gray-600 hover:text-green-600 transition-colors <?php echo $current_page == 'calculator.php' ? 'text-green-600 font-medium' : ''; ?>">Kalkulators</a>
                <a href="about.php" class="text-gray-600 hover:text-green-600 transition-colors <?php echo $current_page == 'about.php' ? 'text-green-600 font-medium' : ''; ?>">Par mums</a>
                <a href="tools.php" class="text-gray-600 hover:text-green-600 transition-colors <?php echo $current_page == 'tools.php' ? 'text-green-600 font-medium' : ''; ?>">Rīki</a>
                <a href="tips.php" class="text-gray-600 hover:text-green-600 transition-colors <?php echo $current_page == 'tips.php' ? 'text-green-600 font-medium' : ''; ?>">Padomi</a>
                <a href="blog.php" class="text-gray-600 hover:text-green-600 transition-colors <?php echo $current_page == 'blog.php' ? 'text-green-600 font-medium' : ''; ?>">Blogs</a>
            </nav>

            <!-- Mobile Menu Button -->
            <div class="flex md:hidden">
                <button id="mobile-menu-btn" class="p-2 text-gray-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- User Actions -->
            <div class="hidden md:flex items-center gap-3">
                <a href="login.php" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">Ieiet</a>
                <a href="register.php" class="px-4 py-2 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg hover:from-green-700 hover:to-green-800 transition-all">Reģistrēties</a>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="md:hidden bg-white border-b border-gray-200 hidden">
            <div class="container py-4 mx-auto px-4">
                <nav class="flex flex-col space-y-2">
                    <a href="index.php" class="py-2 px-4 rounded-md text-gray-600 hover:bg-gray-50 <?php echo $current_page == 'index.php' ? 'bg-green-50 text-green-600 font-medium' : ''; ?>">Sākums</a>
                    <a href="calculator.php" class="py-2 px-4 rounded-md text-gray-600 hover:bg-gray-50 <?php echo $current_page == 'calculator.php' ? 'bg-green-50 text-green-600 font-medium' : ''; ?>">Kalkulators</a>
                    <a href="about.php" class="py-2 px-4 rounded-md text-gray-600 hover:bg-gray-50 <?php echo $current_page == 'about.php' ? 'bg-green-50 text-green-600 font-medium' : ''; ?>">Par mums</a>
                    <a href="tools.php" class="py-2 px-4 rounded-md text-gray-600 hover:bg-gray-50 <?php echo $current_page == 'tools.php' ? 'bg-green-50 text-green-600 font-medium' : ''; ?>">Rīki</a>
                    <a href="tips.php" class="py-2 px-4 rounded-md text-gray-600 hover:bg-gray-50 <?php echo $current_page == 'tips.php' ? 'bg-green-50 text-green-600 font-medium' : ''; ?>">Padomi</a>
                    <a href="blog.php" class="py-2 px-4 rounded-md text-gray-600 hover:bg-gray-50 <?php echo $current_page == 'blog.php' ? 'bg-green-50 text-green-600 font-medium' : ''; ?>">Blogs</a>
                </nav>
                <div class="flex gap-2 mt-4">
                    <a href="login.php" class="w-full text-center py-2 px-4 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">Ieiet</a>
                    <a href="register.php" class="w-full text-center py-2 px-4 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg hover:from-green-700 hover:to-green-800 transition-all">Reģistrēties</a>
                </div>
            </div>
        </div>
    </header>
