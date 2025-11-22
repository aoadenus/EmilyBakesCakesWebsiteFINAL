# 🎂 Emily Bakes Cakes - Quick Start Guide

## What You've Got

Your website has been **completely restructured** from PHP to pure HTML/CSS/JavaScript. 

**No XAMPP needed. No database needed. Just run it!**

---

## ⚡ Quick Start (2 Minutes)

### Step 1: Open Command Prompt in the project folder
```
cd c:\xampp\htdocs\EmilyBakesCakesWebsiteFINAL
```

### Step 2: Start the server
```
python -m http.server 8000
```

### Step 3: Open your browser
Go to: **http://localhost:8000**

**That's it!** Your website is live! 🎉

---

## 📄 Available Pages

| Page | URL | Purpose |
|------|-----|---------|
| Home | http://localhost:8000 | Landing page with hero & testimonials |
| Menu | http://localhost:8000/menu.html | All cakes, flavors, colors, decorations |
| About | http://localhost:8000/about.html | Company story |
| Contact | http://localhost:8000/contact.html | Contact info & ordering |
| Staff | http://localhost:8000/staff-login.html | Dashboard (username: admin, password: password) |

---

## 🔐 Staff Login Demo

- **URL**: http://localhost:8000/staff-login.html
- **Username**: `admin` 
- **Password**: `password`

View mock dashboard with:
- Order statistics
- Customer list
- Recent orders

---

## 📁 What's Inside

```
✅ index.html           Home page
✅ menu.html           Menu with 6 tabs
✅ about.html          About page
✅ contact.html        Contact info
✅ staff-login.html    Staff dashboard
✅ data.js             Mock data (products, orders, customers)
✅ css/styles.css      All styling
✅ js/script.js        JavaScript for menus & navigation
✅ public/ebc-cake-images/  All cake photos
✅ START_SERVER.bat    Windows server launcher
✅ HOW_TO_RUN.md       Full documentation
```

---

## 🚀 Alternative Ways to Run

### Option A: Double-click (Windows)
Just double-click **START_SERVER.bat** in the folder!

### Option B: VS Code
1. Install "Live Server" extension
2. Right-click any .html file
3. Click "Open with Live Server"

### Option C: Node.js
```bash
npm install -g http-server
http-server
```

---

## 🎨 Key Features

✨ **Fully Functional**
- 5 complete pages
- Dynamic menu tabs
- Staff dashboard with mock data
- All images included
- Mobile responsive

✨ **No Dependencies**
- Pure HTML/CSS/JavaScript
- No XAMPP
- No database
- No npm packages needed

✨ **Easy to Deploy**
- Can be hosted on GitHub Pages
- Works on Netlify, Vercel, AWS
- Or any static host

---

## 📊 Mock Data Included

- **15 Cakes** with descriptions & prices
- **6 Cake Flavors**
- **15 Filling Options**
- **27 Icing Colors** (with color swatches)
- **6 Icing Flavors**
- **30+ Decorations** (organized by type)
- **5 Sample Orders** (with all details)
- **8 Customers** (with spending history)

All stored in `data.js` - easy to modify or replace!

---

## ❓ Troubleshooting

**Q: Port 8000 is already in use?**
```bash
python -m http.server 9000
# Then go to http://localhost:9000
```

**Q: Python not found?**
- Install from https://www.python.org/
- Or use VS Code Live Server instead

**Q: Images not showing?**
- Make sure you're using http://localhost:8000
- Don't open files directly (file://)

**Q: Staff login not working?**
- Username: admin
- Password: password
- Or use any name from mockData.staff

---

## 📚 Documentation

Full guides available:
- **HOW_TO_RUN.md** - Complete setup & deployment guide
- **SETUP_HTML_VERSION.md** - Technical setup instructions

---

## 🎯 Next Steps

1. **Run it**: Start the server and explore
2. **Customize**: Edit data.js to change products/orders
3. **Deploy**: Upload to GitHub Pages or Netlify
4. **Extend**: Add more features as needed

---

## 💡 What Changed?

**Removed:**
- ❌ All PHP files
- ❌ XAMPP requirement  
- ❌ Database
- ❌ Server processing

**Added:**
- ✅ Pure HTML/CSS/JS
- ✅ Mock data system
- ✅ Staff dashboard
- ✅ START_SERVER.bat

**Kept:**
- ✅ Same design & layout
- ✅ All functionality
- ✅ All images
- ✅ Responsive design

---

## 🎂 You're Ready!

Your website is complete, restructured, and ready to go!

**Start it now:**
```bash
python -m http.server 8000
```

Then visit: **http://localhost:8000**

Happy baking! 🎉

---

For questions, see **HOW_TO_RUN.md** for detailed documentation.
