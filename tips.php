
<?php
session_start();
$page_title = "Finanšu Padomi - ZaļāAugsme";
include 'includes/header.php';
?>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="py-16 bg-gradient-to-br from-green-50 via-white to-green-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block p-3 bg-green-100 rounded-lg text-green-700 mb-6">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Finanšu Padomi</h1>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Uzziniet praktiskus padomus un stratēģijas, kas palīdzēs uzlabot jūsu finanšu situāciju.
                </p>
            </div>
        </div>
    </section>

    <!-- Tips Grid -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Tip 1 -->
                    <article class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="bg-gradient-to-r from-green-500 to-green-600 h-2"></div>
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="bg-green-100 w-10 h-10 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-green-600 font-bold">1</span>
                                </div>
                                <h3 class="text-xl font-semibold">50/30/20 Princips</h3>
                            </div>
                            <p class="text-gray-600 mb-4">
                                Sadaliet savus ienākumus: 50% nepieciešamajiem izdevumiem, 30% vēlmēm un 20% uzkrājumiem.
                            </p>
                            <div class="bg-gray-50 p-3 rounded-lg text-sm text-gray-700">
                                <strong>Piemērs:</strong> Ja jūsu mēneša ienākumi ir €2000, tad €1000 - nepieciešamajiem, €600 - vēlmēm, €400 - uzkrājumiem.
                            </div>
                        </div>
                    </article>

                    <!-- Tip 2 -->
                    <article class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2"></div>
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="bg-blue-100 w-10 h-10 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-blue-600 font-bold">2</span>
                                </div>
                                <h3 class="text-xl font-semibold">Ārkārtas Fonds</h3>
                            </div>
                            <p class="text-gray-600 mb-4">
                                Izveidojiet ārkārtas fondu, kas sedz 3-6 mēnešu izdevumus neparedzētām situācijām.
                            </p>
                            <div class="bg-gray-50 p-3 rounded-lg text-sm text-gray-700">
                                <strong>Sāciet mazumiem:</strong> Pat €20 mēnesī var izveidot nozīmīgu ārkārtas fondu gada laikā.
                            </div>
                        </div>
                    </article>

                    <!-- Tip 3 -->
                    <article class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-2"></div>
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="bg-purple-100 w-10 h-10 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-purple-600 font-bold">3</span>
                                </div>
                                <h3 class="text-xl font-semibold">Automātiskie Uzkrājumi</h3>
                            </div>
                            <p class="text-gray-600 mb-4">
                                Iestatiet automātiskus pārvedumus uz uzkrājumu kontu algas saņemšanas dienā.
                            </p>
                            <div class="bg-gray-50 p-3 rounded-lg text-sm text-gray-700">
                                <strong>Efekts:</strong> Jūs neuzkrāsiet to, ko neredzat - "maksājiet sev pirmajam".
                            </div>
                        </div>
                    </article>

                    <!-- Tip 4 -->
                    <article class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="bg-gradient-to-r from-orange-500 to-orange-600 h-2"></div>
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="bg-orange-100 w-10 h-10 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-orange-600 font-bold">4</span>
                                </div>
                                <h3 class="text-xl font-semibold">Izdevumu Sekošana</h3>
                            </div>
                            <p class="text-gray-600 mb-4">
                                Vismaz vienu mēnesi pierakstiet visus savus izdevumus, lai saprastu savu tēriņu paradumu.
                            </p>
                            <div class="bg-gray-50 p-3 rounded-lg text-sm text-gray-700">
                                <strong>Atklājums:</strong> Daudzi ir pārsteigti par to, cik daudz tiek tērēts "mazajām lietām".
                            </div>
                        </div>
                    </article>

                    <!-- Tip 5 -->
                    <article class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="bg-gradient-to-r from-red-500 to-red-600 h-2"></div>
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="bg-red-100 w-10 h-10 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-red-600 font-bold">5</span>
                                </div>
                                <h3 class="text-xl font-semibold">Parādu Stratēģija</h3>
                            </div>
                            <p class="text-gray-600 mb-4">
                                Vispirms dzēsiet parādus ar augstākajām procentu likmēm, turpinot maksāt minimumu citiem.
                            </p>
                            <div class="bg-gray-50 p-3 rounded-lg text-sm text-gray-700">
                                <strong>Iemesls:</strong> Augstās procentes var "apēst" jūsu uzkrājumus ātrāk nekā jūs tos veidojat.
                            </div>
                        </div>
                    </article>

                    <!-- Tip 6 -->
                    <article class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 h-2"></div>
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="bg-indigo-100 w-10 h-10 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-indigo-600 font-bold">6</span>
                                </div>
                                <h3 class="text-xl font-semibold">Finanšu Izglītība</h3>
                            </div>
                            <p class="text-gray-600 mb-4">
                                Veltiet 15 minūtes nedēļā, lai lasītu par finanšu plānošanu un ieguldījumu iespējām.
                            </p>
                            <div class="bg-gray-50 p-3 rounded-lg text-sm text-gray-700">
                                <strong>Rezultāts:</strong> Labākas zināšanas noved pie labākiem finanšu lēmumiem.
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Tip -->
    <section class="py-16 bg-gradient-to-r from-green-600 to-green-700">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h2 class="text-3xl font-bold mb-6">💡 Iknedēļas Padoms</h2>
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-8">
                    <h3 class="text-2xl font-semibold mb-4">Sāciet ar mazo</h3>
                    <p class="text-xl text-green-100 leading-relaxed">
                        Nav svarīgi, cik lielu summu jūs varat uzkrāt. Svarīgi ir sākt. Pat €5 nedēļā ir €260 gadā - un tas ir sākums jūsu finanšu brīvības ceļam!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Gatavs ieviest šos padomus praksē?</h2>
                <p class="text-xl text-gray-600 mb-8">
                    Izmantojiet mūsu budžeta kalkulatoru, lai sāktu plānot savas finanses.
                </p>
                <a href="calculator.php" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-green-600 to-green-700 text-white font-semibold rounded-lg hover:from-green-700 hover:to-green-800 transition-all shadow-lg">
                    Aprēķināt budžetu
                </a>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
