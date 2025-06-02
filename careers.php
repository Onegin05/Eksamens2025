
<?php
session_start();
$page_title = "Karjera - ZaļāAugsme";
include 'includes/header.php';
?>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="py-16 bg-gradient-to-br from-green-50 via-white to-green-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block p-3 bg-green-100 rounded-lg text-green-700 mb-6">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0v2a2 2 0 01-2 2H10a2 2 0 01-2-2V6"></path>
                    </svg>
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Karjera ZaļāAugsme</h1>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Pievienojieties mūsu komandai un palīdziet veidot labāku finanšu nākotni visiem.
                </p>
            </div>
        </div>
    </section>

    <!-- Company Culture -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Kāpēc strādāt ZaļāAugsme?</h2>
                    <p class="text-xl text-gray-600">
                        Mēs ticam, ka laimīgi darbinieki rada labākus produktus
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center p-6">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🌱</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Personības attīstība</h3>
                        <p class="text-gray-600">Mēs ieguldām jūsu profesionālajā izaugsmē un nodrošinām iespējas mācīties.</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">⚖️</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Darba un dzīves līdzsvars</h3>
                        <p class="text-gray-600">Elastīgs darba grafiks un iespēja strādāt attālināti.</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">💡</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Inovācijas</h3>
                        <p class="text-gray-600">Strādājiet ar jaunākajām tehnoloģijām un risiniet interesantas problēmas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Open Positions -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Atvērtās vakances</h2>
                
                <div class="space-y-6">
                    <!-- Job 1 -->
                    <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900">Frontend izstrādātājs/e</h3>
                                <p class="text-gray-600">Pilna laika • Rīga/Attālināti</p>
                            </div>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">Jauns</span>
                        </div>
                        <p class="text-gray-600 mb-4">
                            Meklējam pieredzējušu Frontend izstrādātāju, kurš palīdzēs veidot intuitīvus un lietotājdraudzīgus finanšu rīkus.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">React</span>
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">TypeScript</span>
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">Tailwind CSS</span>
                        </div>
                        <a href="#" class="inline-flex items-center text-green-600 hover:text-green-700 font-medium">
                            Uzzināt vairāk →
                        </a>
                    </div>

                    <!-- Job 2 -->
                    <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900">Finanšu analītiķis/e</h3>
                                <p class="text-gray-600">Pilna laika • Rīga</p>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            Pievienojieties mūsu komandai kā finanšu eksperts, lai palīdzētu izveidot labākos finanšu rīkus un padomus.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">Finanšu analīze</span>
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">Excel/Sheets</span>
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">SQL</span>
                        </div>
                        <a href="#" class="inline-flex items-center text-green-600 hover:text-green-700 font-medium">
                            Uzzināt vairāk →
                        </a>
                    </div>

                    <!-- Job 3 -->
                    <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900">UX/UI dizainers/e</h3>
                                <p class="text-gray-600">Pilna laika • Rīga/Attālināti</p>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            Palīdziet mums izveidot skaistu un lietojamu lietotāju pieredzi mūsu finanšu platformā.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">Figma</span>
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">Adobe XD</span>
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">Prototyping</span>
                        </div>
                        <a href="#" class="inline-flex items-center text-green-600 hover:text-green-700 font-medium">
                            Uzzināt vairāk →
                        </a>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <p class="text-gray-600 mb-4">Neredzat sev piemērotu pozīciju?</p>
                    <a href="contact.php" class="inline-flex items-center justify-center px-6 py-3 border-2 border-green-600 text-green-700 font-semibold rounded-lg hover:bg-green-50 transition-colors">
                        Sūtīt brīvo pieteikumu
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
