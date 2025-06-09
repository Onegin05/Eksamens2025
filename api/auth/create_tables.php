<?php
// Database connection settings
$host = "localhost";
$user = "grobina1_cebotars";
$password = "pr4lpgCz@";
$dbname = "grobina1_cebotars";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create user_profiles table
$sql = "CREATE TABLE IF NOT EXISTS user_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    avatar_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Table user_profiles created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Add avatar_path column to users table if it doesn't exist
$sql = "SHOW COLUMNS FROM users LIKE 'avatar_path'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    $sql = "ALTER TABLE users ADD COLUMN avatar_path VARCHAR(255) DEFAULT NULL";
    if ($conn->query($sql) === TRUE) {
        echo "Added avatar_path column to users table\n";
    } else {
        echo "Error adding column: " . $conn->error . "\n";
    }
}

// Add is_admin column to users table if it doesn't exist
$sql = "SHOW COLUMNS FROM users LIKE 'is_admin'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    $sql = "ALTER TABLE users ADD COLUMN is_admin BOOLEAN DEFAULT FALSE";
    if ($conn->query($sql) === TRUE) {
        echo "Added is_admin column to users table\n";
    } else {
        echo "Error adding column: " . $conn->error . "\n";
    }
}

// Create budget_categories table
$sql = "CREATE TABLE IF NOT EXISTS budget_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    type ENUM('income', 'expense') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table budget_categories created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Create budget_transactions table
$sql = "CREATE TABLE IF NOT EXISTS budget_transactions (
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
)";

if ($conn->query($sql) === TRUE) {
    echo "Table budget_transactions created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Insert default budget categories
$categories = [
    // Income categories
    ['Alga', 'income'],
    ['Freelance', 'income'],
    ['Investīcijas', 'income'],
    ['Pabalsti', 'income'],
    ['Citi ienākumi', 'income'],
    
    // Expense categories
    ['Pārtika', 'expense'],
    ['Transports', 'expense'],
    ['Komunālie', 'expense'],
    ['Izklaide', 'expense'],
    ['Apģērbs', 'expense'],
    ['Svešvaloda', 'expense'],
    ['Citi izdevumi', 'expense']
];

$stmt = $conn->prepare("INSERT IGNORE INTO budget_categories (name, type) VALUES (?, ?)");
foreach ($categories as $category) {
    $stmt->bind_param("ss", $category[0], $category[1]);
    $stmt->execute();
}
$stmt->close();

// Create first admin user if none exists
$sql = "SELECT COUNT(*) as admin_count FROM users WHERE is_admin = TRUE";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row['admin_count'] == 0) {
    $admin_email = "admin@zalaaugsme.lv";
    $admin_password = password_hash("Admin123!", PASSWORD_DEFAULT);
    $admin_name = "Administrators";
    
    $stmt = $conn->prepare("INSERT INTO users (email, password_hash, first_name, last_name, is_admin) VALUES (?, ?, ?, '', TRUE)");
    $stmt->bind_param("sss", $admin_email, $admin_password, $admin_name);
    $stmt->execute();
    $stmt->close();
    
    echo "Created default admin user\n";
}

$conn->close();
?> 