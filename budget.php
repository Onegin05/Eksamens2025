<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$page_title = "Budžeta plānotājs - ZaļāAugsme";
include 'includes/header.php';
?>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="py-16 bg-gradient-to-br from-green-50 via-white to-green-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block p-3 bg-green-100 rounded-lg text-green-700 mb-6">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Budžeta plānotājs</h1>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Sekojiet saviem ienākumiem un izdevumiem, plānojiet budžetu un sasniedziet savus finanšu mērķus!
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <!-- Month Selector -->
                <div class="mb-8 flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <button id="prevMonth" class="p-2 rounded-lg hover:bg-gray-100">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <h2 id="currentMonth" class="text-2xl font-bold text-gray-900">2024. gada Janvāris</h2>
                        <button id="nextMonth" class="p-2 rounded-lg hover:bg-gray-100">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                    <button id="addTransaction" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                        Pievienot transakciju
                    </button>
                </div>

                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Kopējie ienākumi</h3>
                        <p id="totalIncome" class="text-2xl font-semibold text-green-600">0.00 €</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Kopējie izdevumi</h3>
                        <p id="totalExpenses" class="text-2xl font-semibold text-red-600">0.00 €</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Bilance</h3>
                        <p id="balance" class="text-2xl font-semibold">0.00 €</p>
                    </div>
                </div>

                <!-- Charts -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Ienākumu sadalījums</h3>
                        <div class="h-64">
                            <canvas id="incomeChart"></canvas>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Izdevumu sadalījums</h3>
                        <div class="h-64">
                            <canvas id="expenseChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Transactions List -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Transakcijas</h3>
                    </div>
                    <div id="transactionsList" class="divide-y divide-gray-200">
                        <!-- Transactions will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add Transaction Modal -->
    <div id="transactionModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Pievienot transakciju</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <form id="transactionForm" class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tips</label>
                            <select name="type" id="transactionType" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                <option value="income">Ienākumi</option>
                                <option value="expense">Izdevumi</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Summa</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">€</span>
                                </div>
                                <input type="number" name="amount" step="0.01" required class="pl-7 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kategorija</label>
                        <select name="category" id="categorySelect" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            <option value="">Izvēlieties kategoriju...</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apraksts</label>
                        <input type="text" name="description" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Datums</label>
                        <input type="date" name="date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                            Atcelt
                        </button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                            Saglabāt
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
let currentDate = new Date();
let incomeChart = null;
let expenseChart = null;
let categories = [];

// Initialize the page
document.addEventListener('DOMContentLoaded', function() {
    initCharts();
    updateMonthDisplay();
    loadTransactions();
    loadCategories();
    setupEventListeners();
});

function initCharts() {
    const incomeCtx = document.getElementById('incomeChart').getContext('2d');
    const expenseCtx = document.getElementById('expenseChart').getContext('2d');

    incomeChart = new Chart(incomeCtx, {
        type: 'pie',
        data: {
            labels: [],
            datasets: [{
                data: [],
                backgroundColor: [
                    '#10B981', // green-500
                    '#059669', // green-600
                    '#047857', // green-700
                    '#065F46', // green-800
                    '#064E3B', // green-900
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 12,
                        padding: 15
                    }
                }
            }
        }
    });

    expenseChart = new Chart(expenseCtx, {
        type: 'pie',
        data: {
            labels: [],
            datasets: [{
                data: [],
                backgroundColor: [
                    '#EF4444', // red-500
                    '#DC2626', // red-600
                    '#B91C1C', // red-700
                    '#991B1B', // red-800
                    '#7F1D1D', // red-900
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 12,
                        padding: 15
                    }
                }
            }
        }
    });
}

// Load categories from API
async function loadCategories() {
    try {
        const response = await fetch('api/budget/categories.php');
        const data = await response.json();
        
        if (data.success) {
            categories = data.categories;
            updateCategorySelect();
        } else {
            console.error('Failed to load categories:', data.error);
        }
    } catch (error) {
        console.error('Error loading categories:', error);
    }
}

// Update category select based on transaction type
function updateCategorySelect() {
    const type = document.getElementById('transactionType').value;
    const categorySelect = document.getElementById('categorySelect');
    
    // Clear existing options except the first one
    while (categorySelect.options.length > 1) {
        categorySelect.remove(1);
    }
    
    // Add filtered categories
    categories
        .filter(cat => cat.type === type)
        .forEach(cat => {
            const option = document.createElement('option');
            option.value = cat.id;
            option.textContent = cat.name;
            categorySelect.appendChild(option);
        });
}

function setupEventListeners() {
    // Previous month button
    document.getElementById('prevMonth').addEventListener('click', function() {
        currentDate.setMonth(currentDate.getMonth() - 1);
        updateMonthDisplay();
        loadTransactions();
    });

    // Next month button
    document.getElementById('nextMonth').addEventListener('click', function() {
        currentDate.setMonth(currentDate.getMonth() + 1);
        updateMonthDisplay();
        loadTransactions();
    });

    // Add transaction button
    document.getElementById('addTransaction').addEventListener('click', function() {
        document.getElementById('transactionModal').classList.remove('hidden');
        // Set default date to today
        document.querySelector('input[name="date"]').valueAsDate = new Date();
    });

    // Transaction type change
    document.getElementById('transactionType').addEventListener('change', updateCategorySelect);

    // Transaction form submit
    document.getElementById('transactionForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const data = {
            type: formData.get('type'),
            category_id: formData.get('category'),
            amount: formData.get('amount'),
            description: formData.get('description'),
            transaction_date: formData.get('date')
        };
        
        try {
            const response = await fetch('api/budget/transactions.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });
            
            const result = await response.json();
            
            if (result.success) {
                closeModal();
                loadTransactions();
                this.reset();
            } else {
                alert('Kļūda pievienojot transakciju: ' + result.error);
            }
        } catch (error) {
            console.error('Error adding transaction:', error);
            alert('Kļūda pievienojot transakciju. Lūdzu, mēģiniet vēlreiz.');
        }
    });
}

function closeModal() {
    document.getElementById('transactionModal').classList.add('hidden');
    document.getElementById('transactionForm').reset();
}

function updateMonthDisplay() {
    const monthNames = [
        'Janvāris', 'Februāris', 'Marts', 'Aprīlis', 'Maijs', 'Jūnijs',
        'Jūlijs', 'Augusts', 'Septembris', 'Oktobris', 'Novembris', 'Decembris'
    ];
    document.getElementById('currentMonth').textContent = 
        `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
}

function loadTransactions() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth() + 1;
    
    console.log('Loading transactions for:', year, month);
    
    fetch(`api/budget/transactions.php?year=${year}&month=${month}`)
        .then(response => {
            console.log('Response status:', response.status);
            return response.json();
        })
        .then(data => {
            console.log('Received data:', data);
            if (data.success) {
                const transactions = data.transactions || [];
                console.log('Transactions:', transactions);
                
                const income = transactions.filter(t => t.type === 'income');
                const expenses = transactions.filter(t => t.type === 'expense');
                
                console.log('Income:', income);
                console.log('Expenses:', expenses);
                
                updateCharts({ income, expenses });
                updateSummary({ income, expenses });
                updateTransactionsList({ income, expenses });
            } else {
                console.error('Error loading transactions:', data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function updateCharts(data) {
    console.log('Updating charts with data:', data);
    
    // Update income chart
    const incomeData = {
        labels: data.income.map(item => item.category_name),
        data: data.income.map(item => parseFloat(item.amount))
    };
    
    // Update expense chart
    const expenseData = {
        labels: data.expenses.map(item => item.category_name),
        data: data.expenses.map(item => parseFloat(item.amount))
    };
    
    console.log('Income chart data:', incomeData);
    console.log('Expense chart data:', expenseData);
    
    incomeChart.data.labels = incomeData.labels;
    incomeChart.data.datasets[0].data = incomeData.data;
    incomeChart.update();
    
    expenseChart.data.labels = expenseData.labels;
    expenseChart.data.datasets[0].data = expenseData.data;
    expenseChart.update();
}

function updateSummary(data) {
    console.log('Updating summary with data:', data);
    
    const totalIncome = data.income.reduce((sum, item) => sum + parseFloat(item.amount), 0);
    const totalExpenses = data.expenses.reduce((sum, item) => sum + parseFloat(item.amount), 0);
    const balance = totalIncome - totalExpenses;
    
    console.log('Summary calculations:', { totalIncome, totalExpenses, balance });
    
    document.getElementById('totalIncome').textContent = totalIncome.toFixed(2) + ' €';
    document.getElementById('totalExpenses').textContent = totalExpenses.toFixed(2) + ' €';
    document.getElementById('balance').textContent = balance.toFixed(2) + ' €';
    
    const balanceElement = document.getElementById('balance');
    if (balance >= 0) {
        balanceElement.className = 'text-2xl font-semibold text-green-600';
    } else {
        balanceElement.className = 'text-2xl font-semibold text-red-600';
    }
}

function updateTransactionsList(data) {
    console.log('Updating transactions list with data:', data);
    
    const transactionsList = document.getElementById('transactionsList');
    if (!transactionsList) {
        console.error('Transactions list container not found!');
        return;
    }
    
    transactionsList.innerHTML = '';
    
    // Combine and sort all transactions by date
    const allTransactions = [...data.income, ...data.expenses].sort((a, b) => 
        new Date(b.transaction_date) - new Date(a.transaction_date)
    );
    
    console.log('All transactions to display:', allTransactions);
    
    if (allTransactions.length === 0) {
        transactionsList.innerHTML = `
            <div class="text-center py-8 text-gray-500">
                Nav transakciju šajā mēnesī
            </div>
        `;
        return;
    }
    
    allTransactions.forEach(transaction => {
        console.log('Creating element for transaction:', transaction);
        
        const isIncome = transaction.type === 'income';
        const date = new Date(transaction.transaction_date).toLocaleDateString('lv-LV');
        
        const transactionElement = document.createElement('div');
        transactionElement.className = 'flex items-center justify-between p-4 hover:bg-gray-50';
        transactionElement.innerHTML = `
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center ${isIncome ? 'bg-green-100' : 'bg-red-100'}">
                        <svg class="w-6 h-6 ${isIncome ? 'text-green-600' : 'text-red-600'}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${isIncome ? 'M12 6v6m0 0v6m0-6h6m-6 0H6' : 'M20 12H4'}"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <div class="font-medium text-gray-900">${transaction.category_name || 'Nezināma kategorija'}</div>
                    <div class="text-sm text-gray-500">${transaction.description || ''}</div>
                    <div class="text-xs text-gray-400">${date}</div>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <div class="font-medium ${isIncome ? 'text-green-600' : 'text-red-600'}">
                        ${isIncome ? '+' : '-'}${parseFloat(transaction.amount).toFixed(2)} €
                    </div>
                </div>
                <button onclick="deleteTransaction(${transaction.id})" class="text-gray-400 hover:text-red-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            </div>
        `;
        transactionsList.appendChild(transactionElement);
    });
}

function deleteTransaction(id) {
    if (!confirm('Vai tiešām vēlaties dzēst šo transakciju?')) {
        return;
    }
    
    fetch('api/budget/transactions.php', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: id })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            loadTransactions();
        } else {
            alert(data.error || 'Kļūda dzēšot transakciju');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Kļūda dzēšot transakciju');
    });
}
</script>

<?php include 'includes/footer.php'; ?> 