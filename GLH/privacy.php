<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - Greenfield Local Hub</title>
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
        <div class="header-title">Privacy Policy</div>
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
                <h2>Privacy Policy</h2>
                
                <h3>1. Introduction</h3>
                <p>Greenfield Local Hub ("we," "us," or "our") operates the website. This page informs you of our policies regarding the collection, use, and disclosure of personal data when you use our Service and the choices you have associated with that data.</p>

                <h3>2. Information Collection and Use</h3>
                <p>We collect several different types of information for various purposes to provide and improve our Service to you.</p>
                <ul>
                    <li><strong>Account Information:</strong> Username, email, password, and account preferences.</li>
                    <li><strong>Transaction Data:</strong> Order history, payment information, and delivery addresses.</li>
                    <li><strong>Usage Information:</strong> Pages visited, time spent on site, and interaction patterns.</li>
                    <li><strong>Device Information:</strong> Browser type, IP address, and device specifications.</li>
                </ul>

                <h3>3. Security of Data</h3>
                <p>The security of your data is important to us but remember that no method of transmission over the Internet or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>

                <h3>4. Your Rights</h3>
                <p>You have the right to:</p>
                <ul>
                    <li>Access the personal data we hold about you</li>
                    <li>Request correction of inaccurate data</li>
                    <li>Request deletion of your data</li>
                    <li>Object to processing of your data</li>
                    <li>Request restriction of processing</li>
                    <li>Data portability rights</li>
                </ul>

                <h3>5. Changes to This Privacy Policy</h3>
                <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>

                <h3>6. Contact Us</h3>
                <p>If you have any questions about this Privacy Policy, please <a href="contact.php">contact us</a>.</p>

                <p style="margin-top: 30px; font-size: 12px; color: #666;">Last updated: April 2026</p>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
