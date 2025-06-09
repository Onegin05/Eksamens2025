<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$host = "localhost";
$user = "grobina1_cebotars";
$password = "pr4lpgCz@";
$dbname = "grobina1_cebotars";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create contact_messages table
$sql = "CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_read BOOLEAN DEFAULT FALSE
)";

if ($conn->query($sql) === TRUE) {
    echo "Table contact_messages created successfully<br>";
} else {
    echo "Error creating contact_messages table: " . $conn->error . "<br>";
}

// Create news table
$sql = "CREATE TABLE IF NOT EXISTS news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    author_id INT,
    FOREIGN KEY (author_id) REFERENCES users(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table news created successfully<br>";
} else {
    echo "Error creating news table: " . $conn->error . "<br>";
}

// Create budget_categories table
$sql = "CREATE TABLE IF NOT EXISTS budget_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type ENUM('income', 'expense') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table budget_categories created successfully<br>";
    
    // Insert default categories if table is empty
    $result = $conn->query("SELECT COUNT(*) as count FROM budget_categories");
    $row = $result->fetch_assoc();
    
    if ($row['count'] == 0) {
        $categories = [
            ['Alga', 'income'],
            ['Freelance', 'income'],
            ['Investīcijas', 'income'],
            ['Pārtika', 'expense'],
            ['Transports', 'expense'],
            ['Komunālie', 'expense'],
            ['Izklaide', 'expense'],
            ['Cits', 'income'],
            ['Cits', 'expense']
        ];
        
        $stmt = $conn->prepare("INSERT INTO budget_categories (name, type) VALUES (?, ?)");
        foreach ($categories as $category) {
            $stmt->bind_param("ss", $category[0], $category[1]);
            $stmt->execute();
        }
        echo "Default categories inserted successfully<br>";
    }
} else {
    echo "Error creating budget_categories table: " . $conn->error . "<br>";
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
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES budget_categories(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table budget_transactions created successfully<br>";
} else {
    echo "Error creating budget_transactions table: " . $conn->error . "<br>";
}

$conn->close();
?> 

