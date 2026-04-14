<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out - Greenfield Local Hub</title>
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
            border: 4px solid #000000;
            display: flex;
            align-items: center;
            padding: 20px;
            margin-bottom: 0;
        }

        .logo {
            flex: 0 0 20%;
            border-right: 2px solid #ffffff;
            padding-right: 20px;
            text-align: left;
            font-weight: bold;
            font-size: 16px;
        }

        .header-title {
            flex: 1;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            text-decoration: underline;
            color: #ffffff;
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
            border: 2px solid #333;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logout-container {
            background-color: #f9f9f9;
            border: 2px solid #333;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        .logout-container h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 28px;
        }

        .logout-message {
            color: #333;
            font-size: 18px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .home-link {
            display: inline-block;
            padding: 12px 24px;
            background-color: #308f0b;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .home-link:hover {
            background-color: #256a08;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">Logo</div>
        <div class="header-title">Logged Out</div>
    </header>

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar Navigation -->
        <aside>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="producers.php">Producers</a></li>
                    <li><a href="productmenu.php">Product menu</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="ordertracking.php">Order tracking</a></li>
                    <li><a href="loyaltyscheme.php">Loyalty scheme</a></li>
                    <li><a href="producerdashboard.php">Producer dashboard</a></li>
                    <li><a href="contact.php">Contact/support</a></li>
                    <li><a href="accessibility.php">Accessibility</a></li>
                    <li><a href="admindashboard.php">Admin dashboard</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main>
            <div class="logout-container">
                <h2>Logged Out Successfully</h2>
                <p class="logout-message">
                    You have been successfully logged out of your Greenfield Local Hub account.<br>
                    Thank you for visiting! We hope to see you again soon.
                </p>
                <a href="login.php" class="home-link">Login Again</a>
            </div>
        </main>
    </div>
</body>
</html>