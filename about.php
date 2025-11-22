<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Emily Bakes Cakes</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800&family=Poppins:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="container nav-container">
            <a href="index.php" class="logo">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="#F8EBD7">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
                <span>Emily Bakes Cakes</span>
            </a>
            
            <div class="nav-menu" id="navMenu">
                <a href="index.php" class="nav-link">Home</a>
                <a href="menu.php" class="nav-link">Menu</a>
                <a href="about.php" class="nav-link active">About</a>
                <a href="contact.php" class="nav-link">Contact</a>
                <a href="staff/login.php" class="staff-login-btn">Staff Login</a>
            </div>
            
            <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container">
            <h1 class="gradient-text">About Us</h1>
            <p class="handwriting">Baked with Love Since 2003</p>
        </div>
    </section>

    <!-- Story Section -->
    <section class="about-story">
        <div class="container">
            <h2>Our Story</h2>
            <div class="story-content">
                <p>Since opening our doors in 2003, Emily Bakes Cakes has become one of Houston's favorite destinations for handcrafted, European-style cakes, cupcakes, cookies, pastries, and custom celebration desserts. What started as a childhood passion in Emily Boudreaux's grandmother's kitchen has grown into a bakery built on tradition, artistry, and the belief that every milestone deserves a special cake.</p>
                
                <p>Emily's baking roots run deep. As a young girl, she learned side-by-side with her grandmother "Mommie," who always said that everyone deserves one unforgettable cake for every big moment in life. After spending several years training in Paris and Salzburg, Emily returned home with advanced French, Bavarian, and Austrian baking techniques — combined with the family recipes passed down through generations. The result is the signature flavor, texture, and attention to detail that customers love.</p>
                
                <p>Today, every product we make is baked from scratch and crafted with intention. Whether it's a classic standard cake or a fully custom design, our team of bakers and decorators work closely to bring each vision to life. We specialize in European-style custom cakes that range from simple elegance to highly detailed, artistic pieces featuring fondant work, sculpted elements, color palettes, and customer-provided inspiration photos.</p>
                
                <p>Located near the Galleria in Houston, our physical storefront serves walk-in guests daily.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Experience the Difference</h2>
            <p>Visit us or call to learn more about our European baking traditions</p>
            <a href="contact.php" class="cta-button">Get in Touch</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>Emily Bakes Cakes</h4>
                    <p>Custom cakes crafted with love and tradition since 2003</p>
                </div>
                <div class="footer-col">
                    <h4>Contact</h4>
                    <p>2847 Westheimer Road<br>Houston, TX 77098</p>
                    <p>Phone: (713) 555-CAKE</p>
                    <p>Email: info@emilybakescakes.com</p>
                </div>
                <div class="footer-col">
                    <h4>Hours</h4>
                    <p>Monday-Friday: 9am-6pm<br>Saturday: 9am-5pm<br>Sunday: Closed</p>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <p><a href="index.php">Home</a></p>
                    <p><a href="menu.php">Menu</a></p>
                    <p><a href="about.php">About</a></p>
                    <p><a href="contact.php">Contact</a></p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Emily Bakes Cakes. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
