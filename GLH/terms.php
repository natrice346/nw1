<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service - Greenfield Local Hub</title>
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
        <div class="header-title">Terms of Service</div>
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
                <h2>Terms of Service</h2>
                
                <h3>1. Use License</h3>
                <p>Permission is granted to temporarily download one copy of the materials (information or software) on Greenfield Local Hub's website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
                <ul>
                    <li>Modify or copy the materials</li>
                    <li>Use the materials for any commercial purpose or for any public display</li>
                    <li>Attempt to decompile or reverse engineer any software contained on the site</li>
                    <li>Remove any copyright or other proprietary notations from the materials</li>
                    <li>Transfer the materials to another person or "mirror" the materials on any other server</li>
                </ul>

                <h3>2. User Accounts</h3>
                <p>When you create a user account, you agree to:</p>
                <ul>
                    <li>Provide accurate and complete information</li>
                    <li>Maintain the confidentiality of your password</li>
                    <li>Accept responsibility for all activities under your account</li>
                    <li>Comply with all applicable laws and regulations</li>
                </ul>

                <h3>3. Product Information</h3>
                <p>We strive to provide accurate product descriptions and pricing. However, we do not warrant that product descriptions, pricing, or other content is accurate, complete, or error-free.</p>

                <h3>4. Limitation of Liability</h3>
                <p>In no event shall Greenfield Local Hub or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on the website.</p>

                <h3>5. Disputes</h3>
                <p>Any dispute relating to the website shall be governed by the laws of the United Kingdom and shall be subject to the exclusive jurisdiction of the courts located in the United Kingdom.</p>

                <h3>6. Changes to Terms</h3>
                <p>Greenfield Local Hub reserves the right to revise these Terms of Service at any time without notice. By using this website, you are agreeing to be bound by the then current version of these Terms of Service.</p>

                <h3>7. Contact Information</h3>
                <p>If you have any questions about these Terms of Service, please <a href="contact.php">contact us</a>.</p>

                <p style="margin-top: 30px; font-size: 12px; color: #666;">Last updated: April 2026</p>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
