# Emily Bakes Cakes - Student Project

This is a simple two-part system for a cake shop converted from React to pure HTML/PHP for academic use.

## What You Have

**Part 1: Public HTML Website** (4 pages)
- `index.html` - Home page with carousel and testimonials
- `menu.html` - Menu with tabbed product categories
- `about.html` - Company story and timeline
- `contact.html` - Contact information and hours
- `css/styles.css` - All styling (responsive, mobile-friendly)
- `js/script.js` - Interactivity (mobile menu, carousel, tabs)

**Part 2: PHP Staff Backend** (9 pages)
- `staff/login.php` - Simple login (no authentication yet)
- `staff/dashboard.php` - Business statistics overview
- `staff/customers.php` - Customer list with search
- `staff/customer_form.php` - Add/edit customers
- `staff/orders.php` - Order list with filtering
- `staff/order_create.php` - **COMPREHENSIVE order form with full cake customization**
- `staff/order_details.php` - View/edit orders and update status
- `staff/products.php` - Product catalog
- `staff/reports.php` - Business analytics
- `staff/includes/` - Database connection, header, footer

## Quick Start

### View the Public Website (No Setup Needed!)
1. Double-click `index.html` to open in your browser
2. Click through the navigation to see all pages

### ⚠️ Important: PHP Files Need a PHP Server

**Why does clicking `staff/login.php` download a file?**  
The current web server (Python HTTP server) cannot run PHP code - it only serves static files. To run the staff backend, you need a **PHP server** like XAMPP or MAMP.

### Run the PHP Staff Backend

**You'll need:**
- **XAMPP** (Windows/Mac) - Includes Apache + PHP + MySQL
- **MAMP** (Mac) - Includes Apache + PHP + MySQL  
- OR a school server with PHP and MySQL

**Setup Steps:**

1. **Create the database**
   - Open phpMyAdmin (usually at `http://localhost/phpmyadmin`)
   - Create a new database called `emily_bakes_cakes`
   - Click on the database, then click "SQL" tab
   - Copy and paste the contents of `database-schema.sql`
   - Click "Go" to create all tables and sample data

2. **Update database credentials**
   - Open `staff/includes/db.php` in a text editor
   - Change these lines to match your MySQL setup:
     ```php
     $db_host = 'localhost';        // Usually localhost
     $db_name = 'emily_bakes_cakes';
     $db_user = 'root';             // Your MySQL username
     $db_pass = '';                 // Your MySQL password
     ```

3. **Copy project to web server**
   - **XAMPP:** Copy this entire folder to `C:/xampp/htdocs/`
   - **MAMP:** Copy to `/Applications/MAMP/htdocs/`
   - **School server:** Upload via FTP as instructed

4. **Open in browser**
   - Start Apache and MySQL in XAMPP/MAMP
   - Visit: `http://localhost/emily-bakes-cakes/`
   - Click "Staff Login" button to access the backend
   - Once in the staff dashboard, click **"Create New Order"** to access the comprehensive order form

## Features

### Public Website
✅ Responsive design (works on phones, tablets, desktops)  
✅ Mobile hamburger menu  
✅ Image carousel on home page  
✅ Product tabs on menu page  
✅ Brand colors: Cream (#F8EBD7), Pink (#C44569), Dark (#2B2B2B)  
✅ Google Fonts: Playfair Display, Poppins, Open Sans

### Staff Backend
✅ Dashboard with live statistics  
✅ **Customers:** Add, edit, search, view order history  
✅ **Orders:** Full custom cake order form with:
   - 6 cake flavors (Vanilla, Chocolate, Red Velvet, Lemon, Strawberry, Carrot)
   - 15 fillings (creams, mousses, fruit fillings)
   - 6 icing flavors (buttercream, cream cheese, whipped cream, ganache, fondant)
   - 33 icing colors (classic, pastel, vibrant, elegant, earth tones, dark)
   - 7 sizes (6"-12" rounds, quarter/half/full sheets)
   - Custom writing, decorations, special instructions
   - Auto-calculated 50% deposit
✅ **Products:** Browse catalog with pricing  
✅ **Reports:** Customer count, order count, revenue totals  
✅ Bootstrap 5 styling (modern, professional look)

## Sample Data Included

After running `database-schema.sql`, you'll have:
- **8 products** (Birthday Celebration, Black Forest, Red Velvet, Lemon Doberge, etc.)
- **5 sample customers** (with phone, email, VIP status)
- **3 sample staff users** (owner, manager, sales - password: "password123")
- **3 sample orders** (showing different cake types and decorations)
- Ready to add your own data!

## Design Credits

- **Colors:** Vanilla Raspberry theme
- **Fonts:** Google Fonts (free to use)
- **Icons:** SVG graphics (custom)
- **Framework:** Bootstrap 5 (via CDN, free)

## Technologies

| Component | Technology |
|-----------|-----------|
| Frontend Pages | HTML5, CSS3, Vanilla JavaScript |
| Staff Backend | PHP 7.4+ |
| Database | MySQL 5.7+ |
| Styling | Custom CSS + Bootstrap 5 |
| Server | Apache (via XAMPP/MAMP) |

## File Structure

```
emily-bakes-cakes/
├── index.html              # Home page
├── menu.html               # Menu page
├── about.html              # About page  
├── contact.html            # Contact page
├── database-schema.sql     # MySQL database setup
├── css/
│   └── styles.css         # All website styles
├── js/
│   └── script.js          # Mobile menu, carousel, tabs
├── images/                # Empty (add your own images)
└── staff/                 # PHP backend
    ├── login.php
    ├── dashboard.php
    ├── customers.php
    ├── customer_form.php
    ├── orders.php
    ├── order_create.php
    ├── order_details.php
    ├── products.php
    ├── reports.php
    └── includes/
        ├── db.php         # Database connection
        ├── header.php     # Shared header
        └── footer.php     # Shared footer
```

## Important Notes

⚠️ **This is for learning purposes only**
- No real user authentication (anyone can access staff area)
- No password encryption
- SQL queries should use prepared statements (security improvement)
- No payment processing

💡 **Perfect for learning:**
- HTML/CSS responsive design
- Vanilla JavaScript (no frameworks)
- PHP CRUD operations
- MySQL database design
- Bootstrap styling

## Assignment Ideas

**Easy Enhancements (1-2 hours):**
1. Add images to the menu page product cards
2. Create a footer with social media links
3. Add form validation to customer form
4. Change the color scheme to your own brand

**Medium Enhancements (3-5 hours):**
1. Add real login authentication with sessions
2. Implement password hashing (bcrypt)
3. Add pagination to customer/order lists
4. Create a printable receipt page
5. Add date filtering to reports

**Advanced Enhancements (6+ hours):**
1. Build a shopping cart for online ordering
2. Integrate a payment API (Stripe, PayPal)
3. Add email notifications (PHPMailer)
4. Create PDF invoices (TCPDF, FPDF)
5. Build a customer portal for tracking orders
6. Add image upload for products

## Troubleshooting

**Problem:** "Access denied for user 'root'@'localhost'"  
**Solution:** Check your MySQL username/password in `staff/includes/db.php`

**Problem:** "Table 'customers' doesn't exist"  
**Solution:** Run the SQL from `database-schema.sql` in phpMyAdmin

**Problem:** Page shows PHP code instead of running  
**Solution:** Make sure Apache is running and you're accessing via `http://localhost/`

**Problem:** "Cannot connect to database"  
**Solution:** Start MySQL in XAMPP/MAMP control panel

**Problem:** Clicking `staff/login.php` downloads a file instead of displaying the page  
**Solution:** This is normal in Replit - PHP files need a PHP server (Apache) to run. Follow the setup steps above to install XAMPP/MAMP on your local computer.

## Getting Help

1. Check that Apache and MySQL are running (green lights in XAMPP/MAMP)
2. Verify database credentials in `staff/includes/db.php`
3. Check browser console for JavaScript errors (F12)
4. Look at Apache error logs in XAMPP/MAMP

## Credits

Built for CIS students learning web development. Feel free to modify, extend, and use for your coursework!

**Original Design:** Emily Bakes Cakes brand concept  
**Code:** Converted from React to pure HTML/PHP for educational use  
**License:** Free for educational purposes
