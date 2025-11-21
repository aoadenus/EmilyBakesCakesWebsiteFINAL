<?php
require_once '../includes/auth.php';
require_once '../includes/header.php';

$orders_today = 8;
$orders_week = 42;
$revenue_month = 12800.00;
$active_customers = 127;
$active_staff = 6;
?>

<div class="row">
    <div class="col-12">
        <h2 class="mb-4"><i class="bi bi-speedometer2"></i> Manager Dashboard</h2>
        <p class="lead">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>! Here's your business overview.</p>
    </div>
</div>

<!-- KPI Cards -->
<div class="row mb-4">
    <div class="col-md-2">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-label">Orders Today</div>
                <div class="stat-value"><?php echo $orders_today; ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-label">Orders This Week</div>
                <div class="stat-value"><?php echo $orders_week; ?></div>
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
    <div class="col-md-2">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-label">Active Customers</div>
                <div class="stat-value"><?php echo $active_customers; ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-label">Active Staff</div>
                <div class="stat-value"><?php echo $active_staff; ?></div>
            </div>
        </div>
    </div>
</div>

<!-- Management Sections -->
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <i class="bi bi-people"></i> Staff Management
            </div>
            <div class="card-body">
                <p>Manage staff members and their roles.</p>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStaffModal">
                        <i class="bi bi-person-plus"></i> Add Staff Member
                    </button>
                    <button class="btn btn-outline-primary">
                        <i class="bi bi-list"></i> View All Staff
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <i class="bi bi-box-seam"></i> Product Management
            </div>
            <div class="card-body">
                <p>Manage products, flavors, and pricing.</p>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Add Product
                    </button>
                    <button class="btn btn-outline-primary">
                        <i class="bi bi-list"></i> View All Products
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <i class="bi bi-graph-up"></i> Reports & Analytics
            </div>
            <div class="card-body">
                <p>View business reports and analytics.</p>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary">
                        <i class="bi bi-file-earmark-bar-graph"></i> Sales Reports
                    </button>
                    <button class="btn btn-outline-primary">
                        <i class="bi bi-pie-chart"></i> Product Analytics
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Access -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-lightning"></i> Quick Access
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <a href="../sales/orders.php" class="btn btn-outline-primary w-100">
                            <i class="bi bi-bag-check"></i> View All Orders
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="../sales/customers.php" class="btn btn-outline-primary w-100">
                            <i class="bi bi-people"></i> View All Customers
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="../sales/new_order.php" class="btn btn-outline-primary w-100">
                            <i class="bi bi-plus-circle"></i> Create New Order
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <button class="btn btn-outline-primary w-100">
                            <i class="bi bi-gear"></i> System Settings
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Staff Modal -->
<div class="modal fade" id="addStaffModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: var(--primary-pink); color: white;">
                <h5 class="modal-title">Add Staff Member</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select class="form-select">
                            <option>Manager</option>
                            <option>Sales Staff</option>
                            <option>Baker</option>
                            <option>Decorator</option>
                            <option>Accountant</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Staff Member</button>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
