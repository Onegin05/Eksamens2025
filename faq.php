
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
                    Atrodiet atbildes uz visbiežāk uzdotajiem jautājumiem par ZaļāAugsme pakalpojumiem.
                </p>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="space-y-6">
                    <!-- FAQ Item 1 -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Vai ZaļāAugsme pakalpojumi ir bezmaksas?
                        </h3>
                        <p class="text-gray-600">
                            Jā! Visi mūsu pamata rīki, ieskaitot budžeta kalkulatoru un finanšu padomus, ir pilnībā bezmaksas. Mūsu mērķis ir padarīt finanšu plānošanu pieejamu ikvienam.
                        </p>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Kā darbojas budžeta kalkulators?
                        </h3>
                        <p class="text-gray-600">
                            Mūsu budžeta kalkulators ļauj jums ievadīt savus mēneša ienākumus un izdevumus, pēc tam automātiski aprēķina jūsu budžeta bilanci un sniedz personalizētus ieteikumus uzlabojumiem. Visi aprēķini notiek jūsu pārlūkprogrammā - mēs nesaglabājam jūsu finanšu datus.
                        </p>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Vai mani finanšu dati ir drošībā?
                        </h3>
                        <p class="text-gray-600">
                            Jā, jūsu privātums ir mums ļoti svarīgs. Visi aprēķini notiek lokāli jūsu ierīcē, un mēs nesaglabājam nekādus jūsu finanšu datus mūsu serveros. Mēs ievērojam visus GDPR noteikumus.
                        </p>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Kādu valūtu izmanto jūsu rīki?
                        </h3>
                        <p class="text-gray-600">
                            Visi mūsu rīki izmanto Eiro (€) kā galveno valūtu, kas ir Latvijas oficiālā valūta. Visi aprēķini un piemēri ir pielāgoti Latvijas tirgum.
                        </p>
                    </div>

                    <!-- FAQ Item 5 -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Vai jūs sniedzat personalizētas finanšu konsultācijas?
                        </h3>
                        <p class="text-gray-600">
                            Pašlaik mēs piedāvājam tikai automatizētus rīkus un vispārīgus padomus. Taču mēs plānojam nākotnē pievienot personalizētu konsultāciju pakalpojumus. Sekojiet mūsu jaunumiem, lai uzzinātu vairāk!
                        </p>
                    </div>

                    <!-- FAQ Item 6 -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Kā es varu uzzināt par jauniem rīkiem un funkcijām?
                        </h3>
                        <p class="text-gray-600">
                            Abonējiet mūsu biļetenu vai sekojiet mūsu blogam, lai saņemtu informāciju par jaunākajiem rīkiem, funkcijām un finanšu padomiem. Mēs regulāri pievienojam jaunas funkcijas!
                        </p>
                    </div>

                    <!-- FAQ Item 7 -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Vai es varu izmantot ZaļāAugsme mobilajā ierīcē?
                        </h3>
                        <p class="text-gray-600">
                            Jā! Mūsu tīmekļa vietne ir pilnībā optimizēta mobilajām ierīcēm. Jūs varat piekļūt visiem rīkiem un funkcijām no sava viedtālruņa vai planšetdatora.
                        </p>
                    </div>

                    <!-- FAQ Item 8 -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">
                            Kā es varu sazināties ar atbalsta komandu?
                        </h3>
                        <p class="text-gray-600">
                            Jūs varat sazināties ar mums, izmantojot kontaktu formu mūsu tīmekļa vietnē, nosūtot e-pastu uz info@zalaugsme.lv vai zvanot uz +371 20 123 456. Mēs atbildam visām ziņām 24 stundu laikā.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Neradāt atbildi uz savu jautājumu?</h2>
                <p class="text-xl text-gray-600 mb-8">
                    Sazināties ar mums, un mēs ar prieku palīdzēsim!
                </p>
                <a href="contact.php" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-green-600 to-green-700 text-white font-semibold rounded-lg hover:from-green-700 hover:to-green-800 transition-all shadow-lg">
                    Sazināties ar mums
                </a>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
