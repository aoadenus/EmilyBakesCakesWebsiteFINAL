<?php
session_start();
require_once 'includes/auth.php';

// Require user to be logged in
requireLogin();

$pageTitle = 'Dashboard';
$userRole = getUserRole();

include 'includes/header.php';
?>

<div class="row mb-4">
    <div class="col-12">
        <div class="card" style="border-radius: 10px; border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <div class="card-body" style="background: linear-gradient(135deg, #d4639f 0%, #c04d88 100%); color: white; border-radius: 10px;">
                <h2>Welcome, <?php echo htmlspecialchars($userRole); ?>!</h2>
                <p class="mb-0">Here's your dashboard overview</p>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-center" style="border-radius: 10px; border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
            <div class="card-body">
                <h5 style="color: #d4639f;">Orders Today</h5>
                <h2 style="color: #8b6f47;">12</h2>
                <p class="text-muted mb-0" style="font-size: 14px;">[placeholder]</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center" style="border-radius: 10px; border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
            <div class="card-body">
                <h5 style="color: #d4639f;">Pending Orders</h5>
                <h2 style="color: #8b6f47;">5</h2>
                <p class="text-muted mb-0" style="font-size: 14px;">[placeholder]</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center" style="border-radius: 10px; border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
            <div class="card-body">
                <h5 style="color: #d4639f;">Total Customers</h5>
                <h2 style="color: #8b6f47;">48</h2>
                <p class="text-muted mb-0" style="font-size: 14px;">[placeholder]</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center" style="border-radius: 10px; border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
            <div class="card-body">
                <h5 style="color: #d4639f;">Revenue Today</h5>
                <h2 style="color: #8b6f47;">$420</h2>
                <p class="text-muted mb-0" style="font-size: 14px;">[placeholder]</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card" style="border-radius: 10px; border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <div class="card-body">
                <h4 class="mb-4" style="color: #8b6f47;">Quick Actions</h4>
                <div class="row g-3">
                    <div class="col-md-4">
                        <a href="create-order.php" class="btn btn-lg w-100" style="background-color: #d4639f; color: white; border-radius: 8px; border: none;">
                            📝 Create New Order
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="orders.php?filter=today" class="btn btn-lg w-100" style="background-color: #8b6f47; color: white; border-radius: 8px; border: none;">
                            📦 Today's Orders
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="customers.php" class="btn btn-lg w-100" style="background-color: #d4a373; color: white; border-radius: 8px; border: none;">
                            👥 View Customers
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="products.php" class="btn btn-lg w-100" style="background-color: #ffa69e; color: white; border-radius: 8px; border: none;">
                            🎂 View Products
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="reports.php" class="btn btn-lg w-100" style="background-color: #aa6f73; color: white; border-radius: 8px; border: none;">
                            📊 Reports
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="settings.php" class="btn btn-lg w-100" style="background-color: #b08968; color: white; border-radius: 8px; border: none;">
                            ⚙️ Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
