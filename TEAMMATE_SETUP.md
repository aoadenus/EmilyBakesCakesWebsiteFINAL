# Emily Bakes Cakes - Quick Setup Guide for Teammates

## What You Need to Know

This is a **pure HTML/CSS/JavaScript website** - no fancy frameworks needed. Just open it in a web browser!

---

## How to Run the Website

### **Option 1: Click the BAT File (Easiest) ⭐**

1. Open the project folder
2. **Double-click** `START_SERVER.bat`
3. A command window will open
4. Open your browser and go to: **http://localhost:8000**

That's it! The website is now running.

---

### **Option 2: Use PowerShell (If BAT doesn't work)**

1. Open PowerShell
2. Navigate to the project folder:
   ```powershell
   cd C:\xampp\htdocs\EmilyBakesCakesWebsiteFINAL
   ```
3. Run this command:
   ```powershell
   python -m http.server 8000
   ```
4. Open your browser and go to: **http://localhost:8000**

---

## Access the Website

### **On Your Computer**
- Go to: `http://localhost:8000`

### **From Another Computer on the Network**
- Find your computer's IP address (ask IT or use Windows settings)
- Go to: `http://[YOUR_IP]:8000`
- Example: `http://192.168.152.1:8000`

---

## Pages Available

- **Home:** http://localhost:8000
- **Menu:** http://localhost:8000/menu.html
- **About:** http://localhost:8000/about.html
- **Contact:** http://localhost:8000/contact.html
- **Staff Login:** http://localhost:8000/staff-login.html

**Demo Credentials:** Email: `baker@emilybakes.com` | Password: `test`
(Click "Demo Credentials" dropdown on login page to see all 5 roles)

---

## What NOT to Do ❌

- Don't run `npm install`
- Don't run `npm start`
- Don't look for a Next.js or React app
- Don't try to use port 3000

---

## Troubleshooting

### "Port 8000 is already in use"
- Close any other programs using port 8000
- Or kill existing Python processes:
  ```powershell
  Get-Process | Where-Object {$_.ProcessName -eq "python"} | Stop-Process -Force
  ```

### "Python command not found"
- Make sure Python is installed
- Or use the `START_SERVER.bat` file instead

### "Website won't load"
- Make sure the server is running (you should see a message in the command window)
- Check you're using `localhost:8000`, not `localhost:3000`
- Try refreshing the page (Ctrl+F5)

---

## Questions?

Ask your team lead - they have the full documentation!
