<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Greenfield Local Hub</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
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

        .overview-section {
            background-color: #ffffff;
            border: 2px solid #000000;
            padding: 40px;
            text-align: center;
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overview-section p {
            font-size: 16px;
            color: #000000;
        }

        .map-section {
            margin-top: 20px;
            background-color: #ffffff;
            border: 2px solid #000000;
            padding: 15px;
        }

        .map-section h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #000000;
        }

        .map-section p {
            margin-bottom: 12px;
            color: #000000;
            font-size: 14px;
        }

        #glhMap {
            width: 100%;
            height: 360px;
            border: 2px solid #000000;
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
        <div class="header-title">About us</div>
    </header>

    <!-- Main Container -->
    <div class="container">
        <aside>
            <nav>
                <ul>
                    <li><a class="active" href="about.php">About</a></li>
                    <li><a href="producers.php">Producers</a></li>
                    <li><a href="productmenu.php">Product menu</a></li>
                    <li><a href="userdashboard.php">User dashboard</a></li>
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
            <!-- Overview Section -->
            <div class="overview-section">
                <p>Information about greenfield local hub and how they operate</p>
            </div>

            <div class="map-section">
                <h2>Where We Are</h2>
                <p>Greenfield Local Hub is located at our fictional site: 15 Orchard Lane, Meadowbridge, MB3 8GL.</p>
                <div id="glhMap" aria-label="Map showing Greenfield Local Hub location"></div>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // Fictional GLH location near Nottingham for demonstration purposes.
        const glhLocation = [52.9443, -1.1281];

        const map = L.map('glhMap').setView(glhLocation, 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const marker = L.marker(glhLocation).addTo(map);
        marker.bindPopup('<strong>Greenfield Local Hub</strong><br>15 Orchard Lane, Meadowbridge, MB3 8GL').openPopup();
    </script>
</body>
</html>