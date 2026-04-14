<?php
session_start();
require 'db_config.php';

// Sample data insertion
echo "<h2>Setting up sample data...</h2>";

// First, let's check if users table exists and insert sample producers
$check_users = "SHOW TABLES LIKE 'users'";
$result = $conn->query($check_users);

if ($result && $result->num_rows > 0) {
    // Check if sample producers exist
    $check_producer = $conn->query("SELECT * FROM users WHERE user_type = 'producer' LIMIT 1");
    
    if ($check_producer && $check_producer->num_rows == 0) {
        // Insert sample producers
        $producers = [
            ['James Collins', 'producer@farm1.com', 'producer'],
            ['Sarah Smith', 'producer@farm2.com', 'producer']
        ];
        
        foreach ($producers as $producer) {
            $hash_pass = password_hash('password123', PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password, user_type) 
                    VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $producer[0], $producer[1], $hash_pass, $producer[2]);
            if ($stmt->execute()) {
                echo "✓ Inserted producer: " . $producer[0] . "<br>";
            } else {
                echo "✗ Error inserting producer: " . $stmt->error . "<br>";
            }
        }
    }
    
    // Get producer IDs
    $result = $conn->query("SELECT id, username FROM users WHERE user_type = 'producer' LIMIT 2");
    $producers = [];
    while ($row = $result->fetch_assoc()) {
        $producers[$row['username']] = $row['id'];
    }
    
    if (count($producers) > 0) {
        // Check if products exist
        $check_products = $conn->query("SELECT COUNT(*) as count FROM products");
        $check_result = $check_products->fetch_assoc();
        
        if ($check_result['count'] == 0) {
            // Insert sample products
            $products = [
                ['Tomatoes', 'Fresh juicy tomatoes from our local farm', 2.50, 50, 'tomato.png', current($producers)],
                ['Potatoes', 'Premium quality potatoes', 1.50, 100, 'potato.png', current($producers)],
                ['Cucumbers', 'Crisp fresh cucumbers', 1.20, 75, 'cucumber.png', current($producers)],
                ['Lettuce', 'Organic green lettuce', 1.80, 60, 'lettuce.png', current($producers)],
                ['Carrots', 'Sweet orange carrots', 0.80, 120, 'carrot.png', current($producers)],
                ['Apples', 'Crispy red apples', 2.00, 80, 'apple.png', current($producers)]
            ];
            
            foreach ($products as $product) {
                $sql = "INSERT INTO products (producer_id, name, description, price, stock_level, image_url) 
                        VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    echo "Prepare failed: " . $conn->error . "<br>";
                    continue;
                }
                $stmt->bind_param("issdis", $product[5], $product[0], $product[1], $product[2], $product[3], $product[4]);
                if ($stmt->execute()) {
                    echo "✓ Inserted product: " . $product[0] . "<br>";
                } else {
                    echo "✗ Error inserting product: " . $stmt->error . "<br>";
                }
            }
            echo "<h3>✓ Sample data inserted successfully!</h3>";
        } else {
            echo "<h3>✓ Products already exist in database.</h3>";
        }
    } else {
        echo "<p><strong>Note:</strong> Please ensure you have producers in your database. You can add them through the registration system.</p>";
    }
} else {
    echo "<h3>✗ Users table not found. Please run setup_tables.php first.</h3>";
}

$conn->close();
echo "<br><a href='productmenu.php'>View Product Menu</a>";
?>
