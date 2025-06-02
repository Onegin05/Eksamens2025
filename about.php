
<?php
session_start();
$page_title = "Par mums - ZaļāAugsme Finanšu Pakalpojumi";
include 'includes/header.php';
?>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="py-16 bg-gradient-to-br from-green-50 via-white to-green-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block p-3 bg-green-100 rounded-lg text-green-700 mb-6">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Par ZaļāAugsme</h1>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Mēs esam komanda, kas ticam, ka ikviena cilvēka finanses var uzlaboties ar pareiziem rīkiem un zināšanām.
                </p>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Mūsu misija</h2>
                        <p class="text-lg text-gray-600 mb-6">
                            Palīdzēt cilvēkiem pieņemt labākus finanšu lēmumus, nodrošinot viņus ar intuitīviem rīkiem, izglītību un atbalstu viņu finanšu ceļojumā.
                        </p>
                        <p class="text-gray-600">
                            Mēs ticam, ka finanšu plānošanai nevajadzētu būt sarežģītai. Tāpēc mēs izveidojām ZaļāAugsme - platformu, kas padara budžeta plānošanu un finanšu pārvaldību pieejamu ikvienam.
                        </p>
                    </div>
                    <div class="bg-gradient-to-br from-green-100 to-green-200 p-8 rounded-xl">
                        <div class="text-center">
                            <div class="text-6xl mb-4">🎯</div>
                            <h3 class="text-xl font-semibold text-green-800 mb-2">Mūsu mērķis</h3>
                            <p class="text-green-700">Padarīt finanšu stabilitāti sasniedzamu katram</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Mūsu vērtības</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center p-6 bg-white rounded-lg shadow-sm">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🤝</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Uzticamība</h3>
                        <p class="text-gray-600">Mēs cenšamies būt jūsu uzticamais partneris finanšu jautājumos.</p>
                    </div>
                    
                    <div class="text-center p-6 bg-white rounded-lg shadow-sm">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🔍</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Caurskatāmība</h3>
                        <p class="text-gray-600">Mēs ticam skaidrai un godīgai komunikācijai par visiem procesiem.</p>
                    </div>
                    
                    <div class="text-center p-6 bg-white rounded-lg shadow-sm">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🚀</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Inovācijas</h3>
                        <p class="text-gray-600">Mēs pastāvīgi uzlabojam mūsu rīkus, lai tie būtu efektīvāki.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Mūsu komanda</h2>
                <p class="text-lg text-gray-600 mb-12">
                    Mēs esam finanšu ekspertu, tehnoloģiju speciālistu un dizaineru komanda, kas strādā kopā, lai radītu labāku finanšu nākotni visiem.
                </p>
                
                <div class="bg-gradient-to-r from-green-600 to-green-700 rounded-lg p-8 text-white">
                    <h3 class="text-2xl font-bold mb-4">Pievienojieties mūsu komandai!</h3>
                    <p class="text-green-100 mb-6">
                        Mēs vienmēr meklējam talantīgus cilvēkus, kas dalās mūsu vīzijā par labāku finanšu nākotni.
                    </p>
                    <a href="careers.php" class="inline-flex items-center justify-center px-6 py-3 bg-white text-green-700 font-semibold rounded-lg hover:bg-gray-50 transition-colors">
                        Skatīt vakances
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
