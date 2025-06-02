
<?php
session_start();
$page_title = "Blogs - ZaļāAugsme Finanšu Pakalpojumi";
include 'includes/header.php';
?>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="py-16 bg-gradient-to-br from-green-50 via-white to-green-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block p-3 bg-green-100 rounded-lg text-green-700 mb-6">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3v6m0 0l-3-3m3 3l3-3"></path>
                    </svg>
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">ZaļāAugsme Blogs</h1>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Izlasiet jaunākos rakstus par finanšu plānošanu, ieguldījumiem un naudas pārvaldību.
                </p>
            </div>
        </div>
    </section>

    <!-- Featured Post -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="bg-gradient-to-r from-green-600 to-green-700 rounded-lg overflow-hidden shadow-lg">
                    <div class="p-8 text-white">
                        <div class="flex items-center mb-4">
                            <span class="bg-white/20 px-3 py-1 rounded-full text-sm font-medium">Galvenais raksts</span>
                        </div>
                        <h2 class="text-3xl font-bold mb-4">Kā izveidot efektīvu budžetu 2024. gadā</h2>
                        <p class="text-xl text-green-100 mb-6">
                            Uzziniet par jaunākajām budžeta plānošanas stratēģijām un to, kā tās pielāgot mūsdienu ekonomiskajai situācijai.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="bg-white/20 w-10 h-10 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-sm font-bold">ZA</span>
                                </div>
                                <div>
                                    <p class="font-medium">ZaļāAugsme Komanda</p>
                                    <p class="text-green-200 text-sm">Publicēts 15. janvārī, 2024</p>
                                </div>
                            </div>
                            <a href="#" class="bg-white text-green-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                                Lasīt tālāk
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts Grid -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Jaunākie raksti</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Blog Post 1 -->
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="h-48 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                            <span class="text-4xl">💰</span>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-medium">Uzkrājumi</span>
                                <span class="text-gray-500 text-sm ml-auto">10. janvāris, 2024</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-3">5 efektīvākie veidi, kā uzkrāt naudu</h3>
                            <p class="text-gray-600 mb-4">
                                Atklājiet praktiskas stratēģijas, kas palīdzēs jums uzkrāt naudu ātrāk un efektīvāk.
                            </p>
                            <a href="#" class="text-green-600 hover:text-green-700 font-medium text-sm">
                                Lasīt vairāk →
                            </a>
                        </div>
                    </article>

                    <!-- Blog Post 2 -->
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="h-48 bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                            <span class="text-4xl">📊</span>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-medium">Budžets</span>
                                <span class="text-gray-500 text-sm ml-auto">8. janvāris, 2024</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-3">Budžeta kļūdas, ko izvairīties</h3>
                            <p class="text-gray-600 mb-4">
                                Uzziniet par biežākajām budžeta plānošanas kļūdām un to, kā tās novērst.
                            </p>
                            <a href="#" class="text-green-600 hover:text-green-700 font-medium text-sm">
                                Lasīt vairāk →
                            </a>
                        </div>
                    </article>

                    <!-- Blog Post 3 -->
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="h-48 bg-gradient-to-br from-purple-100 to-purple-200 flex items-center justify-center">
                            <span class="text-4xl">🎯</span>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded text-xs font-medium">Mērķi</span>
                                <span class="text-gray-500 text-sm ml-auto">5. janvāris, 2024</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-3">Finanšu mērķu izvirzīšana</h3>
                            <p class="text-gray-600 mb-4">
                                Kā pareizi izvirzīt un sasniegt savus finanšu mērķus 2024. gadā.
                            </p>
                            <a href="#" class="text-green-600 hover:text-green-700 font-medium text-sm">
                                Lasīt vairāk →
                            </a>
                        </div>
                    </article>

                    <!-- Blog Post 4 -->
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="h-48 bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center">
                            <span class="text-4xl">🏠</span>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-orange-100 text-orange-700 px-2 py-1 rounded text-xs font-medium">Mājoklis</span>
                                <span class="text-gray-500 text-sm ml-auto">3. janvāris, 2024</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-3">Mājokļa iegāde: finanšu plānošana</h3>
                            <p class="text-gray-600 mb-4">
                                Praktisks ceļvedis mājokļa iegādei un hipotēkas plānošanai.
                            </p>
                            <a href="#" class="text-green-600 hover:text-green-700 font-medium text-sm">
                                Lasīt vairāk →
                            </a>
                        </div>
                    </article>

                    <!-- Blog Post 5 -->
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="h-48 bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center">
                            <span class="text-4xl">⚠️</span>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-medium">Ārkārtas</span>
                                <span class="text-gray-500 text-sm ml-auto">1. janvāris, 2024</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-3">Ārkārtas fonda nozīme</h3>
                            <p class="text-gray-600 mb-4">
                                Kāpēc katram vajag ārkārtas fondu un kā to izveidot soli pa solim.
                            </p>
                            <a href="#" class="text-green-600 hover:text-green-700 font-medium text-sm">
                                Lasīt vairāk →
                            </a>
                        </div>
                    </article>

                    <!-- Blog Post 6 -->
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="h-48 bg-gradient-to-br from-indigo-100 to-indigo-200 flex items-center justify-center">
                            <span class="text-4xl">📈</span>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-indigo-100 text-indigo-700 px-2 py-1 rounded text-xs font-medium">Ieguldījumi</span>
                                <span class="text-gray-500 text-sm ml-auto">28. decembris, 2023</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-3">Ieguldījumu pamati iesācējiem</h3>
                            <p class="text-gray-600 mb-4">
                                Viss, kas jāzina par ieguldījumiem, ja esat pilnīgs iesācējs.
                            </p>
                            <a href="#" class="text-green-600 hover:text-green-700 font-medium text-sm">
                                Lasīt vairāk →
                            </a>
                        </div>
                    </article>
                </div>

                <!-- Load More Button -->
                <div class="text-center mt-12">
                    <button class="px-8 py-3 border-2 border-green-600 text-green-700 font-semibold rounded-lg hover:bg-green-50 transition-colors">
                        Ielādēt vairāk rakstus
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Sekojiet līdzi jaunumiem</h2>
                <p class="text-xl text-gray-600 mb-8">
                    Abonējiet mūsu biļetenu un saņemiet jaunākos finanšu padomus tieši savā e-pastā.
                </p>
                <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input 
                        type="email" 
                        placeholder="Jūsu e-pasta adrese" 
                        class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                        required
                    >
                    <button 
                        type="submit" 
                        class="px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 text-white font-semibold rounded-lg hover:from-green-700 hover:to-green-800 transition-all"
                    >
                        Abonēt
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
