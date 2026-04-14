<?php
session_start();

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'username';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact/support - Greenfield Local Hub</title>
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
        .dashboard-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; }
        .panel { border: 2px solid #000000; background-color: #ffffff; padding: 15px; min-height: 170px; }
        .panel h2 { margin-bottom: 10px; font-size: 18px; }
        .panel p { margin-bottom: 8px; line-height: 1.5; }
        .panel-large { grid-column: 1 / -1; }
        .button { display: inline-block; margin-top: 10px; padding: 8px 12px; color: #fff; background-color: #000000; text-decoration: none; border: 2px solid #000000; }
        .form-group { margin-bottom: 12px; }
        .form-group label { display: block; font-size: 14px; margin-bottom: 4px; }
        .form-group input, .form-group textarea { width: 100%; padding: 8px; border: 1px solid #000000; border-radius: 3px; }
        .form-group textarea { min-height: 120px; resize: vertical; }
    </style>
</head>
<body>
    <header>
                  <a href="home.php">
            <img  
    src="picture1.png"width=200px
    height=100px>
</a>
        <div class="header-title">Contact/support</div>
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
                    <li><a class="active" href="contact.php">Contact/support</a></li>
                    <li><a href="accessibility.php">Accessibility</a></li>
                    <li><a href="admindashboard.php">Admin dashboard</a></li>
                </ul>
            </nav>
        </aside>

        <main>
            <p style="margin-bottom: 20px; font-size: 16px;"><strong>Welcome <?php echo htmlspecialchars($username); ?></strong></p>
            <div class="dashboard-grid">
                <section class="panel">
                    <h2>Greenfield Local Hub contact</h2>
                    <p>Email: support@greenfieldlocalhub.example.com</p>
                    <p>Phone: +44 7385 264284</p>
                    <p>Office Hours: Mon-Sat 9:00 - 17:00 & sun 10:00-16:00</p>
                    <p>Address: 10 Community Lane, Greenfield, GF1 2AB</p>
                </section>

                <section class="panel">
                    <h2>User comments</h2>
                    <p><strong>Jane D.:</strong> Great producer availability - easy to order!</p>
                    <p><strong>Tom W.:</strong> Has there been a delay in delivery times this week.</p>
                    <p><strong>Asha K.:</strong> I found the search box very useful. Please add ability to filter by organic.</p>
                </section>

                <section class="panel panel-large">
                    <h2>Submit question / complaint</h2>
                    <form method="post" action="#">
                        <div class="form-group">
                            <label for="name">Your name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Your email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <button type="submit" class="button">Send message</button>
                        <a class="button" href="logout.php">Sign out</a>
                    </form>
                </section>
            </div>
        </main>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>