<?php
// Database setup script
require_once 'db_config.php';

$setup_queries = array(
    // Add user_type to users table
    "ALTER TABLE users ADD COLUMN IF NOT EXISTS user_type VARCHAR(20) DEFAULT 'customer'",
    
    // Create products table
    "CREATE TABLE IF NOT EXISTS products (
        id INT PRIMARY KEY AUTO_INCREMENT,
        producer_id INT NOT NULL,
        name VARCHAR(100) NOT NULL,
        description TEXT,
        price DECIMAL(10, 2) NOT NULL,
        stock_level INT NOT NULL DEFAULT 0,
        image_url VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (producer_id) REFERENCES users(id)
    )",
    
    // Create orders table
    "CREATE TABLE IF NOT EXISTS orders (
        id INT PRIMARY KEY AUTO_INCREMENT,
        user_id INT NOT NULL,
        producer_id INT NOT NULL,
        order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        total_price DECIMAL(10, 2) NOT NULL,
        status VARCHAR(50) DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (producer_id) REFERENCES users(id)
    )",
    
    // Create order items table
    "CREATE TABLE IF NOT EXISTS order_items (
        id INT PRIMARY KEY AUTO_INCREMENT,
        order_id INT NOT NULL,
        product_id INT NOT NULL,
        quantity INT NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (order_id) REFERENCES orders(id),
        FOREIGN KEY (product_id) REFERENCES products(id)
    )",
    
    // Create delivery tracking table
    "CREATE TABLE IF NOT EXISTS delivery_tracking (
        id INT PRIMARY KEY AUTO_INCREMENT,
        order_id INT NOT NULL UNIQUE,
        status VARCHAR(50) NOT NULL DEFAULT 'pending',
        updated_by_id INT,
        updated_by_type VARCHAR(20),
        notes TEXT,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (order_id) REFERENCES orders(id),
        FOREIGN KEY (updated_by_id) REFERENCES users(id)
    )"
);

$success_count = 0;
$error_count = 0;

foreach ($setup_queries as $query) {
    if ($conn->query($query)) {
        $success_count++;
        echo "✓ Query executed successfully<br>";
    } else {
        $error_count++;
        echo "✗ Error: " . $conn->error . "<br>";
    }
}

echo "<br><strong>Setup Complete: $success_count successful, $error_count errors</strong>";
?>
