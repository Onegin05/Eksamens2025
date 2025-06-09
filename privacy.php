<?php
session_start();
$page_title = "Privātuma politika - ZaļāAugsme";
include 'includes/header.php';
?>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="py-16 bg-gradient-to-br from-green-50 via-white to-green-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block p-3 bg-green-100 rounded-lg text-green-700 mb-6">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Privātuma politika</h1>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Mēs aizsargājam jūsu privātumu un nodrošinām drošu platformu jūsu finanšu pārvaldībai.
                </p>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Last Updated -->
                <div class="mb-12 text-sm text-gray-500">
                    Pēdējā atjaunināšana: <?php echo date('d.m.Y'); ?>
                </div>

                <!-- Introduction -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Ievads</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Šī privātuma politika izskaidro, kā ZaļāAugsme apkopj, izmanto un aizsargā jūsu personisko informāciju. Izmantojot mūsu platformu, jūs piekrītat šīs politikas noteikumiem.
                    </p>
                </div>

                <!-- Information Collection -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Informācijas vākšana</h2>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Mēs vācam šādu informāciju:</h3>
                        <ul class="list-disc list-inside space-y-2 text-gray-600">
                            <li>Profila informācija (vārds, e-pasts, telefona numurs)</li>
                            <li>Finanšu transakcijas un budžeta dati</li>
                            <li>Ierīces un pārlūkprogrammas informācija</li>
                            <li>Lietošanas statistika un analītika</li>
                        </ul>
                    </div>
                </div>

                <!-- Information Usage -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Informācijas izmantošana</h2>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Mēs izmantojam jūsu informāciju, lai:</h3>
                        <ul class="list-disc list-inside space-y-2 text-gray-600">
                            <li>Nodrošinātu platformas funkcionalitāti</li>
                            <li>Uzlabotu mūsu pakalpojumus</li>
                            <li>Komunicētu ar jums par jūsu kontu</li>
                            <li>Nodrošinātu platformas drošību</li>
                        </ul>
                    </div>
                </div>

                <!-- Data Protection -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Datu aizsardzība</h2>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="text-gray-600 mb-4">
                            Mēs izmantojam vairākus drošības līmeņus, lai aizsargātu jūsu datus:
                        </p>
                        <ul class="list-disc list-inside space-y-2 text-gray-600">
                            <li>Datu šifrēšana</li>
                            <li>Regulāras drošības audita</li>
                            <li>Pieeju kontrolei</li>
                            <li>Drošu datu glabāšanu</li>
                        </ul>
                    </div>
                </div>

                <!-- User Rights -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Jūsu tiesības</h2>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="text-gray-600 mb-4">
                            Jums ir tiesības:
                        </p>
                        <ul class="list-disc list-inside space-y-2 text-gray-600">
                            <li>Pieprasīt piekļuvi saviem datiem</li>
                            <li>Labot neprecīzu informāciju</li>
                            <li>Dzēst savus datus</li>
                            <li>Ierobežot datu apstrādi</li>
                            <li>Pieprasīt datu pārvietošanu</li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Kontaktinformācija</h2>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <p class="text-gray-600">
                            Ja jums ir jautājumi par šo privātuma politiku, lūdzu, sazinieties ar mums:
                        </p>
                        <div class="mt-4 space-y-2 text-gray-600">
                            <p>E-pasts: privacy@zalaugsme.lv</p>
                            <p>Adrese: Brīvības iela 123, Rīga, LV-1010</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
