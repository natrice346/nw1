<?php
session_start();

echo "<h2>Session Debug Info:</h2>";
echo "<pre>";
echo "Session ID: " . session_id() . "\n";
echo "Session Array: ";
print_r($_SESSION);
echo "\n\nCookie Info:\n";
print_r($_COOKIE);
echo "\n\nServer Variables:\n";
echo "REMOTE_ADDR: " . $_SERVER['REMOTE_ADDR'] . "\n";
echo "HTTP_USER_AGENT: " . $_SERVER['HTTP_USER_AGENT'] . "\n";
echo "</pre>";

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    echo "<p style='color: green; font-size: 16px; font-weight: bold;'><strong>✓ You ARE logged in:</strong></p>";
    echo "<ul style='font-size: 14px;'>";
    echo "<li>User ID: " . $_SESSION['user_id'] . "</li>";
    echo "<li>Username: " . htmlspecialchars($_SESSION['username']) . "</li>";
    echo "<li>Email: " . htmlspecialchars($_SESSION['email']) . "</li>";
    echo "</ul>";
    echo "<p><a href='productmenu.php' style='background: green; color: white; padding: 10px 20px; text-decoration: none;'>Go to Product Menu</a></p>";
} else {
    echo "<p style='color: red; font-size: 16px; font-weight: bold;'><strong>✗ NOT logged in</strong></p>";
    echo "<p style='font-size: 14px;'>Session data is empty or missing user_id</p>";
    echo "<p><a href='login.php' style='background: blue; color: white; padding: 10px 20px; text-decoration: none;'>Go to Login</a></p>";
}

echo "<hr>";
echo "<h3>Test Cart Functionality:</h3>";

if (isset($_SESSION['user_id'])) {
    require 'db_config.php';
    
    $user_id = $_SESSION['user_id'];
    
    // Check cart table
    $result = $conn->query("SELECT COUNT(*) as count FROM cart WHERE user_id = $user_id");
    $row = $result->fetch_assoc();
    echo "<p>Items in your cart: <strong>" . $row['count'] . "</strong></p>";
}
?>
