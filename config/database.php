<?php
$serveris = "localhost"; 
$lietotajs = "grobina1_cebotars"; 
$parole = "pr4lpgCz@"; 
$db = "grobina1_cebotars"; 

$savienojums = mysqli_connect($serveris, $lietotajs, $parole, $db);
if (!$savienojums) {
    die("Kļūda: " . mysqli_connect_error());
}

// Users table
mysqli_query($savienojums, "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)");

// Budget data table
mysqli_query($savienojums, "CREATE TABLE IF NOT EXISTS budget_calculations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    salary DECIMAL(10,2) DEFAULT 0,
    other_income DECIMAL(10,2) DEFAULT 0,
    housing DECIMAL(10,2) DEFAULT 0,
    food DECIMAL(10,2) DEFAULT 0,
    transport DECIMAL(10,2) DEFAULT 0,
    utilities DECIMAL(10,2) DEFAULT 0,
    entertainment DECIMAL(10,2) DEFAULT 0,
    other_expenses DECIMAL(10,2) DEFAULT 0,
    total_income DECIMAL(10,2) DEFAULT 0,
    total_expenses DECIMAL(10,2) DEFAULT 0,
    balance DECIMAL(10,2) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)");

// Transactions table
mysqli_query($savienojums, "CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    type ENUM('income', 'expense') NOT NULL,
    category VARCHAR(100) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    description TEXT,
    transaction_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)");

// Budgets table
mysqli_query($savienojums, "CREATE TABLE IF NOT EXISTS budgets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    category VARCHAR(100) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    spent DECIMAL(10,2) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_user_category (user_id, category)
)");

// Categories table
mysqli_query($savienojums, "CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    type ENUM('income', 'expense') NOT NULL,
    is_default BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// Insert default categories
mysqli_query($savienojums, "INSERT IGNORE INTO categories (name, type, is_default) VALUES 
    ('Alga', 'income', TRUE),
    ('Freelance', 'income', TRUE),
    ('Investīcijas', 'income', TRUE),
    ('Cits', 'income', TRUE),
    ('Mājoklis', 'expense', TRUE),
    ('Pārtika', 'expense', TRUE),
    ('Transports', 'expense', TRUE),
    ('Izklaide', 'expense', TRUE),
    ('Veselība', 'expense', TRUE),
    ('Izglītība', 'expense', TRUE),
    ('Cits', 'expense', TRUE)
");

echo "✅ Таблицы успешно созданы!";
?>
