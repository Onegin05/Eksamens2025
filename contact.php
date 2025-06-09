<?php
session_start();
$page_title = "Kontakti - ZaļāAugsme";
include 'includes/header.php';
?>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="py-16 bg-gradient-to-br from-green-50 via-white to-green-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block p-3 bg-green-100 rounded-lg text-green-700 mb-6">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Sazināties ar mums</h1>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Mums ir prieks palīdzēt jums jūsu finanšu ceļojumā. Sazināties ar mums jebkurā laikā!
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">
                <div id="form-message" class="hidden mb-6 px-4 py-3 rounded flex items-center">
                    <div class="flex-shrink-0 mr-3">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="block sm:inline"></span>
                </div>

                <form id="main-contact-form" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Vārds *
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500"
                            placeholder="Jūsu vārds"
                        >
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            E-pasta adrese *
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500"
                            placeholder="jusu.epasts@piemers.lv"
                        >
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            Ziņa *
                        </label>
                        <textarea 
                            id="message" 
                            name="message" 
                            rows="6" 
                            required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500"
                            placeholder="Jūsu ziņa..."
                        ></textarea>
                    </div>

                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-3 px-6 rounded-lg font-semibold hover:from-green-700 hover:to-green-800 transition-all"
                    >
                        Nosūtīt ziņu
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Contact Info -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Citi veidi, kā ar mums sazināties</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center p-6 bg-white rounded-lg shadow-sm">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">E-pasts</h3>
                        <p class="text-gray-600">info@zalaugsme.lv</p>
                    </div>

                    <div class="text-center p-6 bg-white rounded-lg shadow-sm">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Tālrunis</h3>
                        <p class="text-gray-600">+371 20 123 456</p>
                    </div>

                    <div class="text-center p-6 bg-white rounded-lg shadow-sm">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Adrese</h3>
                        <p class="text-gray-600">Brīvības iela 123<br>Rīga, LV-1001</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
document.getElementById('main-contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formMessage = document.getElementById('form-message');
    const form = this;
    const submitButton = form.querySelector('button[type="submit"]');
    
    // Disable submit button
    submitButton.disabled = true;
    submitButton.textContent = 'Nosūta...';
    
    // Get form data
    const formData = {
        name: form.name.value.trim(),
        email: form.email.value.trim(),
        message: form.message.value.trim()
    };
    
    // Send data to API
    fetch('api/contact/send.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        formMessage.classList.remove('hidden');
        
        if (data.success) {
            formMessage.className = 'bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 flex items-center animate-fade-in';
            formMessage.querySelector('span').textContent = 'Paldies! Jūsu ziņa ir nosūtīta. Mēs ar jums sazināsimies pēc iespējas ātrāk.';
            form.reset();
        } else {
            formMessage.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 flex items-center animate-fade-in';
            formMessage.querySelector('span').textContent = data.error || 'Kļūda nosūtot ziņu. Lūdzu, mēģiniet vēlreiz.';
        }
    })
    .catch(error => {
        formMessage.classList.remove('hidden');
        formMessage.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 flex items-center animate-fade-in';
        formMessage.querySelector('span').textContent = 'Kļūda nosūtot ziņu. Lūdzu, mēģiniet vēlreiz.';
    })
    .finally(() => {
        // Re-enable submit button
        submitButton.disabled = false;
        submitButton.textContent = 'Nosūtīt ziņu';
    });
});
</script>

<?php include 'includes/footer.php'; ?>
