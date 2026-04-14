<?php
session_start();
require 'db_config.php';

// Check if user is logged in
$is_logged_in = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
$user_id = $is_logged_in ? $_SESSION['user_id'] : 0;

// Fetch all products from database
$products = [];
$query = "SELECT p.id, p.name, p.description, p.price, p.stock_level, p.image_url, u.username as producer_name 
          FROM products p 
          JOIN users u ON p.producer_id = u.id 
          WHERE p.stock_level > 0
          ORDER BY p.created_at DESC";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Get cart count
$cart_count = 0;
if ($is_logged_in) {
    $stmt = $conn->prepare("SELECT SUM(quantity) as total FROM cart WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $cart_result = $stmt->get_result();
    $cart_row = $cart_result->fetch_assoc();
    $cart_count = ($cart_row['total'] !== null) ? $cart_row['total'] : 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Menu - Greenfield Local Hub</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #31d610;
        }

        /* Header Styles */
        header {
            background-color: #308f0b;
            border: 2px solid #000000;
            display: flex;
            align-items: center;
            padding: 20px;
            margin-bottom: 0;
            justify-content: space-between;
        }

        .logo {
            flex: 0 0 15%;
            border-right: 2px solid #333;
            padding-right: 20px;
            text-align: left;
            font-weight: bold;
            font-size: 16px;
        }

        .header-title {
            flex: 1;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            text-decoration: underline;
            color: #ffffff;
        }

        .cart-link {
            padding: 10px 15px;
            background-color: #31d610;
            border: 2px solid #000000;
            text-decoration: none;
            color: #000000;
            font-weight: bold;
            border-radius: 5px;
        }

        .cart-link:hover {
            background-color: #ffffff;
        }

        /* Container for sidebar and main content */
        .container {
            display: flex;
            min-height: calc(100vh - 120px);
        }

        /* Sidebar Styles */
        aside {
            width: 150px;
            background-color: #308f0b;
            border-right: 2px solid #000000;
            border-bottom: 2px solid #000000;
            border-left: 4px solid #000000;
        }

        nav ul {
            list-style: none;
        }

        nav li {
            border-bottom: 1px solid #ffffff;
            padding: 0;
        }

        nav a {
            display: block;
            padding: 12px 15px;
            text-decoration: none;
            color: #ffffff;
            font-size: 13px;
            text-align: center;
            transition: background-color 0.3s;
        }

        nav a:hover, nav a.active {
            background-color: #31d610;
            font-weight: bold;
        }

        /* Main Content Styles */
        main {
            flex: 1;
            padding: 20px;
            background-color: #4be253;
            border: 2px solid #000000;
        }

        .search-section {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000000;
            padding-bottom: 15px;
        }

        .search-box {
            padding: 10px 15px;
            border: 1px solid #000000;
            font-size: 14px;
            width: 300px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .product-box {
            border: 2px solid #000000;
            padding: 20px;
            background-color: #ffffff;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 350px;
        }

        .product-box img {
            max-width: 100%;
            height: 150px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .product-info {
            flex-grow: 1;
        }

        .product-box h3 {
            font-size: 16px;
            margin-bottom: 8px;
        }

        .product-box p {
            font-size: 13px;
            color: #000000;
            margin-bottom: 5px;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color: #308f0b;
            margin: 10px 0;
        }

        .stock {
            font-size: 12px;
            margin: 8px 0;
        }

        .product-controls {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .qty-input {
            width: 60px;
            padding: 5px;
            border: 1px solid #000000;
            text-align: center;
        }

        .btn-add {
            flex: 1;
            padding: 8px;
            background-color: #308f0b;
            color: #ffffff;
            border: 2px solid #000000;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-add:hover {
            background-color: #31d610;
            color: #000000;
        }

        .btn-add:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }

        .no-products {
            text-align: center;
            padding: 40px;
            font-size: 16px;
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #28a745;
            color: #155724;
        }

        .alert-error {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <a href="home.php">
            <img src="picture1.png" width="200px" height="100px">
        </a>
        <div class="header-title">Product menu</div>
        <a href="cart.php" class="cart-link">Cart (<?php echo $cart_count; ?>)</a>
    </header>

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar Navigation -->
        <aside>
            <nav>
                <ul>
                    <li><a href="about.php">About</a></li>
                    <li><a href="producers.php">Producers</a></li>
                    <li><a class="active" href="productmenu.php">Product menu</a></li>
                    <li><a href="userdashboard.php">User dashboard</a></li>
                    <li><a href="ordertracking.php">Order tracking</a></li>
                    <li><a href="loyaltyscheme.php">Loyalty scheme</a></li>
                    <li><a href="producerdashboard.php">Producer dashboard</a></li>
                    <li><a href="contact.php">Contact/support</a></li>
                    <li><a href="accessibility.php">accessibility</a></li>
                    <li><a href="admindashboard.php">Admin dashboard</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main>
            <!-- Search Section -->
            <div class="search-section">
                <input type="text" class="search-box" id="searchInput" placeholder="Search for a product">
            </div>

            <!-- Products Grid -->
            <div class="products-grid" id="productsGrid">
                <?php if (count($products) > 0) { ?>
                    <?php foreach ($products as $product) { ?>
                        <div class="product-box" data-product-name="<?php echo htmlspecialchars($product['name']); ?>">
                            <div class="product-info">
                                <?php if ($product['image_url']) { ?>
                                    <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                                <?php } else { ?>
                                    <img src="placeholder.png" alt="No image">
                                <?php } ?>
                                <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                                <p><?php echo htmlspecialchars(substr($product['description'], 0, 100)); ?>...</p>
                                <p class="price">£<?php echo number_format($product['price'], 2); ?></p>
                                <p class="stock">Stock: <?php echo $product['stock_level']; ?> available</p>
                                <p>Producer: <?php echo htmlspecialchars($product['producer_name']); ?></p>
                            </div>
                            <div class="product-controls">
                                <input type="number" class="qty-input" value="1" min="1" max="<?php echo $product['stock_level']; ?>" data-product-id="<?php echo $product['id']; ?>">
                                <button class="btn-add <?php echo !$is_logged_in ? 'disabled' : ''; ?>" 
                                        onclick="<?php echo $is_logged_in ? 'addToCart(' . $product['id'] . ', this)' : 'window.location.href=\'login.php\''; ?>" 
                                        <?php echo !$is_logged_in ? 'disabled' : ''; ?>>
                                    <?php echo $is_logged_in ? 'Add to Cart' : 'Login to Buy'; ?>
                                </button>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="no-products">
                        <p>No products available at the moment.</p>
                    </div>
                <?php } ?>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>
    
    <script>
        function addToCart(productId, button) {
            const quantityInput = button.previousElementSibling;
            const quantity = parseInt(quantityInput.value);
            
            if (isNaN(productId) || productId <= 0) {
                alert('Invalid product ID');
                console.error('Invalid product ID:', productId);
                return;
            }
            
            if (quantity <= 0 || isNaN(quantity)) {
                alert('Please enter a valid quantity');
                return;
            }
            
            // Disable button during request
            button.disabled = true;
            const originalText = button.textContent;
            button.textContent = 'Adding...';
            
            // Send AJAX request to add to cart
            const formData = new FormData();
            formData.append('action', 'add');
            formData.append('product_id', productId);
            formData.append('quantity', quantity);
            
            fetch('cart_handler.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert('Product added to cart!');
                    // Refresh page to update cart count
                    location.reload();
                } else {
                    alert('Error: ' + (data.message || 'Failed to add to cart'));
                    button.disabled = false;
                    button.textContent = originalText;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred: ' + error.message + '. Please make sure you are logged in.');
                button.disabled = false;
                button.textContent = originalText;
            });
        }
        
        // Search functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const productBoxes = document.querySelectorAll('.product-box');
            
            if (searchInput) {
                searchInput.addEventListener('keyup', function() {
                    const searchTerm = this.value.toLowerCase();
                    let visibleCount = 0;
                    
                    productBoxes.forEach(box => {
                        const productName = box.getAttribute('data-product-name').toLowerCase();
                        if (productName.includes(searchTerm)) {
                            box.style.display = 'flex';
                            visibleCount++;
                        } else {
                            box.style.display = 'none';
                        }
                    });
                    
                    // Show no products message if needed
                    const grid = document.getElementById('productsGrid');
                    let noProductsMsg = grid.querySelector('.no-products');
                    if (visibleCount === 0 && searchTerm.length > 0) {
                        if (!noProductsMsg) {
                            noProductsMsg = document.createElement('div');
                            noProductsMsg.className = 'no-products';
                            noProductsMsg.textContent = 'No products found matching your search.';
                            grid.appendChild(noProductsMsg);
                        }
                        noProductsMsg.style.display = 'block';
                    } else if (noProductsMsg) {
                        noProductsMsg.style.display = 'none';
                    }
                });
            }
        });
    </script>
</body>
</html>