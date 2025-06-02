
// Helper functions for chart data preparation

export interface Transaction {
  id: string;
  type: 'income' | 'expense';
  category: string;
  amount: number;
  description: string;
  date: string;
}

export interface Budget {
  id: string;
  category: string;
  amount: number;
  spent: number;
}

export const prepareExpensePieChart = (transactions: Transaction[]) => {
  // Group expenses by category
  const expensesByCategory = transactions
    .filter(t => t.type === 'expense')
    .reduce((acc, transaction) => {
      const { category, amount } = transaction;
      acc[category] = (acc[category] || 0) + amount;
      return acc;
    }, {} as Record<string, number>);
  
  // Convert to array format needed for pie chart
  return Object.entries(expensesByCategory).map(([category, value]) => ({
    id: category,
    label: category,
    value,
  }));
};

export const prepareBudgetBarChart = (budgets: Budget[], transactions: Transaction[]) => {
  return budgets.map(budget => {
    const spent = transactions
      .filter(t => t.type === 'expense' && t.category === budget.category)
      .reduce((sum, t) => sum + t.amount, 0);
    
    return {
      category: budget.category,
      spent: spent,
      budget: budget.amount,
      remaining: Math.max(0, budget.amount - spent)
    };
  });
};

export const prepareTimeSeriesData = (transactions: Transaction[]) => {
  // Group transactions by date and type
  const incomeByDate = new Map<string, number>();
  const expenseByDate = new Map<string, number>();
  
  transactions.forEach(transaction => {
    const { date, type, amount } = transaction;
    if (type === 'income') {
      incomeByDate.set(date, (incomeByDate.get(date) || 0) + amount);
    } else {
      expenseByDate.set(date, (expenseByDate.get(date) || 0) + amount);
    }
  });
  
  // Get all unique dates
  const allDates = [...new Set([...incomeByDate.keys(), ...expenseByDate.keys()])].sort();
  
  // Create series data
  return [
    {
      id: 'Income',
      color: '#22c55e', // green
      data: allDates.map(date => ({
        x: date,
        y: incomeByDate.get(date) || 0
      }))
    },
    {
      id: 'Expenses',
      color: '#ef4444', // red
      data: allDates.map(date => ({
        x: date,
        y: expenseByDate.get(date) || 0
      }))
    }
  ];
};
