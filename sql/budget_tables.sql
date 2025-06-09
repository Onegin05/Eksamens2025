-- Create budget categories table
CREATE TABLE IF NOT EXISTS budget_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create budget entries table
CREATE TABLE IF NOT EXISTS budget_entries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    type ENUM('income', 'expense') NOT NULL,
    category_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    date DATE NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES budget_categories(id) ON DELETE RESTRICT
);

-- Insert default budget categories
INSERT INTO budget_categories (name) VALUES
('Alga'),
('Pabalsti'),
('Investīcijas'),
('Citi ienākumi'),
('Pārtika'),
('Transporta izdevumi'),
('Komunālie maksājumi'),
('Apdrošināšana'),
('Izglītība'),
('Izklaide'),
('Apģērbs'),
('Svešvalodas'),
('Citi izdevumi'); 