<?php
require 'check_auth.php';
session_start();

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'username';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producer dashboard - Greenfield Local Hub</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background-color: #31d610; }
        header { background-color: #308f0b; border: 2px solid #000000; display: flex; align-items: center; padding: 20px; }
        .logo { flex: 0 0 20%; border-right: 2px solid #333; padding-right: 20px; text-align: left; font-weight: bold; font-size: 16px; }
        .header-title { flex: 1; text-align: center; font-size: 24px; font-weight: bold; text-decoration: underline; color: #ffffff; }
        .container { display: flex; min-height: calc(100vh - 120px); }
        aside { width: 150px; background-color: #308f0b; border-right: 2px solid #000000; border-bottom: 2px solid #000000; }
        nav ul { list-style: none; }
        nav li { border-bottom: 1px solid #ffffff; }
        nav a { display: block; padding: 12px 15px; text-decoration: none; color: #ffffff; font-size: 13px; text-align: center; transition: background-color 0.3s; }
        nav a:hover, nav a.active { background-color: #31d610; font-weight: bold; }
        main { flex: 1; padding: 20px; background-color: #4be253; border: 2px solid #000000; }
        .dashboard-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .panel { border: 2px solid #000000; background-color: #ffffff; padding: 15px; min-height: 150px; }
        .panel h2 { margin-bottom: 10px; font-size: 18px; }
        .panel-large { grid-column: 1 / -1; min-height: 160px; }
        .alert-box { border: 2px solid #d9534f; background: #daa2a6; color: #721c24; padding: 8px 12px; margin-bottom: 12px; }
        .btn { display: inline-block; margin-top: 12px; padding: 8px 12px; background: #000000; color: #ffffff; text-decoration: none; border: 2px solid #000000; }
    </style>
</head>
<body>
    <header>
                 <a href="home.php">
            <img  
    src="picture1.png"width=200px
    height=100px>
</a>
        <div class="header-title">Producer dashboard</div>
    </header>

    <div class="container">
        <aside>
            <nav>
                <ul>
                    <li><a href="about.php">About</a></li>
                    <li><a href="producers.php">Producers</a></li>
                    <li><a href="productmenu.php">Product menu</a></li>
                    <li><a href="userdashboard.php">User dashboard</a></li>
                    <li><a href="ordertracking.php">Order tracking</a></li>
                    <li><a href="loyaltyscheme.php">Loyalty scheme</a></li>
                    <li><a class="active" href="producerdashboard.php">Producer dashboard</a></li>
                    <li><a href="contact.php">Contact/support</a></li>
                    <li><a href="accessibility.php">Accessibility</a></li>
                    <li><a href="admindashboard.php">Admin dashboard</a></li>
                </ul>
            </nav>
        </aside>

        <main>
            <p style="margin-bottom: 20px; font-size: 16px;"><strong>Welcome <?php echo htmlspecialchars($username); ?></strong></p>
            <div class="alert-box">Alerts for low stock</div>

            <div class="dashboard-grid">
                <section class="panel">
                    <h2>Recent orders</h2>
                    <p>Producers can view their orders that have come in here. Include order status, quantity, and customer details.</p>
                </section>

                <section class="panel">
                    <h2>Product management</h2>
                    <p>Producers can manage their products on offer.</p>
                </section>

                <section class="panel">
                    <h2>Stock levels</h2>
                    <p>Producers can manage their stock levels with alerts and restock actions.</p>
                </section>

                <section class="panel">
                    <h2>Reports</h2>
                    <p>Producers can view their performance reports and analytics.</p>
                </section>

                <section class="panel panel-large">
                    <a class="btn" href="logout.php">Sign out</a>
                </section>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>