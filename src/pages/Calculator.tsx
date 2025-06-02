import React, { useState, useEffect } from "react";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";
import { PlusCircle, Trash2, Edit, DollarSign, PieChart, BarChart, LineChart } from "lucide-react";
import { Dialog, DialogContent, DialogHeader, DialogTitle, DialogTrigger } from "@/components/ui/dialog";
import { toast } from "sonner";
import { ResponsivePie } from '@nivo/pie';
import { ResponsiveBar } from '@nivo/bar';
import { ResponsiveLine } from '@nivo/line';
import { useApi } from '@/hooks/useApi';

// Types
interface Transaction {
  id: string;
  type: 'income' | 'expense';
  category: string;
  amount: number;
  description: string;
  transaction_date: string;
  date?: string; // For backward compatibility
}

interface Budget {
  id: string;
  category: string;
  amount: number;
  spent: number;
}

interface Categories {
  income: string[];
  expense: string[];
}

const Calculator = () => {
  const [transactions, setTransactions] = useState<Transaction[]>([]);
  const [budgets, setBudgets] = useState<Budget[]>([]);
  const [categories, setCategories] = useState<Categories>({ income: [], expense: [] });
  const [isLoading, setIsLoading] = useState(true);

  const {
    saveTransaction,
    getTransactions,
    updateTransaction,
    deleteTransaction,
    saveBudget,
    getBudgets,
    updateBudget,
    deleteBudget,
    getCategories,
  } = useApi();

  const [newTransaction, setNewTransaction] = useState<Omit<Transaction, 'id'>>({
    type: 'income',
    category: '',
    amount: 0,
    description: '',
    transaction_date: new Date().toISOString().split('T')[0]
  });
  
  const [newBudget, setNewBudget] = useState<Omit<Budget, 'id' | 'spent'>>({
    category: '',
    amount: 0
  });

  const [editingTransaction, setEditingTransaction] = useState<Transaction | null>(null);
  const [editingBudget, setEditingBudget] = useState<Budget | null>(null);

  // Load data on component mount
  useEffect(() => {
    loadData();
  }, []);

  const loadData = async () => {
    setIsLoading(true);
    try {
      const [categoriesResult, transactionsResult, budgetsResult] = await Promise.all([
        getCategories(),
        getTransactions(),
        getBudgets()
      ]);

      if (categoriesResult.success) {
        setCategories(categoriesResult.data.categories);
      }

      if (transactionsResult.success) {
        // Normalize transaction dates
        const normalizedTransactions = transactionsResult.data.transactions.map((t: any) => ({
          ...t,
          date: t.transaction_date,
        }));
        setTransactions(normalizedTransactions);
      }

      if (budgetsResult.success) {
        setBudgets(budgetsResult.data.budgets);
      }
    } catch (error) {
      toast.error('Failed to load data');
      console.error('Load data error:', error);
    } finally {
      setIsLoading(false);
    }
  };

  // Transaction handlers
  const handleAddTransaction = async () => {
    if (!newTransaction.category || newTransaction.amount <= 0) {
      toast.error("Lūdzu, aizpildiet visus obligātos laukus");
      return;
    }
    
    const result = await saveTransaction({
      ...newTransaction,
      date: newTransaction.transaction_date
    });
    
    if (result.success) {
      await loadData(); // Reload data to get updated spent amounts
      setNewTransaction({
        type: 'income',
        category: '',
        amount: 0,
        description: '',
        transaction_date: new Date().toISOString().split('T')[0]
      });
      toast.success(`${newTransaction.type === 'income' ? 'Ienākumi' : 'Izdevumi'} veiksmīgi pievienoti`);
    }
  };

  const handleUpdateTransaction = async () => {
    if (!editingTransaction) return;
    
    const result = await updateTransaction({
      ...editingTransaction,
      date: editingTransaction.transaction_date
    });
    
    if (result.success) {
      await loadData();
      setEditingTransaction(null);
      toast.success("Darījums veiksmīgi atjaunināts");
    }
  };

  const handleDeleteTransaction = async (id: string) => {
    const result = await deleteTransaction(id);
    
    if (result.success) {
      await loadData();
      toast.success("Darījums veiksmīgi dzēsts");
    }
  };

  // Budget handlers
  const handleAddBudget = async () => {
    if (!newBudget.category || newBudget.amount <= 0) {
      toast.error("Lūdzu, aizpildiet visus obligātos laukus");
      return;
    }
    
    // Check if budget for this category already exists
    const existingBudget = budgets.find(b => b.category === newBudget.category);
    if (existingBudget) {
      toast.error("Šai kategorijai jau pastāv budžets");
      return;
    }
    
    const result = await saveBudget(newBudget);
    
    if (result.success) {
      await loadData();
      setNewBudget({
        category: '',
        amount: 0
      });
      toast.success("Budžets veiksmīgi pievienots");
    }
  };

  const handleUpdateBudget = async () => {
    if (!editingBudget) return;
    
    const result = await updateBudget(editingBudget);
    
    if (result.success) {
      await loadData();
      setEditingBudget(null);
      toast.success("Budžets veiksmīgi atjaunināts");
    }
  };

  const handleDeleteBudget = async (id: string) => {
    const result = await deleteBudget(id);
    
    if (result.success) {
      await loadData();
      toast.success("Budžets veiksmīgi dzēsts");
    }
  };

  // Calculate totals for dashboard
  const totalIncome = transactions
    .filter(t => t.type === 'income')
    .reduce((sum, t) => sum + Number(t.amount), 0);
  
  const totalExpenses = transactions
    .filter(t => t.type === 'expense')
    .reduce((sum, t) => sum + Number(t.amount), 0);
  
  const balance = totalIncome - totalExpenses;

  // Prepare data for charts
  const pieChartData = categories.expense.map(category => {
    const amount = transactions
      .filter(t => t.type === 'expense' && t.category === category)
      .reduce((sum, t) => sum + Number(t.amount), 0);
    
    return {
      id: category,
      label: category,
      value: amount,
    };
  }).filter(item => item.value > 0);

  const barChartData = categories.expense.map(category => {
    const amount = transactions
      .filter(t => t.type === 'expense' && t.category === category)
      .reduce((sum, t) => sum + Number(t.amount), 0);
    
    const budget = budgets.find(b => b.category === category)?.amount || 0;
    
    return {
      category,
      spent: amount,
      budget: budget
    };
  }).filter(item => item.spent > 0 || item.budget > 0);

  // Group transactions by date for line chart
  const lineChartData = [
    {
      id: "income",
      data: Array.from(
        transactions
          .filter(t => t.type === 'income')
          .reduce((acc, t) => {
            const date = t.transaction_date || t.date || '';
            acc.set(date, (acc.get(date) || 0) + Number(t.amount));
            return acc;
          }, new Map())
      )
        .map(([x, y]) => ({ x, y }))
        .sort((a, b) => a.x.localeCompare(b.x))
    },
    {
      id: "expense",
      data: Array.from(
        transactions
          .filter(t => t.type === 'expense')
          .reduce((acc, t) => {
            const date = t.transaction_date || t.date || '';
            acc.set(date, (acc.get(date) || 0) + Number(t.amount));
            return acc;
          }, new Map())
      )
        .map(([x, y]) => ({ x, y }))
        .sort((a, b) => a.x.localeCompare(b.x))
    }
  ];

  if (isLoading) {
    return (
      <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div className="flex items-center justify-center min-h-[400px]">
          <div className="text-lg">Ielādē datus...</div>
        </div>
      </div>
    );
  }

  return (
    <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
      <h1 className="text-3xl font-bold mb-6">Finanšu Kalkulators</h1>
      
      {/* Dashboard Summary */}
      <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <Card className={`card-hover ${balance >= 0 ? "border-green-500" : "border-red-500"}`}>
          <CardHeader className="pb-2">
            <CardTitle className="text-gray-600 text-sm">Pašreizējā Bilance</CardTitle>
          </CardHeader>
          <CardContent>
            <div className={`text-2xl font-bold ${balance >= 0 ? "text-green-600" : "text-red-500"}`}>
              €{balance.toLocaleString()}
            </div>
          </CardContent>
        </Card>
        
        <Card className="card-hover border-green-500">
          <CardHeader className="pb-2">
            <CardTitle className="text-gray-600 text-sm">Kopējie Ienākumi</CardTitle>
          </CardHeader>
          <CardContent>
            <div className="text-2xl font-bold text-green-600">
              €{totalIncome.toLocaleString()}
            </div>
          </CardContent>
        </Card>
        
        <Card className="card-hover border-red-400">
          <CardHeader className="pb-2">
            <CardTitle className="text-gray-600 text-sm">Kopējie Izdevumi</CardTitle>
          </CardHeader>
          <CardContent>
            <div className="text-2xl font-bold text-red-500">
              €{totalExpenses.toLocaleString()}
            </div>
          </CardContent>
        </Card>
      </div>
      
      {/* Main Content Tabs */}
      <Tabs defaultValue="transactions" className="w-full">
        <TabsList className="grid grid-cols-3 mb-8">
          <TabsTrigger value="transactions" className="text-base py-3">
            Darījumi
          </TabsTrigger>
          <TabsTrigger value="budgets" className="text-base py-3">
            Budžeti
          </TabsTrigger>
          <TabsTrigger value="charts" className="text-base py-3">
            Diagrammas un Pārskati
          </TabsTrigger>
        </TabsList>
        
        {/* Transactions Tab */}
        <TabsContent value="transactions" className="space-y-6">
          <Card>
            <CardHeader>
              <div className="flex items-center justify-between">
                <CardTitle>Pievienot Jaunu Darījumu</CardTitle>
                <Dialog>
                  <DialogTrigger asChild>
                    <Button variant="outline" size="sm">
                      <PlusCircle className="mr-2 h-4 w-4" />
                      Pievienot Darījumu
                    </Button>
                  </DialogTrigger>
                  <DialogContent>
                    <DialogHeader>
                      <DialogTitle>Pievienot Jaunu Darījumu</DialogTitle>
                    </DialogHeader>
                    <div className="grid gap-4 py-4">
                      <div className="grid grid-cols-2 gap-4">
                        <div>
                          <Label htmlFor="transaction-type">Veids</Label>
                          <Select
                            value={newTransaction.type}
                            onValueChange={(value) => setNewTransaction({...newTransaction, type: value as 'income' | 'expense'})}
                          >
                            <SelectTrigger id="transaction-type">
                              <SelectValue placeholder="Izvēlieties veidu" />
                            </SelectTrigger>
                            <SelectContent>
                              <SelectItem value="income">Ienākumi</SelectItem>
                              <SelectItem value="expense">Izdevumi</SelectItem>
                            </SelectContent>
                          </Select>
                        </div>
                        
                        <div>
                          <Label htmlFor="transaction-category">Kategorija</Label>
                          <Select
                            value={newTransaction.category}
                            onValueChange={(value) => setNewTransaction({...newTransaction, category: value})}
                          >
                            <SelectTrigger id="transaction-category">
                              <SelectValue placeholder="Izvēlieties kategoriju" />
                            </SelectTrigger>
                            <SelectContent>
                              {newTransaction.type === 'income' 
                                ? categories.income.map(category => (
                                    <SelectItem key={category} value={category}>{category}</SelectItem>
                                  ))
                                : categories.expense.map(category => (
                                    <SelectItem key={category} value={category}>{category}</SelectItem>
                                  ))
                              }
                            </SelectContent>
                          </Select>
                        </div>
                      </div>
                      
                      <div className="grid grid-cols-2 gap-4">
                        <div>
                          <Label htmlFor="transaction-amount">Summa</Label>
                          <div className="relative">
                            <DollarSign className="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-500" />
                            <Input
                              id="transaction-amount"
                              type="number"
                              placeholder="0.00"
                              className="pl-10"
                              value={newTransaction.amount || ''}
                              onChange={(e) => setNewTransaction({...newTransaction, amount: parseFloat(e.target.value) || 0})}
                            />
                          </div>
                        </div>
                        
                        <div>
                          <Label htmlFor="transaction-date">Datums</Label>
                          <Input
                            id="transaction-date"
                            type="date"
                            value={newTransaction.transaction_date}
                            onChange={(e) => setNewTransaction({...newTransaction, transaction_date: e.target.value})}
                          />
                        </div>
                      </div>
                      
                      <div>
                        <Label htmlFor="transaction-description">Apraksts</Label>
                        <Input
                          id="transaction-description"
                          placeholder="Ievadiet aprakstu"
                          value={newTransaction.description}
                          onChange={(e) => setNewTransaction({...newTransaction, description: e.target.value})}
                        />
                      </div>
                      
                      <Button onClick={handleAddTransaction}>Pievienot Darījumu</Button>
                    </div>
                  </DialogContent>
                </Dialog>
              </div>
            </CardHeader>
            <CardContent>
              {transactions.length > 0 ? (
                <div className="rounded-md border overflow-hidden">
                  <div className="overflow-x-auto">
                    <table className="w-full text-sm">
                      <thead className="bg-gray-50">
                        <tr>
                          <th className="px-4 py-3 text-left font-medium text-gray-500">Datums</th>
                          <th className="px-4 py-3 text-left font-medium text-gray-500">Veids</th>
                          <th className="px-4 py-3 text-left font-medium text-gray-500">Kategorija</th>
                          <th className="px-4 py-3 text-left font-medium text-gray-500">Apraksts</th>
                          <th className="px-4 py-3 text-right font-medium text-gray-500">Summa</th>
                          <th className="px-4 py-3 text-right font-medium text-gray-500">Darbības</th>
                        </tr>
                      </thead>
                      <tbody className="divide-y">
                        {transactions.map((transaction) => (
                          <tr key={transaction.id} className="bg-white">
                            <td className="px-4 py-3 text-gray-900">{new Date(transaction.transaction_date || transaction.date || '').toLocaleDateString()}</td>
                            <td className="px-4 py-3">
                              <span className={`inline-block rounded-full px-2 py-1 text-xs font-semibold ${
                                transaction.type === 'income' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'
                              }`}>
                                {transaction.type === 'income' ? 'Ienākumi' : 'Izdevumi'}
                              </span>
                            </td>
                            <td className="px-4 py-3 text-gray-900">{transaction.category}</td>
                            <td className="px-4 py-3 text-gray-600">{transaction.description}</td>
                            <td className={`px-4 py-3 text-right font-medium ${
                              transaction.type === 'income' ? 'text-green-600' : 'text-red-500'
                            }`}>
                              {transaction.type === 'income' ? '+' : '-'}€{Number(transaction.amount).toLocaleString()}
                            </td>
                            <td className="px-4 py-3 text-right">
                              <div className="flex justify-end gap-2">
                                <Dialog>
                                  <DialogTrigger asChild>
                                    <Button 
                                      variant="ghost" 
                                      size="icon"
                                      onClick={() => setEditingTransaction({
                                        ...transaction,
                                        transaction_date: transaction.transaction_date || transaction.date || ''
                                      })}
                                    >
                                      <Edit className="h-4 w-4" />
                                    </Button>
                                  </DialogTrigger>
                                  <DialogContent>
                                    <DialogHeader>
                                      <DialogTitle>Rediģēt Darījumu</DialogTitle>
                                    </DialogHeader>
                                    {editingTransaction && (
                                      <div className="grid gap-4 py-4">
                                        <div className="grid grid-cols-2 gap-4">
                                          <div>
                                            <Label htmlFor="edit-transaction-type">Veids</Label>
                                            <Select
                                              value={editingTransaction.type}
                                              onValueChange={(value) => setEditingTransaction({
                                                ...editingTransaction, 
                                                type: value as 'income' | 'expense'
                                              })}
                                            >
                                              <SelectTrigger id="edit-transaction-type">
                                                <SelectValue placeholder="Izvēlieties veidu" />
                                              </SelectTrigger>
                                              <SelectContent>
                                                <SelectItem value="income">Ienākumi</SelectItem>
                                                <SelectItem value="expense">Izdevumi</SelectItem>
                                              </SelectContent>
                                            </Select>
                                          </div>
                                          
                                          <div>
                                            <Label htmlFor="edit-transaction-category">Kategorija</Label>
                                            <Select
                                              value={editingTransaction.category}
                                              onValueChange={(value) => setEditingTransaction({
                                                ...editingTransaction, 
                                                category: value
                                              })}
                                            >
                                              <SelectTrigger id="edit-transaction-category">
                                                <SelectValue placeholder="Izvēlieties kategoriju" />
                                              </SelectTrigger>
                                              <SelectContent>
                                                {editingTransaction.type === 'income' 
                                                  ? categories.income.map(category => (
                                                      <SelectItem key={category} value={category}>{category}</SelectItem>
                                                    ))
                                                  : categories.expense.map(category => (
                                                      <SelectItem key={category} value={category}>{category}</SelectItem>
                                                    ))
                                                }
                                              </SelectContent>
                                            </Select>
                                          </div>
                                        </div>
                                        
                                        <div className="grid grid-cols-2 gap-4">
                                          <div>
                                            <Label htmlFor="edit-transaction-amount">Summa</Label>
                                            <div className="relative">
                                              <DollarSign className="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-500" />
                                              <Input
                                                id="edit-transaction-amount"
                                                type="number"
                                                placeholder="0.00"
                                                className="pl-10"
                                                value={editingTransaction.amount || ''}
                                                onChange={(e) => setEditingTransaction({
                                                  ...editingTransaction, 
                                                  amount: parseFloat(e.target.value) || 0
                                                })}
                                              />
                                            </div>
                                          </div>
                                          
                                          <div>
                                            <Label htmlFor="edit-transaction-date">Datums</Label>
                                            <Input
                                              id="edit-transaction-date"
                                              type="date"
                                              value={editingTransaction.transaction_date}
                                              onChange={(e) => setEditingTransaction({
                                                ...editingTransaction, 
                                                transaction_date: e.target.value
                                              })}
                                            />
                                          </div>
                                        </div>
                                        
                                        <div>
                                          <Label htmlFor="edit-transaction-description">Apraksts</Label>
                                          <Input
                                            id="edit-transaction-description"
                                            placeholder="Ievadiet aprakstu"
                                            value={editingTransaction.description}
                                            onChange={(e) => setEditingTransaction({
                                              ...editingTransaction, 
                                              description: e.target.value
                                            })}
                                          />
                                        </div>
                                        
                                        <Button onClick={handleUpdateTransaction}>Atjaunināt Darījumu</Button>
                                      </div>
                                    )}
                                  </DialogContent>
                                </Dialog>
                                
                                <Button 
                                  variant="ghost" 
                                  size="icon"
                                  onClick={() => handleDeleteTransaction(transaction.id)}
                                >
                                  <Trash2 className="h-4 w-4" />
                                </Button>
                              </div>
                            </td>
                          </tr>
                        ))}
                      </tbody>
                    </table>
                  </div>
                </div>
              ) : (
                <div className="text-center py-10">
                  <p className="text-gray-500">Pagaidām nav darījumu. Pievienojiet vienu, lai sāktu!</p>
                </div>
              )}
            </CardContent>
          </Card>
        </TabsContent>
        
        {/* Budgets Tab */}
        <TabsContent value="budgets" className="space-y-6">
          <Card>
            <CardHeader>
              <div className="flex items-center justify-between">
                <CardTitle>Budžeti</CardTitle>
                <Dialog>
                  <DialogTrigger asChild>
                    <Button variant="outline" size="sm">
                      <PlusCircle className="mr-2 h-4 w-4" />
                      Pievienot Budžetu
                    </Button>
                  </DialogTrigger>
                  <DialogContent>
                    <DialogHeader>
                      <DialogTitle>Pievienot Jaunu Budžetu</DialogTitle>
                    </DialogHeader>
                    <div className="grid gap-4 py-4">
                      <div>
                        <Label htmlFor="budget-category">Kategorija</Label>
                        <Select
                          value={newBudget.category}
                          onValueChange={(value) => setNewBudget({...newBudget, category: value})}
                        >
                          <SelectTrigger id="budget-category">
                            <SelectValue placeholder="Izvēlieties kategoriju" />
                          </SelectTrigger>
                          <SelectContent>
                            {categories.expense.map(category => (
                              <SelectItem key={category} value={category}>{category}</SelectItem>
                            ))}
                          </SelectContent>
                        </Select>
                      </div>
                      
                      <div>
                        <Label htmlFor="budget-amount">Ikmēneša Budžeta Summa</Label>
                        <div className="relative">
                          <DollarSign className="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-500" />
                          <Input
                            id="budget-amount"
                            type="number"
                            placeholder="0.00"
                            className="pl-10"
                            value={newBudget.amount || ''}
                            onChange={(e) => setNewBudget({...newBudget, amount: parseFloat(e.target.value) || 0})}
                          />
                        </div>
                      </div>
                      
                      <Button onClick={handleAddBudget}>Pievienot Budžetu</Button>
                    </div>
                  </DialogContent>
                </Dialog>
              </div>
            </CardHeader>
            <CardContent>
              {budgets.length > 0 ? (
                <div className="space-y-4">
                  {budgets.map((budget) => {
                    const percentage = Math.min(100, Math.round((Number(budget.spent) / Number(budget.amount)) * 100));
                    const remaining = Number(budget.amount) - Number(budget.spent);
                    
                    let progressColor = "bg-green-500";
                    if (percentage >= 75 && percentage < 100) {
                      progressColor = "bg-yellow-500";
                    } else if (percentage >= 100) {
                      progressColor = "bg-red-500";
                    }
                    
                    return (
                      <Card key={budget.id} className="card-hover overflow-hidden">
                        <CardContent className="p-6">
                          <div className="flex items-center justify-between mb-4">
                            <div>
                              <h3 className="text-lg font-medium">{budget.category}</h3>
                              <p className="text-sm text-gray-500">
                                €{Number(budget.spent).toLocaleString()} no €{Number(budget.amount).toLocaleString()}
                              </p>
                            </div>
                            <div className="flex gap-2">
                              <Dialog>
                                <DialogTrigger asChild>
                                  <Button 
                                    variant="ghost" 
                                    size="icon"
                                    onClick={() => setEditingBudget({...budget})}
                                  >
                                    <Edit className="h-4 w-4" />
                                  </Button>
                                </DialogTrigger>
                                <DialogContent>
                                  <DialogHeader>
                                    <DialogTitle>Rediģēt Budžetu</DialogTitle>
                                  </DialogHeader>
                                  {editingBudget && (
                                    <div className="grid gap-4 py-4">
                                      <div>
                                        <Label htmlFor="edit-budget-category">Kategorija</Label>
                                        <Select
                                          value={editingBudget.category}
                                          onValueChange={(value) => setEditingBudget({
                                            ...editingBudget, 
                                            category: value
                                          })}
                                        >
                                          <SelectTrigger id="edit-budget-category">
                                            <SelectValue placeholder="Izvēlieties kategoriju" />
                                          </SelectTrigger>
                                          <SelectContent>
                                            {categories.expense.map(category => (
                                              <SelectItem key={category} value={category}>{category}</SelectItem>
                                            ))}
                                          </SelectContent>
                                        </Select>
                                      </div>
                                      
                                      <div>
                                        <Label htmlFor="edit-budget-amount">Ikmēneša Budžeta Summa</Label>
                                        <div className="relative">
                                          <DollarSign className="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-500" />
                                          <Input
                                            id="edit-budget-amount"
                                            type="number"
                                            placeholder="0.00"
                                            className="pl-10"
                                            value={editingBudget.amount || ''}
                                            onChange={(e) => setEditingBudget({
                                              ...editingBudget, 
                                              amount: parseFloat(e.target.value) || 0
                                            })}
                                          />
                                        </div>
                                      </div>
                                      
                                      <Button onClick={handleUpdateBudget}>Atjaunināt Budžetu</Button>
                                    </div>
                                  )}
                                </DialogContent>
                              </Dialog>
                              
                              <Button 
                                variant="ghost" 
                                size="icon"
                                onClick={() => handleDeleteBudget(budget.id)}
                              >
                                <Trash2 className="h-4 w-4" />
                              </Button>
                            </div>
                          </div>
                          
                          <div className="w-full bg-gray-200 rounded-full h-2.5">
                            <div 
                              className={`h-2.5 rounded-full ${progressColor}`}
                              style={{ width: `${percentage}%` }}
                            ></div>
                          </div>
                          
                          <div className="flex justify-between mt-2 text-sm">
                            <span className="text-gray-500">{percentage}% izmantots</span>
                            <span className={remaining >= 0 ? "text-green-600" : "text-red-500"}>
                              {remaining >= 0 ? `€${remaining.toLocaleString()} atlikums` : `€${Math.abs(remaining).toLocaleString()} pārsniegts budžets`}
                            </span>
                          </div>
                        </CardContent>
                      </Card>
                    );
                  })}
                </div>
              ) : (
                <div className="text-center py-10">
                  <p className="text-gray-500">Pagaidām nav budžetu. Pievienojiet vienu, lai sāktu!</p>
                </div>
              )}
            </CardContent>
          </Card>
        </TabsContent>
        
        {/* Charts Tab */}
        <TabsContent value="charts" className="space-y-6">
          <Tabs defaultValue="pie">
            <TabsList className="mb-6">
              <TabsTrigger value="pie" className="flex items-center">
                <PieChart className="mr-2 h-4 w-4" />
                Sektoru Diagramma
              </TabsTrigger>
              <TabsTrigger value="bar" className="flex items-center">
                <BarChart className="mr-2 h-4 w-4" />
                Joslu Diagramma
              </TabsTrigger>
              <TabsTrigger value="line" className="flex items-center">
                <LineChart className="mr-2 h-4 w-4" />
                Līniju Diagramma
              </TabsTrigger>
            </TabsList>
            
            <TabsContent value="pie">
              <Card>
                <CardHeader>
                  <CardTitle>Izdevumu Sadalījums</CardTitle>
                </CardHeader>
                <CardContent>
                  {pieChartData.length > 0 ? (
                    <div style={{ height: 400 }}>
                      <ResponsivePie
                        data={pieChartData}
                        margin={{ top: 40, right: 80, bottom: 80, left: 80 }}
                        innerRadius={0.5}
                        padAngle={0.7}
                        cornerRadius={3}
                        activeOuterRadiusOffset={8}
                        colors={{ scheme: 'greens' }}
                        borderWidth={1}
                        borderColor={{ from: 'color', modifiers: [['darker', 0.2]] }}
                        arcLinkLabelsSkipAngle={10}
                        arcLinkLabelsTextColor="#333333"
                        arcLinkLabelsThickness={2}
                        arcLinkLabelsColor={{ from: 'color' }}
                        arcLabelsSkipAngle={10}
                        arcLabelsTextColor={{ from: 'color', modifiers: [['darker', 2]] }}
                        legends={[
                          {
                            anchor: 'bottom',
                            direction: 'row',
                            justify: false,
                            translateX: 0,
                            translateY: 56,
                            itemsSpacing: 0,
                            itemWidth: 100,
                            itemHeight: 18,
                            itemTextColor: '#999',
                            itemDirection: 'left-to-right',
                            itemOpacity: 1,
                            symbolSize: 18,
                            symbolShape: 'circle'
                          }
                        ]}
                      />
                    </div>
                  ) : (
                    <div className="text-center py-20">
                      <p className="text-gray-500">Nav izdevumu datu, ko attēlot</p>
                    </div>
                  )}
                </CardContent>
              </Card>
            </TabsContent>
            
            <TabsContent value="bar">
              <Card>
                <CardHeader>
                  <CardTitle>Budžets vs. Izdevumi</CardTitle>
                </CardHeader>
                <CardContent>
                  {barChartData.length > 0 ? (
                    <div style={{ height: 400 }}>
                      <ResponsiveBar
                        data={barChartData}
                        keys={['spent', 'budget']}
                        indexBy="category"
                        margin={{ top: 50, right: 130, bottom: 50, left: 60 }}
                        padding={0.3}
                        groupMode="grouped"
                        colors={['#ef4444', '#22c55e']}
                        borderColor={{ from: 'color', modifiers: [['darker', 1.6]] }}
                        axisTop={null}
                        axisRight={null}
                        axisBottom={{
                          tickSize: 5,
                          tickPadding: 5,
                          tickRotation: 0,
                          legend: 'Kategorija',
                          legendPosition: 'middle',
                          legendOffset: 32
                        }}
                        axisLeft={{
                          tickSize: 5,
                          tickPadding: 5,
                          tickRotation: 0,
                          legend: 'Summa (€)',
                          legendPosition: 'middle',
                          legendOffset: -40
                        }}
                        labelSkipWidth={12}
                        labelSkipHeight={12}
                        legends={[
                          {
                            dataFrom: 'keys',
                            anchor: 'bottom-right',
                            direction: 'column',
                            justify: false,
                            translateX: 120,
                            translateY: 0,
                            itemsSpacing: 2,
                            itemWidth: 100,
                            itemHeight: 20,
                            itemDirection: 'left-to-right',
                            itemOpacity: 0.85,
                            symbolSize: 20
                          }
                        ]}
                        animate={true}
                      />
                    </div>
                  ) : (
                    <div className="text-center py-20">
                      <p className="text-gray-500">Nav budžeta datu, ko attēlot</p>
                    </div>
                  )}
                </CardContent>
              </Card>
            </TabsContent>
            
            <TabsContent value="line">
              <Card>
                <CardHeader>
                  <CardTitle>Ienākumu un Izdevumu Tendences</CardTitle>
                </CardHeader>
                <CardContent>
                  {lineChartData[0].data.length > 0 || lineChartData[1].data.length > 0 ? (
                    <div style={{ height: 400 }}>
                      <ResponsiveLine
                        data={lineChartData}
                        margin={{ top: 50, right: 110, bottom: 50, left: 60 }}
                        xScale={{ type: 'point' }}
                        yScale={{ type: 'linear', min: 'auto', max: 'auto', stacked: false, reverse: false }}
                        yFormat=" >-.2f"
                        axisTop={null}
                        axisRight={null}
                        axisBottom={{
                          tickSize: 5,
                          tickPadding: 5,
                          tickRotation: -45,
                          legend: 'Datums',
                          legendOffset: 36,
                          legendPosition: 'middle'
                        }}
                        axisLeft={{
                          tickSize: 5,
                          tickPadding: 5,
                          tickRotation: 0,
                          legend: 'Summa (€)',
                          legendOffset: -40,
                          legendPosition: 'middle'
                        }}
                        colors={['#22c55e', '#ef4444']}
                        pointSize={10}
                        pointColor={{ theme: 'background' }}
                        pointBorderWidth={2}
                        pointBorderColor={{ from: 'serieColor' }}
                        pointLabelYOffset={-12}
                        useMesh={true}
                        legends={[
                          {
                            anchor: 'bottom-right',
                            direction: 'column',
                            justify: false,
                            translateX: 100,
                            translateY: 0,
                            itemsSpacing: 0,
                            itemDirection: 'left-to-right',
                            itemWidth: 80,
                            itemHeight: 20,
                            itemOpacity: 0.75,
                            symbolSize: 12,
                            symbolShape: 'circle',
                            symbolBorderColor: 'rgba(0, 0, 0, .5)'
                          }
                        ]}
                      />
                    </div>
                  ) : (
                    <div className="text-center py-20">
                      <p className="text-gray-500">Nav tendenču datu, ko attēlot</p>
                    </div>
                  )}
                </CardContent>
              </Card>
            </TabsContent>
          </Tabs>
        </TabsContent>
      </Tabs>
    </div>
  );
};

export default Calculator;
