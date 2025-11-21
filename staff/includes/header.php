<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Staff Dashboard'; ?> - Emily Bakes Cakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Added Bootstrap Icons and Google Fonts for new branding -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Poppins:wght@500;600;700&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo SITE_URL ?? '/staff/'; ?>css/login.css">
    <style>
        /* Updated CSS variables to new Emily Bakes Cakes brand colors */
        :root {
            --primary-pink: #C44569;
            --secondary-cream: #F8EBD7;
            --accent-gold: #d4af37;
            --text-dark: #2B2B2B;
            --text-muted: #5A3825;
        }
        
        body {
            background: #F8EBD7;
            min-height: 100vh;
            font-family: 'Open Sans', sans-serif;
        }
        
        .navbar {
            background: #C44569 !important;
            box-shadow: 0 2px 8px rgba(43, 43, 43, 0.15);
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif !important;
            font-weight: 700 !important;
            color: white !important;
            font-size: 1.5rem;
        }
        
        .nav-link {
            font-family: 'Poppins', sans-serif;
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }
        
        .content-wrapper {
            padding: 2rem 0;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(43, 43, 43, 0.08);
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 6px 20px rgba(196, 69, 105, 0.15);
            transform: translateY(-2px);
        }
        
        .card-header {
            background: #C44569;
            color: white;
            border-radius: 15px 15px 0 0 !important;
            font-family: 'Poppins', serif;
            font-weight: 600;
            padding: 1rem 1.5rem;
        }
        
        .btn-primary {
            font-family: 'Poppins', sans-serif;
            background: #C44569;
            border: none;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background: #A63857;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(196, 69, 105, 0.4);
        }
        
        .stat-card {
            border-left: 4px solid #C44569;
        }
        
        .stat-value {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #C44569;
        }
        
        .stat-label {
            font-family: 'Poppins', sans-serif;
            color: var(--text-muted);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .table {
            font-family: 'Open Sans', sans-serif;
            background: white;
        }
        
        .table thead {
            font-family: 'Poppins', sans-serif;
            background-color: #FAF5F0;
        }
        
        .badge-status {
            font-family: 'Poppins', sans-serif;
            padding: 0.5rem 1rem;
            font-weight: 600;
        }
        
        .quick-action-btn {
            font-family: 'Poppins', sans-serif;
            width: 100%;
            padding: 1.5rem;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            color: #2B2B2B;
        }
    </style>
</head>
<body>
    <!-- Updated navbar with new brand styling and improved user display -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="bi bi-cake2-fill"></i> Emily Bakes Cakes
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="nav-link">
                            <i class="bi bi-person-circle"></i> 
                            <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'User'); ?>
                            <span class="badge bg-light text-dark ms-2" style="font-weight: 600;">
                                <?php echo ucfirst($_SESSION['user_role'] ?? ''); ?>
                            </span>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid content-wrapper">
