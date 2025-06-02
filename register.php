<?php
session_start();
$page_title = "Reģistrēties - ZaļāAugsme";
include 'includes/header.php';

// Проверяем, пришёл ли параметр успеха и имя пользователя из URL
$successMessage = '';
if (isset($_GET['success']) && $_GET['success'] == '1' && isset($_GET['name'])) {
    $name = htmlspecialchars(urldecode($_GET['name']));
    $successMessage = "Reģistrācija bija veiksmīga! Laipni lūdzam, $name.";
}
?>

<main class="flex-grow">
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="mx-auto h-12 w-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                    Izveidot kontu
                </h2>

                <?php if ($successMessage): ?>
                    <div style="background-color:#D4EDDA; color:#155724; padding:15px; border-radius:5px; margin:20px 0;">
                        <?= $successMessage ?>
                    </div>
                <?php endif; ?>

                <p class="mt-2 text-center text-sm text-gray-600">
                    Vai
                    <a href="login.php" class="font-medium text-green-600 hover:text-green-500">
                        ieiet esošajā kontā
                    </a>
                </p>
            </div>

            <form class="mt-8 space-y-6" action="api/auth/register.php" method="POST">
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Pilns vārds
                        </label>
                        <input 
                            id="name" 
                            name="name" 
                            type="text" 
                            autocomplete="name" 
                            required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500"
                            placeholder="Jānis Bērziņš"
                        >
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            E-pasta adrese
                        </label>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            autocomplete="email" 
                            required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500"
                            placeholder="jusu.epasts@piemers.lv"
                        >
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Parole
                        </label>
                        <input 
                            id="password" 
                            name="password" 
                            type="password" 
                            autocomplete="new-password" 
                            required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500"
                            placeholder="Izvēlieties drošu paroli"
                        >
                    </div>
                    <div>
                        <label for="password-confirm" class="block text-sm font-medium text-gray-700">
                            Apstiprināt paroli
                        </label>
                        <input 
                            id="password-confirm" 
                            name="password-confirm" 
                            type="password" 
                            autocomplete="new-password" 
                            required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500"
                            placeholder="Atkārtojiet paroli"
                        >
                    </div>
                </div>

                <div class="flex items-center">
                    <input 
                        id="terms" 
                        name="terms" 
                        type="checkbox" 
                        required 
                        class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded"
                    >
                    <label for="terms" class="ml-2 block text-sm text-gray-900">
                        Es piekrītu 
                        <a href="#" class="text-green-600 hover:text-green-500">lietošanas noteikumiem</a>
                        un 
                        <a href="#" class="text-green-600 hover:text-green-500">privātuma politikai</a>
                    </label>
                </div>

                <div>
                    <button 
                        type="submit" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all"
                    >
                        Izveidot kontu
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
