# Emily Bakes Cakes - XAMPP Setup Guide

## 🎂 Complete Integration Setup for PHP Staff Portal

This guide walks you through setting up the Emily Bakes Cakes website with the staff portal using XAMPP.

---

## 📋 What You Have

**Two Integrated Systems:**

1. **Customer-Facing Website** (HTML/CSS/PHP)
   - Home, Menu, About, Contact pages
   - Responsive design for all devices
   - Staff Login button in navigation

2. **Staff Portal** (PHP/MySQL)
   - Role-based authentication
   - Multiple staff dashboards (Manager, Sales, Baker, Decorator, Accountant)
   - Order management, customer database, reports

---

## 🚀 Setup Steps

### Step 1: Install XAMPP

1. Download XAMPP from [https://www.apachefriends.org](https://www.apachefriends.org)
2. Install it to the default location:
   - **Windows:** `C:\xampp`
   - **Mac:** `/Applications/XAMPP`

### Step 2: Copy Project to XAMPP

1. Locate your project folder: `EmilyBakesCakesWebsiteFINAL`
2. Copy it to the XAMPP htdocs folder:
   - **Windows:** `C:\xampp\htdocs\emily-bakes-cakes`
   - **Mac:** `/Applications/XAMPP/htdocs/emily-bakes-cakes`

Your folder structure should look like:
```
xampp/htdocs/
└── emily-bakes-cakes/
    ├── index.php
    ├── menu.php
    ├── about.php
    ├── contact.php
    ├── css/
    ├── js/
    ├── staff/
    │   ├── login.php
    │   ├── dashboard.php
    │   ├── logout.php
    │   ├── orders.php
    │   ├── customers.php
    │   ├── products.php
    │   └── reports.php
    ├── database-schema.sql
    └── ... (other files)
```

### Step 3: Start XAMPP Services

**Windows:**
1. Open XAMPP Control Panel
2. Click "Start" next to **Apache**
3. Click "Start" next to **MySQL**
4. Status should show green checkmarks

**Mac:**
1. Open XAMPP Manager
2. Start Apache and MySQL

### Step 4: Create MySQL Database (Optional)

If you want to use the database for actual data:

1. Open your browser and go to: `http://localhost/phpmyadmin`
2. Click on the **SQL** tab
3. Copy and paste the contents of `database-schema.sql`
4. Click "Go" to create the database tables

**Note:** The current system works with demo credentials stored in PHP. Database integration is optional.

### Step 5: Access the Website

Open your browser and visit:

**Customer Website:**
```
http://localhost/emily-bakes-cakes/index.php
```

**Staff Portal:**
```
http://localhost/emily-bakes-cakes/staff/login.php
```

---

## 🔐 Demo Staff Credentials

Use these to log into the staff portal:

| Role | Email | Password |
|------|-------|----------|
| **Manager** | manager@emilybakes.com | Demo2024! |
| **Sales** | sales@emilybakes.com | Demo2024! |
| **Baker** | baker@emilybakes.com | Demo2024! |
| **Decorator** | decorator@emilybakes.com | Demo2024! |
| **Accountant** | accountant@emilybakes.com | Demo2024! |

---

## 🌐 Website Pages

### Customer-Facing Pages

All pages are now PHP-based and include the staff login button:

- **Home** (`index.php`)
  - Hero section with call-to-action
  - Features and testimonials
  - Contact button

- **Menu** (`menu.php`)
  - Cake flavors, fillings, decorations
  - Tabbed interface for filtering

- **About** (`about.php`)
  - Company story
  - History and baking philosophy

- **Contact** (`contact.php`)
  - Contact information
  - Location, hours, phone
  - Ordering workflow

### Staff Portal Pages

1. **Login Page** (`staff/login.php`)
   - Clean, branded login interface
   - Demo credentials displayed
   - Back link to customer website

2. **Dashboard** (`staff/dashboard.php`)
   - Welcome message with user info
   - Quick access cards to all sections
   - Role badge display

3. **Orders** (`staff/orders.php`)
   - View all orders
   - Create new orders
   - Order filtering and search

4. **Customers** (`staff/customers.php`)
   - View customer list
   - Customer search
   - Add/edit customers

5. **Products** (`staff/products.php`)
   - Browse product catalog
   - Product pricing

6. **Reports** (`staff/reports.php`)
   - Business analytics
   - Revenue tracking
   - Order statistics

---

## 🔗 Integration Flow

### How the Systems Connect

```
Customer Website (index.php)
    ↓
    └─→ Staff Login Button
         ↓
         └─→ staff/login.php
              ↓
              [Authentication]
              ↓
              └─→ staff/dashboard.php
                   ↓
                   [Role-based access to all staff functions]
                   ↓
                   Can return to customer website anytime
```

### Key Connection Points

1. **Customer Website Navigation**
   - All pages (`index.php`, `menu.php`, etc.) have a "Staff Login" button in the navbar
   - Button links to `staff/login.php`

2. **Staff Portal Navigation**
   - "Back to Website" link returns to `../index.php`
   - Logout button clears session and returns to login page

3. **Session Management**
   - Each page starts with `session_start()`
   - Login page stores user data in `$_SESSION`
   - Protected pages check for `$_SESSION['logged_in']`

---

## 📱 Responsive Design

Both the customer website and staff portal are fully responsive:

- **Desktop:** Full layouts with multiple columns
- **Tablet:** Adjusted grid layouts
- **Mobile:** Single-column stack with optimized buttons

Test by resizing your browser or using device emulation (F12 in Chrome).

---

## 🛠️ Troubleshooting

### "Page Not Found" Error

**Issue:** Getting 404 errors
**Solution:** 
- Make sure XAMPP is running (Apache and MySQL)
- Verify folder is at `C:\xampp\htdocs\emily-bakes-cakes`
- Try accessing `http://localhost/phpmyadmin` first to test if Apache works

### "Access Denied" or Blank Login Page

**Issue:** Login page won't load
**Solution:**
- Check that `staff/login.php` file exists
- Verify there are no syntax errors (check XAMPP error logs)
- Restart Apache in XAMPP Control Panel

### Session Errors

**Issue:** Logging out doesn't work properly
**Solution:**
- Clear browser cookies for localhost
- Check that `staff/logout.php` exists
- Restart XAMPP

### Database Connection Errors

**Issue:** Database queries fail
**Solution:**
- Verify MySQL is running in XAMPP
- Run the `database-schema.sql` file in phpMyAdmin
- Check database credentials in `staff/includes/db.php`

---

## ✅ Verification Checklist

After setup, verify everything works:

- [ ] Apache server is running (XAMPP Control Panel shows green)
- [ ] MySQL server is running (XAMPP Control Panel shows green)
- [ ] Can access `http://localhost/emily-bakes-cakes/index.php`
- [ ] Customer website loads with all pages accessible
- [ ] "Staff Login" button works and links to login page
- [ ] Can log in with demo credentials (manager@emilybakes.com / Demo2024!)
- [ ] Staff dashboard loads after login
- [ ] "Back to Website" link returns to customer site
- [ ] Logout button works and returns to login page
- [ ] Website is fully responsive on mobile devices

---

## 🔒 Security Notes

The current system uses demo credentials for testing. For production:

1. **Change demo passwords** in `staff/login.php`
2. **Use proper database authentication** instead of hardcoded credentials
3. **Implement HTTPS** (SSL certificate)
4. **Add CSRF tokens** to all forms
5. **Use prepared statements** for database queries
6. **Hash passwords** with `password_hash()` function

---

## 📚 File Structure

```
emily-bakes-cakes/
├── index.php                 # Home page (PHP)
├── menu.php                  # Menu page (PHP)
├── about.php                 # About page (PHP)
├── contact.php               # Contact page (PHP)
├── css/
│   └── styles.css           # Main stylesheet
├── js/
│   └── script.js            # JavaScript interactions
├── staff/
│   ├── login.php            # Staff login page
│   ├── dashboard.php        # Main staff dashboard
│   ├── logout.php           # Logout handler
│   ├── orders.php           # Orders management
│   ├── customers.php        # Customer management
│   ├── products.php         # Product catalog
│   ├── reports.php          # Reports & analytics
│   ├── includes/
│   │   ├── db.php           # Database connection
│   │   ├── auth.php         # Authentication functions
│   │   └── header.php       # Shared header/nav
│   ├── manager/             # Manager-specific pages
│   ├── sales/               # Sales team pages
│   ├── baker/               # Baker task pages
│   ├── decorator/           # Decorator task pages
│   └── accountant/          # Accountant reports
├── database-schema.sql      # MySQL database schema
├── package.json             # Node dependencies (Next.js)
└── README.md               # Project documentation
```

---

## 🎯 Next Steps

1. **Test the system** with demo credentials
2. **Explore all pages** in both customer and staff sections
3. **Customize branding** if needed (colors, logos, text)
4. **Set up database** if you want persistent storage
5. **Deploy to production** when ready (using a web hosting provider)

---

## 📞 Support

For more information:
- XAMPP Documentation: https://www.apachefriends.org
- PHP Manual: https://www.php.net/manual
- Bootstrap Docs: https://getbootstrap.com/docs
- MySQL Docs: https://dev.mysql.com/doc

---

**Ready to go live? Your Emily Bakes Cakes website is now fully integrated!** 🎉
