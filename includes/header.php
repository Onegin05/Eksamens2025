<?php
include_once __DIR__ . '/functions.php';

// Define the base URL
$base_url = '/3pt1/cebotars/ZalaAugsmeCebotars/';
?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'ZaļāAugsme'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="<?php echo $base_url; ?>index.php" class="text-2xl font-bold text-green-600">ZaļāAugsme</a>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="<?php echo $base_url; ?>index.php" class="<?php echo get_current_page() === 'index.php' ? 'border-green-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'; ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Sākums
                        </a>
                        <a href="<?php echo $base_url; ?>budget.php" class="<?php echo get_current_page() === 'budget.php' ? 'border-green-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'; ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Budžets
                        </a>
                        <a href="<?php echo $base_url; ?>news.php" class="<?php echo get_current_page() === 'news.php' ? 'border-green-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'; ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Jaunumi
                        </a>
                        <a href="<?php echo $base_url; ?>about.php" class="<?php echo get_current_page() === 'about.php' ? 'border-green-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'; ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Par mums
                        </a>
                        
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <div class="ml-3 relative">
                            <div class="flex items-center space-x-4">
                                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                                    <a href="<?php echo $base_url; ?>admin/index.php" class="text-gray-500 hover:text-gray-700">
                                        <i class="fas fa-cog"></i> Admin
                                    </a>
                                <?php endif; ?>
                                <a href="<?php echo $base_url; ?>profile.php" class="text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-user"></i> Profils
                                </a>
                                <a href="<?php echo $base_url; ?>api/auth/logout.php" class="text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-sign-out-alt"></i> Iziet
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="flex items-center space-x-4">
                            <a href="<?php echo $base_url; ?>login.php" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-sign-in-alt"></i> Ienākt
                            </a>
                            <a href="<?php echo $base_url; ?>register.php" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-user-plus"></i> Reģistrēties
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Atvērt galveno izvēlni</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="sm:hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="<?php echo $base_url; ?>index.php" class="<?php echo get_current_page() === 'index.php' ? 'bg-green-50 border-green-500 text-green-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700'; ?> block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    Sākums
                </a>
                <a href="<?php echo $base_url; ?>budget.php" class="<?php echo get_current_page() === 'budget.php' ? 'bg-green-50 border-green-500 text-green-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700'; ?> block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    Budžets
                </a>
                <a href="<?php echo $base_url; ?>news.php" class="<?php echo get_current_page() === 'news.php' ? 'bg-green-50 border-green-500 text-green-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700'; ?> block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    Jaunumi
                </a>
                <a href="<?php echo $base_url; ?>about.php" class="<?php echo get_current_page() === 'about.php' ? 'bg-green-50 border-green-500 text-green-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700'; ?> block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    Par mums
                </a>
                <a href="<?php echo $base_url; ?>careers.php" class="<?php echo get_current_page() === 'careers.php' ? 'bg-green-50 border-green-500 text-green-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700'; ?> block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    Karjera
                </a>
                <a href="<?php echo $base_url; ?>faq.php" class="<?php echo get_current_page() === 'faq.php' ? 'bg-green-50 border-green-500 text-green-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700'; ?> block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    FAQ
                </a>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-200">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="space-y-1">
                        <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                            <a href="<?php echo $base_url; ?>admin/index.php" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                                <i class="fas fa-cog"></i> Admin
                            </a>
                        <?php endif; ?>
                        <a href="<?php echo $base_url; ?>profile.php" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                            <i class="fas fa-user"></i> Profils
                        </a>
                        <a href="<?php echo $base_url; ?>api/auth/logout.php" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                            <i class="fas fa-sign-out-alt"></i> Iziet
                        </a>
                    </div>
                <?php else: ?>
                    <div class="space-y-1">
                        <a href="<?php echo $base_url; ?>login.php" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                            <i class="fas fa-sign-in-alt"></i> Ienākt
                        </a>
                        <a href="<?php echo $base_url; ?>register.php" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                            <i class="fas fa-user-plus"></i> Reģistrēties
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</body>
</html>
