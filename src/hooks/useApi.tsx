
import { useState, useEffect } from 'react';
import { toast } from 'sonner';

interface ApiResponse<T> {
  success: boolean;
  data?: T;
  error?: string;
}

export const useApi = () => {
  const [isLoading, setIsLoading] = useState(false);

  const apiCall = async <T,>(
    endpoint: string,
    options: RequestInit = {}
  ): Promise<ApiResponse<T>> => {
    setIsLoading(true);
    try {
      const response = await fetch(`/api/${endpoint}`, {
        headers: {
          'Content-Type': 'application/json',
          ...options.headers,
        },
        ...options,
      });

      const data = await response.json();
      
      if (!response.ok) {
        return { success: false, error: data.error || 'API error' };
      }

      return { success: true, data };
    } catch (error) {
      return { 
        success: false, 
        error: error instanceof Error ? error.message : 'Network error' 
      };
    } finally {
      setIsLoading(false);
    }
  };

  // Transaction API calls
  const saveTransaction = async (transaction: any) => {
    const result = await apiCall('transactions/save.php', {
      method: 'POST',
      body: JSON.stringify(transaction),
    });
    
    if (!result.success) {
      toast.error(result.error || 'Failed to save transaction');
    }
    
    return result;
  };

  const getTransactions = async () => {
    return await apiCall('transactions/list.php');
  };

  const updateTransaction = async (transaction: any) => {
    const result = await apiCall('transactions/update.php', {
      method: 'PUT',
      body: JSON.stringify(transaction),
    });
    
    if (!result.success) {
      toast.error(result.error || 'Failed to update transaction');
    }
    
    return result;
  };

  const deleteTransaction = async (id: string) => {
    const result = await apiCall('transactions/delete.php', {
      method: 'DELETE',
      body: JSON.stringify({ id }),
    });
    
    if (!result.success) {
      toast.error(result.error || 'Failed to delete transaction');
    }
    
    return result;
  };

  // Budget API calls
  const saveBudget = async (budget: any) => {
    const result = await apiCall('budgets/save.php', {
      method: 'POST',
      body: JSON.stringify(budget),
    });
    
    if (!result.success) {
      toast.error(result.error || 'Failed to save budget');
    }
    
    return result;
  };

  const getBudgets = async () => {
    return await apiCall('budgets/list.php');
  };

  const updateBudget = async (budget: any) => {
    const result = await apiCall('budgets/update.php', {
      method: 'PUT',
      body: JSON.stringify(budget),
    });
    
    if (!result.success) {
      toast.error(result.error || 'Failed to update budget');
    }
    
    return result;
  };

  const deleteBudget = async (id: string) => {
    const result = await apiCall('budgets/delete.php', {
      method: 'DELETE',
      body: JSON.stringify({ id }),
    });
    
    if (!result.success) {
      toast.error(result.error || 'Failed to delete budget');
    }
    
    return result;
  };

  // Categories API calls
  const getCategories = async () => {
    return await apiCall('categories/list.php');
  };

  return {
    isLoading,
    saveTransaction,
    getTransactions,
    updateTransaction,
    deleteTransaction,
    saveBudget,
    getBudgets,
    updateBudget,
    deleteBudget,
    getCategories,
  };
};
