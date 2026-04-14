<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producers - Greenfield Local Hub</title>
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

        .intro-section {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .intro-text {
            flex: 2;
            background-color: #ffffff;
            border: 2px solid #000000;
            padding: 20px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100px;
        }

        .search-box {
            flex: 1;
            background-color: #ffffff;
            border: 2px solid #000000;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .search-box input {
            width: 100%;
            padding: 10px;
            border: 1px solid #000000;
            font-size: 14px;
        }

        .producers-list {
            border: 2px solid #000000;
            padding: 40px;
            background-color: #ffffff;
            min-height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
                  <a href="home.php">
            <img  
    src="picture1.png"width=200px
    height=100px>
</a>
        <div class="header-title">Meet the producers</div>
    </header>

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar Navigation -->
        <aside>
            <nav>
                <ul>
                    <li><a href="about.php">About</a></li>
                    <li><a class="active" href="producers.php">Producers</a></li>
                    <li><a href="productmenu.php">Product menu</a></li>
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
            <!-- Intro Section with Search -->
            <div class="intro-section">
                <div class="intro-text">
                    <p>Information about the producers and benefits of buying locally sourced products</p>
                </div>
                <div class="search-box">
                    <input type="text" placeholder="Search for a producer">
                </div>
            </div>

            <!-- Producers List -->
            <div class="producers-list">
                <p>Lists of the producers and information about how they operate</p>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>