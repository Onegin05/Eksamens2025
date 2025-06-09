<?php
session_start();
$page_title = "Sākums - ZaļāAugsme";
include 'includes/header.php';
?>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-green-50 via-white to-green-50 overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
        <div class="container mx-auto px-4 py-20">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                    Sasniedziet finanšu neatkarību ar <span class="text-green-600">ZaļāAugsme</span>
                </h1>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    Palīdzam jauniešiem izprast un pārvaldīt savas finanses caur izglītību un praktiskiem rīkiem.
                </p>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Viss, kas nepieciešams jūsu finanšu ceļojumam
                </h2>
                <p class="text-xl text-gray-600">
                    Intuitīvi rīki un izglītība, lai palīdzētu jums sasniegt finanšu mērķus
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Feature 1 -->
                <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-gray-100">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Budžeta plānotājs</h3>
                    <p class="text-gray-600">
                        Izsekojiet saviem ienākumiem un izdevumiem, izveidojiet budžetu un sasniedziet savus finanšu mērķus.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-gray-100">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Finanšu izglītība</h3>
                    <p class="text-gray-600">
                        Apgūstiet finanšu pamatus un iegūstiet zināšanas, lai pieņemtu gudrus finanšu lēmumus.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow border border-gray-100">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Progresa izsekošana</h3>
                    <p class="text-gray-600">
                        Skatiet savu finanšu attīstību un saņemiet ieteikumus, kā uzlabot savu finansiālo stāvokli.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Kā tas strādā?
                </h2>
                <p class="text-xl text-gray-600">
                    Trīs vienkārši soļi, lai sāktu savu finanšu ceļojumu
                </p>
            </div>

            <div class="max-w-5xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Step 1 -->
                    <div class="relative flex flex-col">
                        <div class="bg-white rounded-xl p-8 shadow-lg border border-gray-100 flex-grow">
                            <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white font-bold text-xl mb-6">1</div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">Izveidojiet kontu</h3>
                            <p class="text-gray-600">
                                Reģistrējieties bez maksas un iegūstiet piekļuvi visiem mūsu rīkiem un resursiem.
                            </p>
                        </div>
                        <div class="hidden md:block absolute top-1/2 -right-4 transform -translate-y-1/2 z-10">
                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative flex flex-col">
                        <div class="bg-white rounded-xl p-8 shadow-lg border border-gray-100 flex-grow">
                            <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white font-bold text-xl mb-6">2</div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">Iestatiet budžetu</h3>
                            <p class="text-gray-600">
                                Izveidojiet savu pirmo budžetu un sāciet izsekot saviem ienākumiem un izdevumiem.
                            </p>
                        </div>
                        <div class="hidden md:block absolute top-1/2 -right-4 transform -translate-y-1/2 z-10">
                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex flex-col">
                        <div class="bg-white rounded-xl p-8 shadow-lg border border-gray-100 flex-grow">
                            <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white font-bold text-xl mb-6">3</div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">Sasniedziet mērķus</h3>
                            <p class="text-gray-600">
                                Izmantojiet mūsu rīkus un resursus, lai sasniegtu savus finanšu mērķus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Vai esat gatavs sākt?
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    Pievienojieties ZaļāAugsme šodien un sāciet savu ceļu uz finanšu neatkarību.
                </p>
            </div>
        </div>
    </section>
</main>

<style>
.bg-grid-pattern {
    background-image: linear-gradient(to right, #e5e7eb 1px, transparent 1px),
                      linear-gradient(to bottom, #e5e7eb 1px, transparent 1px);
    background-size: 24px 24px;
}
</style>

<?php include 'includes/footer.php'; ?>
