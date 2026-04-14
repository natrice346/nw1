<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - Greenfield Local Hub</title>
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
            border: 2px solid #000000;
        }

        .overview-section {
            background-color: #ffffff;
            border: 2px solid #000000;
            padding: 40px;
            text-align: center;
            margin-bottom: 20px;
            min-height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .content-box {
            border: 2px solid #000000;
            padding: 40px;
            background-color: #ffffff;
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .content-box h3 {
            font-size: 16px;
            color: #000000;
        }

        /* Slideshow Styles */
        .slideshow-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto 20px;
        }

        .slide {
            display: none;
        }

        .slide img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .fade {
            animation-name: fade;
            animation-duration: 3s;
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        .dots {
            text-align: center;
            padding: 10px;
        }

        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #ffffff;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #000000;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
   
</a>
        <div class="header-title">Greenfield local Hub</div>
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
            <!-- Slideshow Section -->
            <div class="slideshow-container">
                <div class="slide fade">
                    <img src="farmer.png" alt="Slide 1">
                </div>
                <div class="slide fade">
                    <img src="homeprod.png" alt="Slide 2">
                </div>
                <div class="slide fade">
                    <img src="deliverprod.png" alt="Slide 3">
                </div>
                
                <!-- Navigation dots -->
                <div class="dots">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>

            <!-- Overview Section -->
            <div class="overview-section">
                <p>Overview of Greenfield local hub and pictures of how they operate</p>
            </div>

            <!-- Content Grid -->
            <div class="content-grid">
                <!-- Recent Promotions Box -->
                <div class="content-box">
                    <h3>Recent promotions and offers</h3>
                </div>

                <!-- Trending Producers Box -->
                <div class="content-box">
                    <h3>Trending producers on the site</h3>
                </div>
            </div>
        </main>
    </div>

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("slide");
            let dots = document.getElementsByClassName("dot");
            
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            
            setTimeout(showSlides, 3000); // Change image every 3 seconds
        }

        function currentSlide(n) {
            slideIndex = n - 1;
            showSlides();
        }
    </script>

    <?php include 'footer.php'; ?>
</body>
</html>