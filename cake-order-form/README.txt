================================================================================
CAKE ORDER SYSTEM - STANDALONE PHP PROJECT
================================================================================

A simple, lightweight cake order management system with comprehensive 
customization options.

================================================================================
QUICK START
================================================================================

1. INSTALL XAMPP/MAMP
   - Download from: https://www.apachefriends.org (XAMPP)
   - Or: https://www.mamp.info (MAMP for Mac)
   - Install and start Apache + MySQL

2. COPY FILES
   - Copy this entire "cake-order-form" folder to:
     * XAMPP: C:/xampp/htdocs/
     * MAMP: /Applications/MAMP/htdocs/

3. CREATE DATABASE
   - Open phpMyAdmin: http://localhost/phpmyadmin
   - Click "Import" tab
   - Choose "database.sql" file
   - Click "Go"
   - Database "cake_orders" will be created automatically!

4. CONFIGURE DATABASE CONNECTION
   - Open "db.php" in a text editor
   - Update these lines if needed:
     $db_host = 'localhost';
     $db_name = 'cake_orders';
     $db_user = 'root';
     $db_pass = '';

5. RUN THE APPLICATION
   - Visit: http://localhost/cake-order-form/
   - Click "Create New Order" to start!

================================================================================
FEATURES
================================================================================

✅ Comprehensive order form with:
   - 6 cake flavors
   - 15 filling options
   - 6 icing flavors
   - 33 icing colors (organized by category)
   - 7 cake sizes with serving counts
   - Custom writing and decorations
   - Auto-calculated 50% deposit

✅ Order management:
   - View all orders in a clean table
   - Order success confirmation page
   - Status tracking (pending/in_progress/ready/completed)

✅ Simple database:
   - Single table design
   - Easy to understand and modify
   - Sample data included

================================================================================
FILE STRUCTURE
================================================================================

cake-order-form/
├── index.php           # Home page with navigation
├── order_form.php      # Comprehensive order form
├── view_orders.php     # View all submitted orders
├── order_success.php   # Order confirmation page
├── db.php             # Database connection
├── database.sql       # Database setup file
└── README.txt         # This file

================================================================================
TROUBLESHOOTING
================================================================================

Problem: "Connection failed"
Solution: Make sure MySQL is running in XAMPP/MAMP control panel

Problem: "Table 'orders' doesn't exist"
Solution: Import database.sql in phpMyAdmin

Problem: PHP code shows in browser instead of running
Solution: Make sure you're accessing via http://localhost/ (not file://)

Problem: Can't access phpMyAdmin
Solution: Visit http://localhost/phpmyadmin (Apache must be running)

================================================================================
CUSTOMIZATION IDEAS
================================================================================

Easy:
- Add more cake flavors or icing colors in the dropdown
- Change the pink color (#C44569) to your brand color
- Add your logo to the top of each page

Medium:
- Add customer database (separate table)
- Add email notifications (PHPMailer)
- Add order editing functionality
- Add printable receipts

Advanced:
- Add user login/authentication
- Add payment integration (Stripe)
- Add PDF invoice generation
- Add image upload for custom designs

================================================================================
TECHNICAL DETAILS
================================================================================

Languages: PHP, HTML, CSS, JavaScript, SQL
Database: MySQL 5.7+
Framework: Bootstrap 5 (via CDN)
Server: Apache (via XAMPP/MAMP)

Requirements:
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache web server

================================================================================
NOTES
================================================================================

⚠️ This is a student/learning project!
   - No password encryption
   - Basic SQL queries (should use prepared statements for production)
   - No user authentication
   - Perfect for learning PHP and MySQL basics

📚 Great for learning:
   - PHP form handling
   - MySQL database design
   - Bootstrap styling
   - CRUD operations

================================================================================
NEED HELP?
================================================================================

1. Make sure XAMPP/MAMP is running (green lights)
2. Check Apache error logs in XAMPP/MAMP
3. Verify database credentials in db.php
4. Test database connection at http://localhost/phpmyadmin

================================================================================
LICENSE
================================================================================

Free for educational use. Modify and extend as needed for your projects!

Built for students learning web development.

================================================================================
