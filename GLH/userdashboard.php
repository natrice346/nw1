<?php
require 'check_auth.php';
session_start();

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Greenfield Local Hub</title>
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

        header {
            background-color: #308f0b;
            border: 2px solid #000000;
            display: flex;
            align-items: center;
            padding: 20px;
        }

        .logo {
            flex: 0 0 20%;
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

        .container {
            display: flex;
            min-height: calc(100vh - 120px);
        }

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

        main {
            flex: 1;
            padding: 20px;
            background-color: #4be253;
            border: 2px solid #000000;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }

        .panel {
            border: 2px solid #000000;
            background-color: #ffffff;
            padding: 20px;
            min-height: 250px;
        }

        .panel h2 {
            font-size: 18px;
            margin-bottom: 15px;
            border-bottom: 1px solid #ffffff;
            padding-bottom: 10px;
        }

        .orders-list {
            list-style: none;
        }

        .orders-list li {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ffffff;
            background: #ffffff;
        }

        .profile-fields label,
        .profile-fields input {
            display: block;
            width: 100%;
            margin-bottom: 12px;
        }

        .profile-fields input {
            padding: 8px;
            border: 1px solid #000000;
        }

        .profile-fields button,
        .signout-button {
            padding: 10px 15px;
            background-color: #000000;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }

        .signout-button {
            margin-top: 10px;
            display: inline-block;
        }

        @media (max-width: 900px) {
            .container { flex-direction: column; }
            aside { width: 100%; }
            main { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <header>
                   <a href="home.php">
            <img  
    src="picture1.png"width=200px
    height=100px>
</a>
        <div class="header-title">User dashboard</div>
    </header>

    <div class="container">
        <aside>
            <nav>
                <ul>
                    <li><a href="about.php">About</a></li>
                    <li><a href="producers.php">Producers</a></li>
                    <li><a href="productmenu.php">Product menu</a></li>
                    <li><a class="active" href="userdashboard.php">User dashboard</a></li>
                    <li><a href="ordertracking.php">Order tracking</a></li>
                    <li><a href="loyaltyscheme.php">Loyalty scheme</a></li>
                    <li><a href="producerdashboard.php">Producer dashboard</a></li>
                    <li><a href="contact.php">Contact/support</a></li>
                    <li><a href="accessibility.php">Accessibility</a></li>
                    <li><a href="admindashboard.php">Admin dashboard</a></li>
                </ul>
            </nav>
        </aside>

        <main>
            <div class="panel">
                <h2>Welcome &ldquo;<?php echo $username; ?>&rdquo;</h2>
                <h3>Your previous orders</h3>
                <ul class="orders-list">
                    <li>Order #10021 - Delivered - 2026-03-20</li>
                    <li>Order #10012 - In transit - 2026-03-22</li>
                    <li>Order #10005 - Cancelled - 2026-03-09</li>
                </ul>
            </div>

            <div class="panel">
                <h2>Edit your details</h2>
                <form class="profile-fields" method="post" action="userdashboard_update.php">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="user@example.com" required>

                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" value="<?php echo $username; ?>" required>

                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="••••••••">

                    <label for="payment">Payment details</label>
                    <input id="payment" name="payment" type="text" value="*** **** **** 1234">

                    <button type="submit">Save changes</button>
                </form>
                <a href="logout.php" class="signout-button">Sign out</a>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>