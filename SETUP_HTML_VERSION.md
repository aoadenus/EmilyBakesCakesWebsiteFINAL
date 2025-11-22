# Emily Bakes Cakes - HTML/CSS/JavaScript Version

This is a pure HTML, CSS, and JavaScript version of the Emily Bakes Cakes website that runs entirely on localhost without requiring XAMPP or any server-side processing.

## Project Structure

```
EmilyBakesCakesWebsiteFINAL/
├── index.html              # Home page
├── menu.html              # Menu with cakes, flavors, fillings, colors, decorations
├── about.html             # About page
├── contact.html           # Contact information
├── staff-login.html       # Staff dashboard with login
├── data.js                # Mock data (orders, customers, products, etc.)
├── css/
│   └── styles.css         # All styling
├── js/
│   └── script.js          # JavaScript functionality
├── public/
│   └── ebc-cake-images/   # Cake images
└── README.md              # This file
```

## Features

### Public Pages
- **Home** - Hero section with testimonials and features
- **Menu** - Dynamic menu tabs showing:
  - Standard Cakes with prices and images
  - Cake Flavors
  - Fillings
  - Icing Colors (with color swatches)
  - Icing Flavors
  - Decorations by category
- **About** - Company history and mission
- **Contact** - Contact information and ordering process

### Staff Dashboard
- **Login** - Staff login with demo credentials
- **Dashboard** - Shows:
  - Order statistics
  - Recent orders table
  - Customer list
  - Mock data from `data.js`

## How to Run

### Option 1: Use Python's Built-in Server (Recommended)

```bash
# Navigate to the project directory
cd c:\xampp\htdocs\EmilyBakesCakesWebsiteFINAL

# Start the server (Python 3)
python -m http.server 8000

# Or for Python 2:
python -m SimpleHTTPServer 8000

# Access in browser:
http://localhost:8000
```

### Option 2: Use Node.js

```bash
# Install http-server globally (if not already installed)
npm install -g http-server

# Navigate to project directory
cd c:\xampp\htdocs\EmilyBakesCakesWebsiteFINAL

# Start the server
http-server

# Access in browser:
http://localhost:8080
```

### Option 3: Use Live Server in VS Code

Install the "Live Server" extension and click "Go Live" - it will automatically open the site.

### Option 4: Run with PowerShell

```powershell
# Navigate to project directory
cd c:\xampp\htdocs\EmilyBakesCakesWebsiteFINAL

# Start a simple server using PowerShell
$listener = New-Object System.Net.HttpListener
$listener.Prefixes.Add("http://localhost:8000/")
$listener.Start()
Write-Host "Server running at http://localhost:8000"
while ($listener.IsListening) {
    $context = $listener.GetContext()
    # Handle request...
}
```

## Staff Login Demo

- **URL**: `http://localhost:8000/staff-login.html`
- **Username**: `admin` (or any staff name from the mock data)
- **Password**: `password`

The dashboard shows mock data including:
- 5 orders with details
- 8 customers
- Revenue statistics

## Mock Data

All mock data is stored in `data.js` and includes:
- 15 standard cakes with descriptions and prices
- 6 cake flavors
- 15 filling options
- Multiple icing colors by category (primary, pastel, neon, fall, additional)
- 6 icing flavors
- Decorations organized by category
- 5 mock orders with full details
- 8 mock customers
- 6 mock staff members
- Business information

## Technology Stack

- **HTML5** - Semantic markup
- **CSS3** - Responsive design with flexbox and grid
- **Vanilla JavaScript** - No dependencies
- **Google Fonts** - Playfair Display, Poppins, Open Sans

## Mobile Responsive

The site is fully responsive with mobile menu toggle for screens under 1024px width.

## Navigation

All links use `.html` extensions and work across all pages:
- Home: `index.html`
- Menu: `menu.html`
- About: `about.html`
- Contact: `contact.html`
- Staff Login: `staff-login.html`

## Color Scheme

- **Primary**: #C44569 (Raspberry Pink)
- **Background**: #F8EBD7 (Cream)
- **Text**: #2B2B2B (Charcoal)
- **Accent**: #5A3825 (Brown)

## No External Dependencies

- No database required
- No backend processing
- No XAMPP or server software needed
- All data is stored in JavaScript objects
- Fully functional on any local server

## Future Enhancements

To add persistence, you could:
1. Use `localStorage` to save customer orders
2. Integrate with a backend API
3. Add a real payment processor
4. Connect to a database for staff management

---

**Created**: 2025  
**Purpose**: Custom cake shop website without server-side requirements
