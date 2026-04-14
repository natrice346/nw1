<?php
session_start();
require 'db_config.php';

// Create products table
$sql1 = "CREATE TABLE IF NOT EXISTS products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    producer_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock_level INT NOT NULL DEFAULT 0,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (producer_id) REFERENCES users(id)
)";

// Create cart table
$sql2 = "CREATE TABLE IF NOT EXISTS cart (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_user_product (user_id, product_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
)";

// Create orders table
$sql3 = "CREATE TABLE IF NOT EXISTS orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    producer_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_price DECIMAL(10, 2) NOT NULL,
    status VARCHAR(50) DEFAULT 'pending',
    shipping_address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (producer_id) REFERENCES users(id)
)";

// Create order_items table
$sql4 = "CREATE TABLE IF NOT EXISTS order_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
)";

// Create delivery_tracking table
$sql5 = "CREATE TABLE IF NOT EXISTS delivery_tracking (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'pending',
    updated_by_id INT,
    updated_by_type VARCHAR(20),
    notes TEXT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (updated_by_id) REFERENCES users(id)
)";

// Add user_type column if it doesn't exist
$check_user_type = "SHOW COLUMNS FROM users LIKE 'user_type'";
$result = $conn->query($check_user_type);

if ($result->num_rows == 0) {
    $conn->query("ALTER TABLE users ADD COLUMN user_type VARCHAR(20) DEFAULT 'customer'");
}

// Execute all table creation queries
$queries = [$sql1, $sql2, $sql3, $sql4, $sql5];
$success = true;

foreach ($queries as $sql) {
    if (!$conn->query($sql)) {
        $success = false;
        echo "Error: " . $conn->error . "<br>";
    }
}

if ($success) {
    echo "Database tables created successfully!";
} else {
    echo "Some errors occurred during table creation.";
}

$conn->close();
?>
