
// Budget Calculator JavaScript

document.addEventListener('DOMContentLoaded', function() {
    const calculateBtn = document.getElementById('calculate-btn');
    const resultsDiv = document.getElementById('results');
    const recommendationsDiv = document.getElementById('recommendations');
    const recommendationList = document.getElementById('recommendation-list');

    if (calculateBtn) {
        calculateBtn.addEventListener('click', calculateBudget);
    }

    // Add real-time calculation on input change
    const inputs = document.querySelectorAll('#budget-form input[type="number"]');
    inputs.forEach(input => {
        input.addEventListener('input', debounce(calculateBudget, 500));
    });

    function calculateBudget() {
        // Get income values
        const salary = parseFloat(document.getElementById('salary').value) || 0;
        const otherIncome = parseFloat(document.getElementById('other-income').value) || 0;
        const totalIncome = salary + otherIncome;

        // Get expense values
        const housing = parseFloat(document.getElementById('housing').value) || 0;
        const food = parseFloat(document.getElementById('food').value) || 0;
        const transport = parseFloat(document.getElementById('transport').value) || 0;
        const utilities = parseFloat(document.getElementById('utilities').value) || 0;
        const entertainment = parseFloat(document.getElementById('entertainment').value) || 0;
        const otherExpenses = parseFloat(document.getElementById('other-expenses').value) || 0;
        
        const totalExpenses = housing + food + transport + utilities + entertainment + otherExpenses;
        const balance = totalIncome - totalExpenses;
        const savingsRate = totalIncome > 0 ? (balance / totalIncome) * 100 : 0;

        // Display results
        displayResults(totalIncome, totalExpenses, balance, savingsRate);
        
        // Generate recommendations
        generateRecommendations(totalIncome, totalExpenses, balance, {
            housing, food, transport, utilities, entertainment, otherExpenses
        });
    }

    function displayResults(income, expenses, balance, savingsRate) {
        const balanceColor = balance >= 0 ? 'text-green-600' : 'text-red-600';
        const balanceIcon = balance >= 0 ? '📈' : '📉';
        
        resultsDiv.innerHTML = `
            <div class="space-y-4">
                <div class="bg-green-50 p-4 rounded-lg">
                    <div class="flex justify-between items-center">
                        <span class="text-green-700 font-medium">Kopējie ienākumi:</span>
                        <span class="text-green-800 font-semibold">${formatCurrency(income)}</span>
                    </div>
                </div>
                
                <div class="bg-red-50 p-4 rounded-lg">
                    <div class="flex justify-between items-center">
                        <span class="text-red-700 font-medium">Kopējie izdevumi:</span>
                        <span class="text-red-800 font-semibold">${formatCurrency(expenses)}</span>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg border-2 border-gray-200">
                    <div class="flex justify-between items-center">
                        <span class="font-medium">Atlikums:</span>
                        <span class="${balanceColor} font-bold text-xl">${balanceIcon} ${formatCurrency(balance)}</span>
                    </div>
                </div>
                
                ${savingsRate >= 0 ? `
                <div class="bg-blue-50 p-4 rounded-lg">
                    <div class="flex justify-between items-center">
                        <span class="text-blue-700 font-medium">Uzkrājumu līmenis:</span>
                        <span class="text-blue-800 font-semibold">${savingsRate.toFixed(1)}%</span>
                    </div>
                </div>
                ` : ''}
                
                <div class="mt-6">
                    <h4 class="font-medium mb-3">Izdevumu sadalījums:</h4>
                    <div class="space-y-2">
                        ${expenses > 0 ? `
                            <div class="flex justify-between text-sm">
                                <span>Mājoklis:</span>
                                <span>${((parseFloat(document.getElementById('housing').value) || 0) / expenses * 100).toFixed(1)}%</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span>Pārtika:</span>
                                <span>${((parseFloat(document.getElementById('food').value) || 0) / expenses * 100).toFixed(1)}%</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span>Transports:</span>
                                <span>${((parseFloat(document.getElementById('transport').value) || 0) / expenses * 100).toFixed(1)}%</span>
                            </div>
                        ` : '<p class="text-gray-500 text-sm">Nav izdevumu datu</p>'}
                    </div>
                </div>
            </div>
        `;
    }

    function generateRecommendations(income, expenses, balance, expenseBreakdown) {
        const recommendations = [];
        
        // Housing recommendations (should be max 30% of income)
        const housingPercentage = income > 0 ? (expenseBreakdown.housing / income) * 100 : 0;
        if (housingPercentage > 30) {
            recommendations.push({
                type: 'warning',
                text: `Mājokļa izmaksas veido ${housingPercentage.toFixed(1)}% no jūsu ienākumiem. Ieteicams, lai tās nepārsniegtu 30%.`
            });
        }

        // Savings recommendations
        if (balance < 0) {
            recommendations.push({
                type: 'danger',
                text: 'Jūsu izdevumi pārsniedz ienākumus. Jums jāsamazina izdevumi vai jāpalielina ienākumi.'
            });
        } else if (balance > 0 && balance < income * 0.1) {
            recommendations.push({
                type: 'warning',
                text: 'Mēģiniet uzkrāt vismaz 10% no saviem ienākumiem mēnesī.'
            });
        } else if (balance >= income * 0.2) {
            recommendations.push({
                type: 'success',
                text: 'Lieliski! Jūs uzkrājat vairāk nekā 20% no saviem ienākumiem.'
            });
        }

        // Emergency fund recommendation
        if (balance > 0) {
            const monthsOfExpenses = expenses > 0 ? balance / expenses : 0;
            if (monthsOfExpenses < 3) {
                recommendations.push({
                    type: 'info',
                    text: 'Izveidojiet ārkārtas fondu, kas sedz 3-6 mēnešu izdevumus.'
                });
            }
        }

        // Display recommendations
        if (recommendations.length > 0) {
            recommendationList.innerHTML = recommendations.map(rec => `
                <div class="p-3 rounded-lg ${getRecommendationClass(rec.type)}">
                    <p class="text-sm">${rec.text}</p>
                </div>
            `).join('');
            recommendationsDiv.classList.remove('hidden');
        } else {
            recommendationsDiv.classList.add('hidden');
        }
    }

    function getRecommendationClass(type) {
        switch (type) {
            case 'success': return 'bg-green-50 text-green-800 border border-green-200';
            case 'warning': return 'bg-yellow-50 text-yellow-800 border border-yellow-200';
            case 'danger': return 'bg-red-50 text-red-800 border border-red-200';
            case 'info': return 'bg-blue-50 text-blue-800 border border-blue-200';
            default: return 'bg-gray-50 text-gray-800 border border-gray-200';
        }
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('lv-LV', {
            style: 'currency',
            currency: 'EUR',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(amount);
    }

    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
});
