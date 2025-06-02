
<?php
session_start();
$page_title = "Sākums - ZaļāAugsme Finanšu Pakalpojumi";
include 'includes/header.php';
?>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-green-50 via-white to-green-50 overflow-hidden">
        <div class="container mx-auto px-4 py-16 lg:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div class="space-y-4">
                        <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight">
                            Jūsu finanšu
                            <span class="bg-gradient-to-r from-green-600 to-green-700 bg-clip-text text-transparent">
                                ceļvedis
                            </span>
                        </h1>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            Palīdzam pieņemt gudrākus finanšu lēmumus ar intuitīviem rīkiem un personalizētiem padomiem.
                        </p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="calculator.php" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-green-600 to-green-700 text-white font-semibold rounded-lg hover:from-green-700 hover:to-green-800 transition-all duration-300 shadow-lg hover:shadow-xl">
                            Sākt budžeta plānošanu
                        </a>
                        <a href="about.php" class="inline-flex items-center justify-center px-8 py-4 border-2 border-green-600 text-green-700 font-semibold rounded-lg hover:bg-green-50 transition-all duration-300">
                            Uzzināt vairāk
                        </a>
                    </div>
                </div>
                
                <div class="relative">
                    <div id="money-tree-animation" class="w-full h-80 overflow-hidden rounded-xl bg-gradient-to-b from-green-100 to-green-200">
                        <!-- Money tree animation will be here -->
                        <div class="flex items-center justify-center h-full">
                            <div class="text-center">
                                <div class="text-6xl mb-4">🌳</div>
                                <p class="text-green-700 font-semibold">Jūsu finanšu koks aug!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Kāpēc izvēlēties ZaļāAugsme?</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Mūsu rīki un resursi palīdz jums sasniegt finanšu stabilitāti un īstenot savus sapņus.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6 rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">📊</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Vienkārša budžeta plānošana</h3>
                    <p class="text-gray-600">Izveidojiet un pārvaldiet savu budžetu ar mūsu intuitīvajiem rīkiem.</p>
                </div>
                
                <div class="text-center p-6 rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">💡</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Personalizēti padomi</h3>
                    <p class="text-gray-600">Saņemiet padomus, kas pielāgoti jūsu specifiskajai finanšu situācijai.</p>
                </div>
                
                <div class="text-center p-6 rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">🎯</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Mērķu sasniegšana</h3>
                    <p class="text-gray-600">Izvirziet un sasniedziet savus finanšu mērķus ar mūsu atbalstu.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-green-600 to-green-700">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Gatavs sākt savu finanšu ceļojumu?</h2>
            <p class="text-xl text-green-100 mb-8 max-w-2xl mx-auto">
                Pievienojieties tūkstošiem cilvēku, kas jau uzlabojuši savas finanses ar ZaļāAugsme.
            </p>
            <a href="register.php" class="inline-flex items-center justify-center px-8 py-4 bg-white text-green-700 font-semibold rounded-lg hover:bg-gray-50 transition-all duration-300 shadow-lg">
                Reģistrēties bez maksas
            </a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
