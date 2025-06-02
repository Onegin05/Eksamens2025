
    <!-- Contact Button -->
    <div class="fixed right-6 bottom-6 z-40">
        <button id="contact-btn" class="bg-green-600 hover:bg-green-700 h-14 w-14 rounded-full shadow-lg text-white transition-colors">
            <svg class="h-6 w-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-3.582 8-8 8a9.863 9.863 0 01-4.906-1.289L3 21l1.289-5.094A9.863 9.863 0 013 12c0-4.418 3.582-8 8-8s8 3.582 8 8z"></path>
            </svg>
        </button>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-50 border-t border-gray-200 py-12">
        <div class="container px-4 sm:px-6 lg:px-8 mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <a href="index.php" class="flex items-center gap-2">
                        <div class="bg-gradient-to-r from-green-500 to-green-600 p-2 rounded-lg">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-lg font-bold text-gray-800">ZaļāAugsme</span>
                    </a>
                    <p class="text-gray-600 text-sm">
                        Palīdzam pieņemt gudrākus finanšu lēmumus ar intuitīviem rīkiem un izglītību.
                    </p>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-4">Produkti</h3>
                    <ul class="space-y-3">
                        <li><a href="calculator.php" class="text-gray-600 hover:text-green-600 text-sm transition-colors">Budžeta kalkulators</a></li>
                        <li><a href="tools.php" class="text-gray-600 hover:text-green-600 text-sm transition-colors">Finanšu rīki</a></li>
                        <li><a href="tips.php" class="text-gray-600 hover:text-green-600 text-sm transition-colors">Finanšu padomi</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-4">Uzņēmums</h3>
                    <ul class="space-y-3">
                        <li><a href="about.php" class="text-gray-600 hover:text-green-600 text-sm transition-colors">Par mums</a></li>
                        <li><a href="blog.php" class="text-gray-600 hover:text-green-600 text-sm transition-colors">Blogs</a></li>
                        <li><a href="careers.php" class="text-gray-600 hover:text-green-600 text-sm transition-colors">Karjera</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-4">Atbalsts</h3>
                    <ul class="space-y-3">
                        <li><a href="contact.php" class="text-gray-600 hover:text-green-600 text-sm transition-colors">Kontakti</a></li>
                        <li><a href="faq.php" class="text-gray-600 hover:text-green-600 text-sm transition-colors">BUJ</a></li>
                        <li><a href="privacy.php" class="text-gray-600 hover:text-green-600 text-sm transition-colors">Privātuma politika</a></li>
                        <li><a href="terms.php" class="text-gray-600 hover:text-green-600 text-sm transition-colors">Noteikumi</a></li>
                    </ul>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-gray-200">
                <p class="text-center text-gray-500 text-sm">
                    © <?php echo date('Y'); ?> ZaļāAugsme Finanšu Pakalpojumi. Visas tiesības aizsargātas.
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
                
                <form id="contact-form" action="contact.php" method="POST">
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
