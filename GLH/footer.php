<!-- Footer -->
<footer class="site-footer">
    <div class="footer-content">
        <div class="footer-section">
            <h4>Legal</h4>
            <ul>
                <li><a href="cookies.php">Cookie Policy</a></li>
                <li><a href="privacy.php">Privacy Policy</a></li>
                <li><a href="terms.php">Terms of Service</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Information</h4>
            <ul>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="accessibility.php">Accessibility</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Account</h4>
            <ul>
                <?php if (isset($_SESSION['username'])): ?>
                    <li><a href="userdashboard.php">My Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2026 Greenfield Local Hub. All rights reserved.</p>
    </div>
</footer>

<style>
    .site-footer {
        background-color: #308f0b;
        border-top: 2px solid #000000;
        padding: 30px 20px 15px 20px;
        margin-top: 20px;
    }

    .footer-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto 20px;
    }

    .footer-section h4 {
        font-size: 16px;
        font-weight: bold;
        color: #ffffff;
        margin-bottom: 15px;
        border-bottom: 2px solid #31d610;
        padding-bottom: 8px;
    }

    .footer-section ul {
        list-style: none;
        padding: 0;
    }

    .footer-section li {
        margin-bottom: 8px;
    }

    .footer-section a {
        color: #ffffff;
        text-decoration: none;
        font-size: 14px;
        transition: color 0.3s;
    }

    .footer-section a:hover {
        color: #31d610;
        font-weight: bold;
    }

    .footer-bottom {
        text-align: center;
        border-top: 1px solid #ffffff;
        padding-top: 15px;
        color: #ffffff;
        font-size: 12px;
    }
</style>
