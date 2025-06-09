<?php
session_start();
$page_title = "Par mums - ZaļāAugsme";
include 'includes/header.php';
?>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="py-16 bg-gradient-to-br from-green-50 via-white to-green-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block p-3 bg-green-100 rounded-lg text-green-700 mb-6">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Par ZaļāAugsme</h1>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Mēs palīdzam jauniešiem sasniegt finanšu neatkarību un izaugsmi caur izglītību un praktiskiem rīkiem.
                </p>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="bg-green-50 rounded-2xl p-8">
                    <div class="text-green-600 mb-4">
                        <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Mūsu Misija</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Mūsu misija ir dot jauniešiem iespēju izprast un pārvaldīt savas finanses, veicinot ilgtspējīgu finanšu izaugsmi un labklājību.
                    </p>
                </div>
                <div class="bg-green-50 rounded-2xl p-8">
                    <div class="text-green-600 mb-4">
                        <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Mūsu Redzējums</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Mēs redzam pasauli, kurā katrs jaunietis ir apbruņots ar zināšanām un rīkiem, lai sasniegtu savus finanšu mērķus un izveidotu drošu nākotni.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Values -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Mūsu Vērtības</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="text-green-600 mb-4">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Uzticamība</h3>
                        <p class="text-gray-600">
                            Mēs nodrošinām precīzu un uzticamu informāciju, kas palīdz lēmumu pieņemšanā.
                        </p>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="text-green-600 mb-4">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Izglītība</h3>
                        <p class="text-gray-600">
                            Mēs ticam, ka zināšanas ir spēcīgākais rīks finanšu veiksmē.
                        </p>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="text-green-600 mb-4">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Kopiena</h3>
                        <p class="text-gray-600">
                            Mēs veidojam atbalstošu kopienu, kurā jaunieši var dalīties ar pieredzi un mācīties viens no otra.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Mūsu Komanda</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden bg-gray-200">
                            <img src="assets/images/team/placeholder.jpg" alt="Komandas loceklis" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Jānis Bērziņš</h3>
                        <p class="text-green-600 mb-2">Dibinātājs un CEO</p>
                        <p class="text-gray-600">
                            Ar vairāk nekā 10 gadu pieredzi finanšu jomā, Jānis vada mūsu misiju palīdzēt jauniešiem sasniegt finanšu neatkarību.
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden bg-gray-200">
                            <img src="assets/images/team/placeholder.jpg" alt="Komandas loceklis" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Anna Kalniņa</h3>
                        <p class="text-green-600 mb-2">Finanšu eksperte</p>
                        <p class="text-gray-600">
                            Anna ir sertificēta finanšu plānotāja ar aizrautību palīdzēt jauniešiem izprast un pārvaldīt savas finanses.
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden bg-gray-200">
                            <img src="assets/images/team/placeholder.jpg" alt="Komandas loceklis" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Pēteris Ozoliņš</h3>
                        <p class="text-green-600 mb-2">Tehnoloģiju vadītājs</p>
                        <p class="text-gray-600">
                            Pēteris nodrošina, ka mūsu platforma ir moderns un lietotājam draudzīgs rīks finanšu pārvaldībai.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-green-600">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-white mb-6">Pievienojieties mums šodien</h2>
                <p class="text-xl text-green-100 mb-8">
                    Sāciet savu ceļu uz finanšu neatkarību ar ZaļāAugsme
                </p>
                <a href="register.php" class="inline-block bg-white text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-green-50 transition-colors">
                    Reģistrēties
                </a>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
