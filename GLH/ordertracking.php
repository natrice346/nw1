<?php
session_start();
// Get username from session or use default
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Tracking - Greenfield Local Hub</title>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
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

        .welcome-section {
            text-align: center;
            margin-bottom: 20px;
            padding: 15px;
            border: 2px solid #000000;
            background-color: #ffffff;
        }

        .welcome-section p {
            font-size: 16px;
            color: #000000;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .tracking-box {
            border: 2px solid #000000;
            padding: 30px;
            background-color: #ffffff;
            min-height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .tracking-box p {
            font-size: 16px;
            color: #333;
        }

        .map-box {
            border: 2px solid #000000;
            padding: 0;
            background-color: #ffffff;
            min-height: 400px;
            position: relative;
            overflow: hidden;
        }

        #deliveryMap {
            width: 100%;
            height: 400px;
        }

        .map-controls {
            padding: 10px;
            background-color: #f0f0f0;
            border-top: 1px solid #000000;
            text-align: center;
        }

        .btn-simulate {
            padding: 8px 20px;
            background-color: #308f0b;
            color: #ffffff;
            border: 2px solid #000000;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            border-radius: 4px;
        }

        .btn-simulate:hover {
            background-color: #31d610;
            color: #000000;
        }

        .delivery-status {
            padding: 8px;
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            background-color: #d4edda;
            color: #155724;
            border-top: 1px solid #000;
        }

        .map-box p {
            font-size: 16px;
            color: #000000;
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
        <div class="header-title">Order tracking</div>
    </header>

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar Navigation -->
        <aside>
            <nav>
                <ul>
                    <li><a href="about.php">About</a></li>
                    <li><a href="producers.php">Producers</a></li>
                    <li><a href="productmenu.php">Product menu</a></li>
                    <li><a href="userdashboard.php">User dashboard</a></li>
                    <li><a class="active" href="ordertracking.php">Order tracking</a></li>
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
            <!-- Welcome Section -->
            <div class="welcome-section">
                <p>Welcome "<?php echo htmlspecialchars($username); ?>"</p>
            </div>

            <!-- Content Grid -->
            <div class="content-grid">
                <!-- Tracking Box -->
                <div class="tracking-box">
                    <p>User can track the progress of their order and how long it will take to get to them</p>
                </div>

                <!-- Map Box -->
                <div class="map-box">
                    <div id="deliveryMap"></div>
                    <div class="delivery-status" id="deliveryStatus">Waiting for delivery simulation...</div>
                    <div class="map-controls">
                        <button class="btn-simulate" id="btnSimulate" onclick="startSimulation()">Simulate Delivery</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>