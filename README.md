# Emily Bakes Cakes - Simple HTML Website & Staff Portal

**A clean, simple website for a custom cake bakery built with HTML, CSS, and JavaScript only.**

## ✨ System Overview

This is a **pure HTML/CSS/JavaScript system** with no complex frameworks:

1. **Customer-Facing Website** (Public)
   - Responsive design for all devices
   - Browse menu, read about page, contact info
   - "Staff Login" button in navigation

2. **Staff Portal** (Simple Authentication)
   - Role-based dashboard access
   - Mock data for demonstration
   - Demo accounts for testing all roles

**Both systems run with a simple Python web server - no database or backend required!**

---

## 📋 What You Have Now

### Public Website Pages (HTML-based)
- **`index.html`** - Home page with hero section and testimonials
- **`menu.html`** - Menu with tabbed product categories
- **`about.html`** - Company story and FAQ
- **`contact.html`** - Contact information, hours, ordering workflow
- **`css/styles.css`** - Responsive styling (Emily Bakes Cakes branding)
- **`js/script.js`** - Mobile menu, carousel, tabs

### Staff Portal Pages (HTML-based)
- **`staff-login.html`** - Staff login page with branding
- **`dashboard.html`** - Role-based staff dashboard
- **`forgot-password.html`** - Password reset information page
- **`data.js`** - Mock data (orders, customers, products)

### Demo Credentials (Built-in)
Five pre-configured staff roles for testing:
- **Manager:** manager / password
- **Sales:** sales / password
- **Baker:** baker / password
- **Decorator:** decorator / password
- **Accountant:** accountant / password

---

## 🚀 Quick Start (1 Minute)

### Option 1: Using Python (Recommended)

1. **Open Command Prompt/Terminal**
2. **Navigate to the project folder:**
   ```bash
   cd c:\xampp\htdocs\EmilyBakesCakesWebsiteFINAL
   ```
3. **Start the server:**
   ```bash
   python -m http.server 8000
   ```
   Or double-click: **`START_SERVER.bat`**

4. **Open in browser:**
   ```
   http://localhost:8000
   ```

### Option 2: Using XAMPP (Alternative)

1. **Start XAMPP Apache** (no MySQL needed)
2. **Open in browser:**
   ```
   http://localhost/EmilyBakesCakesWebsiteFINAL/index.html
   ```

---

## 🔐 How to Use

### Public Website
1. Open `http://localhost:8000/index.html`
2. Navigate through: Home → Menu → About → Contact
3. Click "Staff Login" button to access staff portal

### Staff Portal
1. Click "Staff Login" or go to `http://localhost:8000/staff-login.html`
2. Use demo credentials (e.g., **manager** / **password**)
3. Select role to see role-specific dashboard
4. Dashboard shows:
   - Total Orders: 156
   - This Week: 42
   - Pending: 8
   - Revenue: $5,240
5. Click "Logout" to return to login

---

## 📁 File Structure

```
EmilyBakesCakesWebsiteFINAL/
├── index.html              # Home page
├── menu.html               # Menu page
├── about.html              # About page
├── contact.html            # Contact page
├── staff-login.html        # Staff login
├── dashboard.html          # Staff dashboard
├── forgot-password.html    # Password reset info
├── data.js                 # Mock data
├── START_SERVER.bat        # Windows server launcher
├── css/
│   └── styles.css         # All website styles
├── js/
│   └── script.js          # Mobile menu, carousel, tabs
└── public/
    └── ebc-cake-images/   # 15 cake product images
```

---

## 🛠 Technologies Used

| Component | Technology | Complexity |
|-----------|-----------|------------|
| **Frontend Pages** | HTML5 | ✅ Simple |
| **Styling** | CSS3 | ✅ Simple |
| **Interactivity** | Vanilla JavaScript | ✅ Simple |
| **Data** | JavaScript Objects | ✅ Simple |
| **Server** | Python HTTP Server | ✅ Simple |

**No React. No TypeScript. No Node.js. No Database. No Complex Frameworks.**

---

## 🎨 Features

### Public Website
✅ Responsive design (mobile, tablet, desktop)
✅ Mobile hamburger menu
✅ Tabbed menu with 6 categories
✅ 15 standard cakes with images and pricing
✅ Brand colors: Cream (#F8EBD7), Pink (#C44569), Dark (#2B2B2B)
✅ Google Fonts: Playfair Display, Poppins, Open Sans

### Staff Portal
✅ Simple login authentication (localStorage)
✅ Role-based dashboards (5 roles)
✅ Dashboard KPI cards
✅ Mock data display
✅ Logout functionality
✅ Forgot password support page

---

## 📊 Mock Data Included

The `data.js` file includes:
- **15 standard cakes** with images, descriptions, prices
- **6 cake flavors** (Vanilla, Chocolate, Red Velvet, etc.)
- **15 fillings** (buttercreams, mousses, fruit)
- **27 icing colors** with hex codes
- **6 icing flavors**
- **30+ decorations**
- **5 sample orders**
- **8 sample customers**
- **6 staff members**

---

## 🔧 Customization Ideas

**Easy (30 minutes):**
1. Change colors in `css/styles.css`
2. Add your own images to `public/ebc-cake-images/`
3. Update contact information in `contact.html`
4. Modify company story in `about.html`

**Medium (1-2 hours):**
1. Add more products to `data.js`
2. Create new dashboard pages
3. Add form validation to login
4. Create a customer order form

**Advanced (3+ hours):**
1. Connect to a real backend (Python Flask, Node.js)
2. Add database (SQLite, PostgreSQL)
3. Implement real authentication
4. Add email notifications
5. Create PDF invoice generation

---

## 🐛 Troubleshooting

**Problem:** Python server won't start
**Solution:** Make sure Python is installed: `python --version`

**Problem:** Port 8000 already in use
**Solution:** Use different port: `python -m http.server 8080`

**Problem:** Images not loading
**Solution:** Check file paths in HTML match actual file locations

**Problem:** Login doesn't work
**Solution:** Make sure you're using exactly: **manager** / **password**

**Problem:** Dashboard shows "Loading..."
**Solution:** Clear browser localStorage and try again

---

## 📝 Development Rules

This project follows **simple coding standards**:

✅ **Allowed:** HTML, CSS, JavaScript, Python
❌ **Not Allowed:** React, TypeScript, Node.js frameworks, complex build tools

Keep it simple. Keep it maintainable. Keep it educational.

---

## 🎓 Learning Objectives

Perfect for learning:
- HTML structure and semantics
- CSS responsive design
- Vanilla JavaScript DOM manipulation
- Client-side data management
- Simple authentication concepts
- Web server basics

---

## 📄 License

Free for educational purposes. Modify and extend as needed for your projects.

---

## 🆘 Getting Help

1. Check browser console for errors (F12)
2. Verify Python server is running
3. Clear browser cache and localStorage
4. Check file paths are correct
5. Review `data.js` for mock data structure

---

**Built for simplicity. No complex frameworks. Just HTML, CSS, and JavaScript.**
