
<?php
session_start();
$page_title = "Finanšu Rīki - ZaļāAugsme";
include 'includes/header.php';
?>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="py-16 bg-gradient-to-br from-green-50 via-white to-green-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block p-3 bg-green-100 rounded-lg text-green-700 mb-6">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Finanšu Rīki</h1>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Izmantojiet mūsu bezmaksas rīkus, lai plānotu savu budžetu un pieņemtu labākus finanšu lēmumus.
                </p>
            </div>
        </div>
    </section>

    <!-- Tools Grid -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Budget Calculator -->
                    <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="bg-green-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Budžeta Kalkulators</h3>
                        <p class="text-gray-600 mb-4">Izveidojiet savu personīgo budžetu un uzziniet, kur varat ietaupīt naudu.</p>
                        <a href="calculator.php" class="inline-flex items-center text-green-600 hover:text-green-700 font-medium">
                            Izmantot rīku →
                        </a>
                    </div>

                    <!-- Savings Goal Calculator -->
                    <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Uzkrājumu Mērķis</h3>
                        <p class="text-gray-600 mb-4">Aprēķiniet, cik jums jāuzkrāj mēnesī, lai sasniegtu savus mērķus.</p>
                        <span class="inline-flex items-center text-gray-400 font-medium">
                            Drīzumā →
                        </span>
                    </div>

                    <!-- Loan Calculator -->
                    <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="bg-orange-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                            <svg class="h-6 w-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Kredīta Kalkulators</h3>
                        <p class="text-gray-600 mb-4">Aprēķiniet kredīta maksājumus un kopējās izmaksas.</p>
                        <span class="inline-flex items-center text-gray-400 font-medium">
                            Drīzumā →
                        </span>
                    </div>

                    <!-- Investment Calculator -->
                    <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="bg-purple-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                            <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Ieguldījumu Kalkulators</h3>
                        <p class="text-gray-600 mb-4">Aprēķiniet potenciālo ieguldījumu atdevi laika gaitā.</p>
                        <span class="inline-flex items-center text-gray-400 font-medium">
                            Drīzumā →
                        </span>
                    </div>

                    <!-- Retirement Calculator -->
                    <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="bg-indigo-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                            <svg class="h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Pensijas Kalkulators</h3>
                        <p class="text-gray-600 mb-4">Plānojiet savu pensiju un aprēķiniet nepieciešamos uzkrājumus.</p>
                        <span class="inline-flex items-center text-gray-400 font-medium">
                            Drīzumā →
                        </span>
                    </div>

                    <!-- Emergency Fund Calculator -->
                    <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="bg-red-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Ārkārtas Fonds</h3>
                        <p class="text-gray-600 mb-4">Aprēķiniet, cik liels jums vajadzīgs ārkārtas fonds.</p>
                        <span class="inline-flex items-center text-gray-400 font-medium">
                            Drīzumā →
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Gatavs sākt izmantot rīkus?</h2>
                <p class="text-xl text-gray-600 mb-8">
                    Sāciet ar budžeta kalkulatoru un uzlabojiet savas finanses jau šodien.
                </p>
                <a href="calculator.php" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-green-600 to-green-700 text-white font-semibold rounded-lg hover:from-green-700 hover:to-green-800 transition-all shadow-lg">
                    Sākt budžeta plānošanu
                </a>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
