<?php
session_start();
$page_title = "Ienākt - ZaļāAugsme";
include 'includes/header.php';

// Check for error messages
$errorMessage = '';
if (isset($_SESSION['login_error'])) {
    $errorMessage = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}
?>

<main class="flex-grow">
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="mx-auto h-12 w-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                </div>
                <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                    Ienākt kontā
                </h2>

                <?php if (isset($_GET['registered']) && $_GET['registered'] == '1'): ?>
                    <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">
                                    Reģistrācija veiksmīga! Lūdzu, ienāciet savā kontā.
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($errorMessage): ?>
                    <div style="background-color:#F8D7DA; color:#721C24; padding:15px; border-radius:5px; margin:20px 0;">
                        <?= htmlspecialchars($errorMessage) ?>
                    </div>
                <?php endif; ?>

                <p class="mt-2 text-center text-sm text-gray-600">
                    Vai
                    <a href="register.php" class="font-medium text-green-600 hover:text-green-500">
                        izveidot jaunu kontu
                    </a>
                </p>
            </div>

            <form class="mt-8 space-y-6" action="api/auth/login.php" method="POST" id="loginForm">
                <div class="space-y-4">
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
                            autocomplete="current-password" 
                            required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500"
                            placeholder="Ievadiet savu paroli"
                        >
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input 
                            id="remember-me" 
                            name="remember-me" 
                            type="checkbox" 
                            class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded"
                        >
                        <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                            Atcerēties mani
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-green-600 hover:text-green-500">
                            Aizmirsi paroli?
                        </a>
                    </div>
                </div>

                <div>
                    <button 
                        type="submit" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all"
                        id="loginButton"
                    >
                        Ienākt
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const loginButton = document.getElementById('loginButton');
    loginButton.disabled = true;
    loginButton.textContent = 'Ienākšana...';

    fetch('api/auth/login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'profile.php';
        } else {
            const errorDiv = document.createElement('div');
            errorDiv.style.backgroundColor = '#F8D7DA';
            errorDiv.style.color = '#721C24';
            errorDiv.style.padding = '15px';
            errorDiv.style.borderRadius = '5px';
            errorDiv.style.margin = '20px 0';
            errorDiv.textContent = data.error || 'Kļūda ienākot sistēmā';
            
            const existingError = document.querySelector('.error-message');
            if (existingError) {
                existingError.remove();
            }
            errorDiv.className = 'error-message';
            this.insertBefore(errorDiv, this.firstChild);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        const errorDiv = document.createElement('div');
        errorDiv.style.backgroundColor = '#F8D7DA';
        errorDiv.style.color = '#721C24';
        errorDiv.style.padding = '15px';
        errorDiv.style.borderRadius = '5px';
        errorDiv.style.margin = '20px 0';
        errorDiv.textContent = 'Kļūda ienākot sistēmā';
        errorDiv.className = 'error-message';
        this.insertBefore(errorDiv, this.firstChild);
    })
    .finally(() => {
        loginButton.disabled = false;
        loginButton.textContent = 'Ienākt';
    });
});
</script>

<?php include 'includes/footer.php'; ?>
