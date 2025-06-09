-- Create budget categories table
CREATE TABLE IF NOT EXISTS budget_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    type ENUM('income', 'expense') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create budget transactions table
CREATE TABLE IF NOT EXISTS budget_transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    category_id INT NOT NULL,
    type ENUM('income', 'expense') NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    description TEXT,
    transaction_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES budget_categories(id) ON DELETE RESTRICT
);

-- Insert default categories
INSERT INTO budget_categories (name, type) VALUES
-- Income categories
('Alga', 'income'),
('Freelance', 'income'),
('Investīcijas', 'income'),
('Pabalsti', 'income'),
('Citi ienākumi', 'income'),

-- Expense categories
('Pārtika', 'expense'),
('Transports', 'expense'),
('Komunālie', 'expense'),
('Izklaide', 'expense'),
('Apģērbs', 'expense'),
('Svešvaloda', 'expense'),
('Citi izdevumi', 'expense'); 