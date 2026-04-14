<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'username';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessibility - Greenfield Local Hub</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background-color: #31d610; }
        header { background-color: #308f0b; border: 2px solid #000000; display: flex; align-items: center; padding: 20px; }
        .logo { flex: 0 0 20%; border-right: 2px solid #333; padding-right: 20px; text-align: left; font-weight: bold; font-size: 16px; }
        .header-title { flex: 1; text-align: center; font-size: 24px; font-weight: bold; text-decoration: underline; color: #ffffff;}
        .container { display: flex; min-height: calc(100vh - 120px); }
        aside { width: 150px; background-color: #308f0b; border-right: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 4px solid #000000; }
        nav ul { list-style: none; }
        nav li { border-bottom: 1px solid #ffffff; }
        nav a { display: block; padding: 12px 15px; text-decoration: none; color: #ffffff; font-size: 13px; text-align: center; transition: background-color 0.3s; }
        nav a:hover, nav a.active { background-color: #31d610; font-weight: bold; }
        main { flex: 1; padding: 20px; background-color: #4be253; border: 2px solid #000000; }
        .center { text-align: center; }
        .options-grid { display: grid; grid-template-columns: 1fr; gap: 15px; max-width: 500px; margin: 0 auto; }
        .option-box { border: 2px solid #000000; background: #ffffff; padding: 16px; }
        .btn { margin: 20px auto 0; display: inline-block; padding: 10px 16px; border: 2px solid #000000; background: #ffffff; color: #000000; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <header>
                   <a href="home.php">
            <img  
    src="picture1.png"width=200px
    height=100px>
</a>
        <div class="header-title">Accessibility</div>
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
                    <li><a href="loyaltyscheme.php">Loyalty scheme</a></li>
                    <li><a href="producerdashboard.php">Producer dashboard</a></li>
                    <li><a href="contact.php">Contact/support</a></li>
                    <li><a class="active" href="accessibility.php">Accessibility</a></li>
                    <li><a href="admindashboard.php">Admin dashboard</a></li>
                </ul>
            </nav>
        </aside>

        <main>
            <p style="margin-bottom: 20px; font-size: 16px;"><strong>Welcome <?php echo htmlspecialchars($username); ?></strong></p>
            <div class="options-grid">
                <div class="option-box">Options for changing the contrast of the pages</div>
                <div class="option-box">Options for changing the size of the writing</div>
                <div class="option-box">Options for implementing a screen reader</div>
            </div>
            <div class="center"><a href="#" class="btn">Confirm</a></div>
        </main>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>