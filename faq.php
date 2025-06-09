<?php
session_start();
$page_title = "Biežāk uzdotie jautājumi - ZaļāAugsme";
include 'includes/header.php';
?>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="py-16 bg-gradient-to-br from-green-50 via-white to-green-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block p-3 bg-green-100 rounded-lg text-green-700 mb-6">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Biežāk uzdotie jautājumi</h1>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Atrodiet atbildes uz biežāk uzdotajiem jautājumiem par ZaļāAugsme platformu un tās funkcijām.
                </p>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- General Questions -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Vispārīgi jautājumi</h2>
                    <div class="space-y-4">
                        <div class="bg-white rounded-lg border border-gray-200">
                            <button class="w-full px-6 py-4 text-left focus:outline-none" onclick="toggleFAQ(this)">
                                <div class="flex items-center justify-between">
                                    <span class="text-lg font-medium text-gray-900">Kas ir ZaļāAugsme?</span>
                                    <svg class="h-5 w-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="px-6 pb-4 hidden">
                                <p class="text-gray-600">
                                    ZaļāAugsme ir platforma, kas palīdz jauniešiem pārvaldīt savas finanses un sasniegt finanšu neatkarību. Mēs piedāvājam intuitīvus rīkus budžeta plānošanai, izdevumu sekšanai un finanšu mērķu sasniegšanai.
                                </p>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg border border-gray-200">
                            <button class="w-full px-6 py-4 text-left focus:outline-none" onclick="toggleFAQ(this)">
                                <div class="flex items-center justify-between">
                                    <span class="text-lg font-medium text-gray-900">Kā sākt lietot ZaļāAugsme?</span>
                                    <svg class="h-5 w-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="px-6 pb-4 hidden">
                                <p class="text-gray-600">
                                    Lai sāktu lietot ZaļāAugsme, jums jāizveido bezmaksas konts. Pēc reģistrācijas jūs varēsiet piekļūt visām platformas funkcijām, ieskaitot budžeta plānotāju, izdevumu sekšanu un finanšu mērķu iestatīšanu.
                                </p>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg border border-gray-200">
                            <button class="w-full px-6 py-4 text-left focus:outline-none" onclick="toggleFAQ(this)">
                                <div class="flex items-center justify-between">
                                    <span class="text-lg font-medium text-gray-900">Vai ZaļāAugsme ir bezmaksas?</span>
                                    <svg class="h-5 w-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="px-6 pb-4 hidden">
                                <p class="text-gray-600">
                                    Jā, ZaļāAugsme ir pilnībā bezmaksas platforma. Mēs ticam, ka finanšu izglītība un rīki būtu pieejami ikvienam, tāpēc mēs neiekasējam maksu par mūsu pakalpojumu izmantošanu.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features Questions -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Funkcijas un iespējas</h2>
                    <div class="space-y-4">
                        <div class="bg-white rounded-lg border border-gray-200">
                            <button class="w-full px-6 py-4 text-left focus:outline-none" onclick="toggleFAQ(this)">
                                <div class="flex items-center justify-between">
                                    <span class="text-lg font-medium text-gray-900">Kā strādā budžeta plānotājs?</span>
                                    <svg class="h-5 w-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="px-6 pb-4 hidden">
                                <p class="text-gray-600">
                                    Budžeta plānotājs ļauj jums izsekot saviem ienākumiem un izdevumiem, kategorizēt transakcijas un iestatīt finanšu mērķus. Jūs varat pievienot ienākumus un izdevumus, skatīt detalizētu analīzi un saņemt ieteikumus par budžeta optimizāciju.
                                </p>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg border border-gray-200">
                            <button class="w-full px-6 py-4 text-left focus:outline-none" onclick="toggleFAQ(this)">
                                <div class="flex items-center justify-between">
                                    <span class="text-lg font-medium text-gray-900">Kā iestatīt finanšu mērķus?</span>
                                    <svg class="h-5 w-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="px-6 pb-4 hidden">
                                <p class="text-gray-600">
                                    Lai iestatītu finanšu mērķus, dodieties uz "Mērķi" sadaļu un nospiediet "Pievienot mērķi". Jūs varat izvēlēties mērķa veidu (piemēram, uzkrājumi, parāda atmaksa), iestatīt summu un termiņu. Platforma palīdzēs jums izsekot progresam un sniegs ieteikumus mērķa sasniegšanai.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Security Questions -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Drošība un konfidencialitāte</h2>
                    <div class="space-y-4">
                        <div class="bg-white rounded-lg border border-gray-200">
                            <button class="w-full px-6 py-4 text-left focus:outline-none" onclick="toggleFAQ(this)">
                                <div class="flex items-center justify-between">
                                    <span class="text-lg font-medium text-gray-900">Kā droša ir mana informācija?</span>
                                    <svg class="h-5 w-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="px-6 pb-4 hidden">
                                <p class="text-gray-600">
                                    Mēs izmantojam vairākus drošības līmeņus, lai aizsargātu jūsu datus. Visi dati tiek šifrēti, un mēs nekad nesakopojam jūsu bankas konta informāciju. Mūsu platforma atbilst visiem modernajiem drošības standartiem.
                                </p>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg border border-gray-200">
                            <button class="w-full px-6 py-4 text-left focus:outline-none" onclick="toggleFAQ(this)">
                                <div class="flex items-center justify-between">
                                    <span class="text-lg font-medium text-gray-900">Kā es varu dzēst savu kontu?</span>
                                    <svg class="h-5 w-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="px-6 pb-4 hidden">
                                <p class="text-gray-600">
                                    Lai dzēstu savu kontu, dodieties uz profila iestatījumiem un atrodiet opciju "Dzēst kontu". Pirms konta dzēšanas jums būs jāapstiprina šī darbība. Pēc konta dzēšanas visi jūsu dati tiks neatgriezeniski dzēsti no mūsu sistēmas.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Vai neatradāt atbildi?</h2>
                <p class="text-xl text-gray-600 mb-8">
                    Sazinieties ar mūsu atbalsta komandu, un mēs ar prieku palīdzēsim jums
                </p>
                <a href="contact.php" class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                    Sazināties ar mums
                </a>
            </div>
        </div>
    </section>
</main>

<script>
function toggleFAQ(button) {
    const content = button.nextElementSibling;
    const icon = button.querySelector('svg');
    
    // Toggle content visibility
    content.classList.toggle('hidden');
    
    // Rotate icon
    if (content.classList.contains('hidden')) {
        icon.classList.remove('rotate-180');
    } else {
        icon.classList.add('rotate-180');
    }
}
</script>

<?php include 'includes/footer.php'; ?>
