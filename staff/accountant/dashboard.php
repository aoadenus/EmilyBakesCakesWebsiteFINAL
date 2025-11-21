<?php
require_once '../includes/auth.php';
require_once '../includes/header.php';

$revenue_today = 450.00;
$revenue_week = 3200.00;
$revenue_month = 12800.00;
$unpaid_balances = 240.00;
?>

<div class="row">
    <div class="col-12">
        <h2 class="mb-4"><i class="bi bi-calculator"></i> Accountant Dashboard</h2>
        <p class="lead">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>! Here's your financial overview.</p>
    </div>
</div>

<!-- KPI Cards -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-label">Revenue Today</div>
                <div class="stat-value">$<?php echo number_format($revenue_today, 2); ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-label">Revenue This Week</div>
                <div class="stat-value">$<?php echo number_format($revenue_week, 2); ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-label">Revenue This Month</div>
                <div class="stat-value">$<?php echo number_format($revenue_month, 2); ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-label">Unpaid Balances</div>
                <div class="stat-value">$<?php echo number_format($unpaid_balances, 2); ?></div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-bar-chart"></i> Monthly Revenue Overview
            </div>
            <div class="card-body text-center py-5">
                <i class="bi bi-bar-chart-line" style="font-size: 4rem; color: var(--primary-pink);"></i>
                <p class="mt-3 text-muted">Chart visualization would appear here<br>(Sample data for presentation)</p>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pie-chart"></i> Product Revenue
            </div>
            <div class="card-body text-center py-5">
                <i class="bi bi-pie-chart-fill" style="font-size: 4rem; color: var(--primary-pink);"></i>
                <p class="mt-3 text-muted">Product breakdown<br>(Sample data)</p>
            </div>
        </div>
    </div>
</div>

<!-- Reports Section -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-file-earmark-text"></i> Quick Reports
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <button class="btn btn-outline-primary w-100 py-3">
                            <i class="bi bi-graph-up"></i><br>
                            Customer Spending Report
                        </button>
                    </div>
                    <div class="col-md-4 mb-3">
                        <button class="btn btn-outline-primary w-100 py-3">
                            <i class="bi bi-calendar3"></i><br>
                            Orders by Month
                        </button>
                    </div>
                    <div class="col-md-4 mb-3">
                        <button class="btn btn-outline-primary w-100 py-3">
                            <i class="bi bi-download"></i><br>
                            Export Revenue CSV
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
