<?php
session_start();

// Sample user data; replace with real logic as needed
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'username';
$points = isset($_SESSION['points']) ? $_SESSION['points'] : 745;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loyalty scheme - Greenfield Local Hub</title>
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
        .dashboard-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 20px; }
        .panel { border: 2px solid #000000; background-color: #ffffff; padding: 15px; min-height: 180px; }
        .panel h2 { margin-bottom: 10px; font-size: 18px; }
        .panel p { line-height: 1.5; }
        .panel-large { grid-column: 1 / -1; min-height: 180px; }
        .points { font-size: 28px; font-weight: bold; color: #c4b819; }
        .cta { margin-top: 15px; display: inline-block; padding: 8px 12px; border: 2px solid #000000; background-color: #000000; color: #ffffff; text-decoration: none; }
    </style>
</head>
<body>
    <header>
               <a href="home.php">
            <img  
    src="picture1.png"width=200px
    height=100px>
</a>
        <div class="header-title">Loyalty scheme</div>
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
                    <li><a class="active" href="loyaltyscheme.php">Loyalty scheme</a></li>
                    <li><a href="producerdashboard.php">Producer dashboard</a></li>
                    <li><a href="contact.php">Contact/support</a></li>
                    <li><a href="accessibility.php">Accessibility</a></li>
                    <li><a href="admindashboard.php">Admin dashboard</a></li>
                </ul>
            </nav>
        </aside>

        <main>
            <p style="margin-bottom: 20px; font-size: 16px;"><strong>Welcome 23<?php echo htmlspecialchars($username); ?>23</strong></p>

            <div class="dashboard-grid">
                <section class="panel">
                    <h2>Redeem points</h2>
                    <p>Use your points to get rewards such as discounts, free delivery, and exclusive products. Redeem from completed and eligible orders.</p>
                    <p class="points">Current Points: <?php echo number_format($points); ?></p>
                    <a class="cta" href="redeem-points.php">Redeem now</a>
                </section>

                <section class="panel">
                    <h2>Points balance</h2>
                    <p>Your total loyalty balance is shown above. Keep shopping and check back often for new bonus offers and tier upgrades.</p>
                </section>

                <section class="panel panel-large">
                    <h2>Rewards and benefits</h2>
                    <p>With loyalty points you can unlock the following:</p>
                    <ul>
                        <li>10% off your next order (from 500 points)</li>
                        <li>Free shipping on orders over $40 (from 750 points)</li>
                        <li>Access to members-only weekly deals and early access to new producers</li>
                        <li>Silver/Gold tier status for additional seasonal vouchers</li>
                    </ul>
                    <p>Earn 1 point per $1 spent and get bonus points during promotional events.</p>
                </section>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>