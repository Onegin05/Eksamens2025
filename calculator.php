
<?php
session_start();
$page_title = "Budžeta Kalkulators - ZaļāAugsme";
include 'includes/header.php';
?>

<main class="flex-grow">
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <div class="mb-12 text-center">
                <div class="inline-block p-2 bg-green-100 rounded-lg text-green-700 mb-4">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold mb-4">Budžeta Kalkulators</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Izveidojiet savu personīgo budžetu un uzziniet, kur jūs varat ietaupīt naudu. Visi aprēķini tiek veikti Eiro valūtā.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Input Form -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-semibold mb-6">Jūsu ienākumi un izdevumi</h2>
                    
                    <form id="budget-form" class="space-y-6">
                        <!-- Income Section -->
                        <div>
                            <h3 class="text-lg font-medium mb-4 text-green-700">Mēneša ienākumi</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="form-label">Alga (pēc nodokļiem)</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">€</span>
                                        <input type="number" id="salary" class="form-input pl-8" placeholder="0.00" step="0.01" min="0">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Citi ienākumi</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">€</span>
                                        <input type="number" id="other-income" class="form-input pl-8" placeholder="0.00" step="0.01" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Expenses Section -->
                        <div>
                            <h3 class="text-lg font-medium mb-4 text-red-700">Mēneša izdevumi</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="form-label">Mājoklis (īre/hipotēka)</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">€</span>
                                        <input type="number" id="housing" class="form-input pl-8" placeholder="0.00" step="0.01" min="0">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Pārtika</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">€</span>
                                        <input type="number" id="food" class="form-input pl-8" placeholder="0.00" step="0.01" min="0">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Transports</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">€</span>
                                        <input type="number" id="transport" class="form-input pl-8" placeholder="0.00" step="0.01" min="0">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Komunālie maksājumi</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">€</span>
                                        <input type="number" id="utilities" class="form-input pl-8" placeholder="0.00" step="0.01" min="0">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Izklaides</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">€</span>
                                        <input type="number" id="entertainment" class="form-input pl-8" placeholder="0.00" step="0.01" min="0">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Citi izdevumi</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">€</span>
                                        <input type="number" id="other-expenses" class="form-input pl-8" placeholder="0.00" step="0.01" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" id="calculate-btn" class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-3 px-6 rounded-lg font-semibold hover:from-green-700 hover:to-green-800 transition-all">
                            Aprēķināt budžetu
                        </button>
                    </form>
                </div>

                <!-- Results -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-semibold mb-6">Jūsu budžeta analīze</h2>
                    
                    <div id="results" class="space-y-4">
                        <div class="text-center text-gray-500 py-8">
                            <svg class="h-16 w-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <p>Ievadiet savus ienākumus un izdevumus, lai redzētu budžeta analīzi</p>
                        </div>
                    </div>
                    
                    <div id="recommendations" class="mt-6 hidden">
                        <h3 class="text-lg font-medium mb-4">Ieteikumi</h3>
                        <div id="recommendation-list" class="space-y-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="assets/js/calculator.js"></script>

<?php include 'includes/footer.php'; ?>
