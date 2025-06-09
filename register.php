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

            <form class="mt-8 space-y-6" action="api/auth/register.php" method="POST" id="registerForm">
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
                            pattern="[A-Za-zĀāČčĒēĢģĪīĶķĻļŅņŠšŪūŽž\s]+"
                            title="Lūdzu ievadiet tikai burtus un atstarpes"
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
                            minlength="8"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500"
                            placeholder="Izvēlieties drošu paroli"
                        >
                        <p class="mt-1 text-sm text-gray-500">Parolei jābūt vismaz 8 rakstzīmēm garai</p>
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
                        <a href="terms.php" class="text-green-600 hover:text-green-500">lietošanas noteikumiem</a>
                        un 
                        <a href="privacy.php" class="text-green-600 hover:text-green-500">privātuma politikai</a>
                    </label>
                </div>

                <div>
                    <button 
                        type="submit" 
                        id="registerButton"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all"
                    >
                        Izveidot kontu
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('password-confirm').value;
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const terms = document.getElementById('terms').checked;
    
    // Reset previous error messages
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(msg => msg.remove());
    
    let hasError = false;
    
    // Validate name (only letters and spaces)
    if (!/^[A-Za-zĀāČčĒēĢģĪīĶķĻļŅņŠšŪūŽž\s]+$/.test(name)) {
        showError('Vārdā var būt tikai burti un atstarpes');
        hasError = true;
    }
    
    // Validate email
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        showError('Lūdzu ievadiet derīgu e-pasta adresi');
        hasError = true;
    }
    
    // Validate password length
    if (password.length < 8) {
        showError('Parolei jābūt vismaz 8 rakstzīmēm garai');
        hasError = true;
    }
    
    // Check if passwords match
    if (password !== confirmPassword) {
        showError('Paroles nesakrīt');
        hasError = true;
    }
    
    // Check terms
    if (!terms) {
        showError('Lūdzu piekrītiet lietošanas noteikumiem un privātuma politikai');
        hasError = true;
    }
    
    if (hasError) {
        return;
    }
    
    // Disable submit button and show loading state
    const submitButton = document.getElementById('registerButton');
    submitButton.disabled = true;
    submitButton.textContent = 'Reģistrējas...';
    
    // Submit form
    const formData = new FormData(this);
    fetch('api/auth/register.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message and redirect to login
            const successDiv = document.createElement('div');
            successDiv.style.backgroundColor = '#D4EDDA';
            successDiv.style.color = '#155724';
            successDiv.style.padding = '15px';
            successDiv.style.borderRadius = '5px';
            successDiv.style.margin = '20px 0';
            successDiv.textContent = 'Reģistrācija veiksmīga! Tiek veikta pārvirzīšana uz pieteikšanās lapu...';
            this.insertBefore(successDiv, this.firstChild);
            
            // Redirect to login page after 2 seconds
            setTimeout(() => {
                window.location.href = 'login.php?registered=1';
            }, 2000);
        } else {
            showError(data.error || 'Kļūda reģistrējoties');
            submitButton.disabled = false;
            submitButton.textContent = 'Izveidot kontu';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showError('Kļūda reģistrējoties');
        submitButton.disabled = false;
        submitButton.textContent = 'Izveidot kontu';
    });
});

function showError(message) {
    const errorDiv = document.createElement('div');
    errorDiv.style.backgroundColor = '#F8D7DA';
    errorDiv.style.color = '#721C24';
    errorDiv.style.padding = '15px';
    errorDiv.style.borderRadius = '5px';
    errorDiv.style.margin = '20px 0';
    errorDiv.textContent = message;
    errorDiv.className = 'error-message';
    document.getElementById('registerForm').insertBefore(errorDiv, document.getElementById('registerForm').firstChild);
}
</script>

<?php include 'includes/footer.php'; ?>
