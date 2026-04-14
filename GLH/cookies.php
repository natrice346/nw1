<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Policy - Greenfield Local Hub</title>
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
            overflow-y: auto;
        }

        .legal-content {
            background-color: #ffffff;
            border: 2px solid #000000;
            padding: 30px;
            line-height: 1.6;
        }

        .legal-content h2 {
            color: #308f0b;
            margin-bottom: 20px;
            border-bottom: 2px solid #31d610;
            padding-bottom: 10px;
        }

        .legal-content h3 {
            color: #308f0b;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .legal-content p {
            margin-bottom: 15px;
            text-align: justify;
        }

        .legal-content ul {
            margin-left: 30px;
            margin-bottom: 15px;
        }

        .legal-content li {
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <a href="home.php">
            <img src="picture1.png" width="200px" height="100px">
        </a>
        <div class="header-title">Cookie Policy</div>
    </header>

    <!-- Main Container -->
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
                    <li><a href="producerdashboard.php">Producer dashboard</a></li>
                    <li><a href="contact.php">Contact/support</a></li>
                    <li><a href="accessibility.php">Accessibility</a></li>
                    <li><a href="admindashboard.php">Admin dashboard</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main>
            <div class="legal-content">
                <h2>Cookie Policy</h2>
                
                <h3>What Are Cookies?</h3>
                <p>Cookies are small data files stored on your device that help us track your preferences and improve your user experience on our platform.</p>

                <h3>How We Use Cookies</h3>
                <ul>
                    <li><strong>Session Cookies:</strong> These help us maintain your login session and shopping cart.</li>
                    <li><strong>Preference Cookies:</strong> These remember your choices and settings.</li>
                    <li><strong>Analytics Cookies:</strong> These help us understand how users interact with our site.</li>
                    <li><strong>Authentication Cookies:</strong> These secure your account information.</li>
                </ul>

                <h3>Your Cookie Choices</h3>
                <p>You can control cookies through your browser settings. Most browsers allow you to decline cookies or alert you when a website attempts to place a cookie on your device.</p>

                <h3>Third-Party Cookies</h3>
                <p>We may allow third-party service providers to place cookies on your device for analytics and advertising purposes. These providers are bound by confidentiality agreements.</p>

                <h3>Cookie Retention</h3>
                <p>Session cookies are deleted when you close your browser. Persistent cookies may remain for up to one year unless you clear your browser cache.</p>

                <h3>Questions?</h3>
                <p>If you have questions about our cookie policy, please <a href="contact.php">contact us</a>.</p>

                <p style="margin-top: 30px; font-size: 12px; color: #666;">Last updated: April 2026</p>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
