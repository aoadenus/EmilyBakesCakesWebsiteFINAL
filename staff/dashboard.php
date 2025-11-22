<?php
/**
 * Emily Bakes Cakes - Staff Dashboard
 * Main portal for authenticated staff members
 */

session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard - Emily Bakes Cakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Poppins:wght@500;600;700&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-pink: #C44569;
            --secondary-cream: #F8EBD7;
            --accent-dark: #2B2B2B;
        }

        body {
            background: linear-gradient(135deg, var(--secondary-cream) 0%, #e8d4bf 100%);
            font-family: 'Open Sans', sans-serif;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-pink) 0%, #a63857 100%);
            box-shadow: 0 4px 12px rgba(196, 69, 105, 0.15);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: white !important;
        }

        .navbar .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-left: 10px;
        }

        .navbar .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }

        .logout-btn {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white !important;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: all 0.3s ease;
            margin-left: 10px;
            text-decoration: none;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .welcome-section {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(196, 69, 105, 0.1);
            padding: 40px;
            margin: 40px 0;
            border-left: 5px solid var(--primary-pink);
        }

        .welcome-section h1 {
            font-family: 'Playfair Display', serif;
            color: var(--accent-dark);
            margin-bottom: 10px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin: 40px 0;
        }

        .dashboard-card {
            background: white;
            border-radius: 12px;
            padding: 30px 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(196, 69, 105, 0.08);
            transition: all 0.3s ease;
            border-top: 4px solid var(--primary-pink);
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(196, 69, 105, 0.15);
        }

        .card-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .card-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: var(--accent-dark);
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .card-link {
            display: inline-block;
            background: var(--primary-pink);
            color: white;
            padding: 8px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .card-link:hover {
            background: #a63857;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(196, 69, 105, 0.3);
            color: white;
        }

        .role-badge {
            display: inline-block;
            background: var(--primary-pink);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: capitalize;
        }

        .container-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .footer-link {
            text-align: center;
            margin: 40px 0;
            padding: 20px;
        }

        .footer-link a {
            color: var(--primary-pink);
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .footer-link a:hover {
            color: #a63857;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">🧁 Emily Bakes Cakes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">← Back to Website</a>
                    </li>
                    <li class="nav-item">
                        <a class="logout-btn" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-wrapper">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Staff Member'); ?>! 👋</h1>
            <p style="color: #666; margin-bottom: 0;">You have successfully logged into the Emily Bakes Cakes Staff Portal</p>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 20px;">
                <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; border-left: 3px solid var(--primary-pink);">
                    <div style="font-family: 'Poppins', sans-serif; font-weight: 600; color: var(--primary-pink); font-size: 0.85rem; text-transform: uppercase; margin-bottom: 5px;">Email Address</div>
                    <div style="font-size: 1.1rem; color: var(--accent-dark); font-weight: 500;"><?php echo htmlspecialchars($_SESSION['user_email'] ?? ''); ?></div>
                </div>
                <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; border-left: 3px solid var(--primary-pink);">
                    <div style="font-family: 'Poppins', sans-serif; font-weight: 600; color: var(--primary-pink); font-size: 0.85rem; text-transform: uppercase; margin-bottom: 5px;">Staff Role</div>
                    <div><span class="role-badge"><?php echo htmlspecialchars($_SESSION['user_role'] ?? 'unknown'); ?></span></div>
                </div>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="dashboard-grid">
            <div class="dashboard-card">
                <div class="card-icon">📋</div>
                <div class="card-title">Orders Management</div>
                <div style="color: #666; font-size: 0.9rem; margin-bottom: 15px;">View, create, and manage custom cake orders</div>
                <a href="orders.php" class="card-link">View Orders</a>
            </div>

            <div class="dashboard-card">
                <div class="card-icon">👥</div>
                <div class="card-title">Customers</div>
                <div style="color: #666; font-size: 0.9rem; margin-bottom: 15px;">Manage customer information and history</div>
                <a href="customers.php" class="card-link">View Customers</a>
            </div>

            <div class="dashboard-card">
                <div class="card-icon">🎂</div>
                <div class="card-title">Products</div>
                <div style="color: #666; font-size: 0.9rem; margin-bottom: 15px;">Browse and manage product catalog</div>
                <a href="products.php" class="card-link">View Products</a>
            </div>

            <div class="dashboard-card">
                <div class="card-icon">📊</div>
                <div class="card-title">Reports</div>
                <div style="color: #666; font-size: 0.9rem; margin-bottom: 15px;">View business analytics and statistics</div>
                <a href="reports.php" class="card-link">View Reports</a>
            </div>
        </div>

        <!-- Help Section -->
        <div style="background: #e7f3ff; padding: 20px; border-radius: 12px; margin: 30px 0; border-left: 4px solid #2196F3;">
            <h4 style="font-family: 'Poppins', sans-serif; color: #1565c0; margin-bottom: 10px;">💡 Need Help?</h4>
            <p style="color: #1565c0; margin: 0;">You are now connected to the Staff Portal! All your tools are accessible from the cards above.</p>
        </div>

        <!-- Back to Website -->
        <div class="footer-link">
            <p>Want to view the customer website?</p>
            <a href="../index.php">← Back to Emily Bakes Cakes Website</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php include 'includes/footer.php'; ?>
