<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600&family=Raleway:wght@400;500;600&family=Roboto:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="CS.css">
</head>

<body class="body1">
    <header class="navbar">
        <div class="logo">
            <img src="assets/images/logo1.png" alt="logo">
        </div>

        <div class="search-container">
            <input type="text" id="productSearch" placeholder="Search products...">
            <button onclick="searchProducts()">Search</button>
        </div>

        <nav class="navcontainer">
            <ul class="navlinks">
                <li><a href="CSHomePage.php">Home</a></li>
                <li><a href="CSProducts.php">Products</a></li>
                <li><a href="#" id="supportBtn">Support</a></li>
                <li><a href="#" id="contactBtn">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
    <h1>Our Products</h1>
    <section>
        <div class="product-grid">
            <?php
            include 'db_connect.php';

            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="product-card">';
                    echo '<img src="' . htmlspecialchars($row['image_path']) . '" alt="' . htmlspecialchars($row['name']) . '">';
                    echo '<h2>' . htmlspecialchars($row['name']) . '</h2>';
                    echo '<p>₱' . number_format($row['price'], 2) . '</p>';
                    echo '<button>ADD TO CART</button>';
                    echo '</div>';
                }
            } else {
                echo '<p>No products found.</p>';
            }

            $conn->close();
            ?>
        </div>
    </section>
</main>

    <div id="supportModal" class="modal-overlay-support">
        <div class="modal-box-support">
            <span class="close-btn-support" id="closeSupportModal">&times;</span>
            <h2>Need Help?</h2>
            <p>If you have any questions or issues, feel free to reach out to our support team!</p>
            <form id="supportForm">
                <input type="text" placeholder="Your Name" required />
                <input type="email" placeholder="Your Email" required />
                <textarea placeholder="How can we help you?" required></textarea>
                <button type="submit" class="modal-btn-support confirm">Send</button>
                <p>© 2025 ChronoSync. All rights reserved.</p>
            </form>
        </div>
    </div>

    <!-- Contact Modal -->
    <div class="modal-overlay-contact" id="contactModal">
        <div class="modal-box-contact">
            <button id="closeContactModal">&times;</button>
            <h2>Contact Us</h2>
            <p>Have questions or feedback? We'd love to hear from you.</p>
            <form id="contactForm">
                <input type="text" placeholder="Your Name" required />
                <input type="email" placeholder="Your Email" required />
                <textarea placeholder="Your Message" required></textarea>
                <button type="submit" class="modal-btn-contact">Send Message</button>
                <p>© 2025 ChronoSync. All rights reserved.</p>
            </form>
        </div>
    </div>
</body>
<footer class="footer-landing">
    <div class="footer-content">
        <h2>Chrono Sync</h2>
        <p>Stay in sync with your health, your style, and your time. Only at Chrono Sync.</p>
        <div class="footer-icons">
            <a href="https://www.facebook.com/" aria-label="Facebook" target="_blank"><i
                    class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/" aria-label="Instagram" target="_blank"><i
                    class="fab fa-instagram"></i></a>
            <a href="https://www.tiktok.com/" aria-label="Tiktok" target="_blank"><i class="fab fa-tiktok"></i></a>
            <a href="https://www.youtube.com/" aria-label="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="https://www.linkedin.com/" aria-label="Linkedin" target="_blank"><i
                    class="fab fa-linkedin-in"></i></a>

        </div>
    </div>
    <div class="footer-bottom">
        <p>© 2025 ChronoSync. All rights reserved.</p>
    </div>
</footer>
<script src="CS.js"></script>

</html>