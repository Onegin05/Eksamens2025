<?php
$current_year = date('Y');
?>
    <!-- Contact Button -->
    <div class="fixed right-6 bottom-6 z-40">
        <button id="contact-btn" class="bg-green-600 hover:bg-green-700 h-14 w-14 rounded-full shadow-lg text-white transition-colors">
            <svg class="h-6 w-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-3.582 8-8 8a9.863 9.863 0 01-4.906-1.289L3 21l1.289-5.094A9.863 9.863 0 013 12c0-4.418 3.582-8 8-8s8 3.582 8 8z"></path>
            </svg>
        </button>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Company Info -->
                <div class="col-span-1">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">ZaļāAugsme</h3>
                    <p class="text-gray-600 mb-4">
                        Palīdzam jauniešiem sasniegt finanšu neatkarību caur izglītību un praktiskiem rīkiem.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Ātrās saites</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="<?php echo $base_url; ?>about.php" class="text-gray-600 hover:text-gray-900">Par mums</a>
                        </li>
                        <li>
                            <a href="<?php echo $base_url; ?>faq.php" class="text-gray-600 hover:text-gray-900">FAQ</a>
                        </li>
                        <li>
                            <a href="<?php echo $base_url; ?>contact.php" class="text-gray-600 hover:text-gray-900">Kontakti</a>
                        </li>
                        <li>
                            <a href="<?php echo $base_url; ?>privacy.php" class="text-gray-600 hover:text-gray-900">Privātuma politika</a>
                        </li>
                    </ul>
                </div>

                <!-- Resources -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Resursi</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="<?php echo $base_url; ?>budget.php" class="text-gray-600 hover:text-gray-900">Finanšu plānotājs</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-gray-200">
                <p class="text-center text-gray-500">
                    &copy; <?php echo $current_year; ?> ZaļāAugsme. Visas tiesības aizsargātas.
                </p>
            </div>
        </div>
    </footer>

    <!-- Contact Modal -->
    <div id="contact-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg max-w-md w-full p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Sazināties ar mums</h3>
                    <button id="close-modal" class="text-gray-400 hover:text-gray-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="text-gray-600 mb-4">Atsūtiet mums ziņu, un mēs ar jums sazināsimies pēc iespējas ātrāk.</p>
                
                <form id="contact-form">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Vārds</label>
                            <input type="text" name="name" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Jūsu vārds">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">E-pasts</label>
                            <input type="email" name="email" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="jusu.epasts@piemers.lv">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Ziņa</label>
                            <textarea name="message" required rows="4" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Jūsu ziņa..."></textarea>
                        </div>
                    </div>
                    <div class="flex gap-2 mt-6">
                        <button type="button" id="cancel-btn" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">Atcelt</button>
                        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg hover:from-green-700 hover:to-green-800 transition-all">Nosūtīt</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/main.js"></script>
</body>
</html>
