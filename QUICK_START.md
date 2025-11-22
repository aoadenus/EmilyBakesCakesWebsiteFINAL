# Quick Start Reference

## 🚀 Get Started in 5 Minutes

### 1. Start XAMPP
- Open XAMPP Control Panel
- Click "Start" next to Apache
- Click "Start" next to MySQL

### 2. Access Website
Open your browser and go to:
```
http://localhost/emily-bakes-cakes/index.php
```

### 3. Test Staff Login
Click the "Staff Login" button in the navbar, or go directly to:
```
http://localhost/emily-bakes-cakes/staff/login.php
```

### 4. Login with Demo Credentials
```
Email: manager@emilybakes.com
Password: Demo2024!
```

### 5. Explore Dashboard
You're now in the staff portal! Access:
- Orders Management
- Customers
- Products
- Reports

---

## 📍 Important URLs

| Page | URL |
|------|-----|
| Customer Home | `http://localhost/emily-bakes-cakes/index.php` |
| Customer Menu | `http://localhost/emily-bakes-cakes/menu.php` |
| Customer About | `http://localhost/emily-bakes-cakes/about.php` |
| Customer Contact | `http://localhost/emily-bakes-cakes/contact.php` |
| Staff Login | `http://localhost/emily-bakes-cakes/staff/login.php` |
| Staff Dashboard | `http://localhost/emily-bakes-cakes/staff/dashboard.php` |
| PhpMyAdmin | `http://localhost/phpmyadmin` |
| XAMPP Home | `http://localhost` |

---

## 👥 Demo Staff Accounts

Copy/Paste these credentials:

### Manager
- Email: `manager@emilybakes.com`
- Password: `Demo2024!`

### Sales
- Email: `sales@emilybakes.com`
- Password: `Demo2024!`

### Baker
- Email: `baker@emilybakes.com`
- Password: `Demo2024!`

### Decorator
- Email: `decorator@emilybakes.com`
- Password: `Demo2024!`

### Accountant
- Email: `accountant@emilybakes.com`
- Password: `Demo2024!`

---

## 🔄 Navigation Flow

### From Customer Website
1. Home page (`index.php`)
2. See "Staff Login" button in top-right navbar
3. Click it → Goes to `staff/login.php`

### From Staff Portal
1. Logged into dashboard (`staff/dashboard.php`)
2. See "← Back to Website" button in navbar
3. Click it → Returns to `index.php`
4. Click "Staff Login" again → Go back to portal

### Logging Out
1. In staff dashboard, click "Logout" button
2. Session cleared, redirects to login page
3. Can log back in anytime

---

## 🎨 Key Features

✅ Fully responsive (mobile, tablet, desktop)
✅ Emily Bakes Cakes branding throughout
✅ Multiple staff roles with demo accounts
✅ Session-based authentication
✅ Clean, modern UI using Bootstrap 5
✅ Easy navigation between customer site and staff portal
✅ No database required to test (uses PHP arrays for demo)

---

## 📂 Main Files Modified/Created

**Customer Website Pages (Converted to PHP):**
- `index.php` (was index.html)
- `menu.php` (was menu.html)
- `about.php` (was about.html)
- `contact.php` (was contact.html)

**Staff Portal (New/Updated):**
- `staff/login.php` (improved, with better styling)
- `staff/dashboard.php` (new, modern design)
- `staff/logout.php` (improved)

**Setup Guides (New):**
- `XAMPP_SETUP_GUIDE.md` (comprehensive setup)
- `QUICK_START.md` (this file)

---

## ✨ What Changed

### From Separate Systems To Connected Integration

**Before:**
- Customer website in Replit (separate)
- Staff app in Vercel (separate)
- No connection between them

**Now:**
- Customer website uses PHP (local)
- Staff portal integrated with customer site (local)
- "Staff Login" button connects them seamlessly
- All running on XAMPP locally

---

## 🛠️ If Something Doesn't Work

1. **Make sure XAMPP is running**
   - Check green status in Control Panel
   - Both Apache AND MySQL should be green

2. **Verify folder location**
   - Should be at: `C:\xampp\htdocs\emily-bakes-cakes`

3. **Clear browser cache**
   - Press Ctrl+Shift+Delete (Windows) or Cmd+Shift+Delete (Mac)
   - Clear cookies for localhost

4. **Restart XAMPP**
   - Click "Stop" on both services
   - Wait 5 seconds
   - Click "Start" on both services

---

## 📝 Next: Customization

Once the system is working, you can:

1. **Change demo passwords** in `staff/login.php`
2. **Update business info** (phone, address in footer)
3. **Modify colors** in CSS files
4. **Add your logo** to public/ folder
5. **Connect to database** for persistent data
6. **Add more staff pages** (copy dashboard.php as template)
7. **Deploy to web hosting** when ready

---

## 💡 Quick Tips

- **Save passwords** somewhere safe (in `QUICK_START.md` or a password manager)
- **Don't share demo credentials** with unauthorized people
- **Keep XAMPP running** while developing
- **Test on mobile** to verify responsive design
- **Back up your files** regularly

---

**You're all set! Enjoy your integrated Emily Bakes Cakes system! 🎂**
