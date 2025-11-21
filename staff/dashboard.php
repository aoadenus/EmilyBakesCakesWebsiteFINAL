<?php
// Dashboard page
$current_page = 'dashboard';
$page_title = 'Dashboard';
include 'includes/db.php';

// Get quick stats
$total_customers_query = "SELECT COUNT(*) as count FROM customers";
$total_orders_query = "SELECT COUNT(*) as count FROM orders";
$pending_orders_query = "SELECT COUNT(*) as count FROM orders WHERE status = 'pending'";
$revenue_query = "SELECT SUM(total_amount) as total FROM orders WHERE status = 'completed'";

$total_customers = mysqli_fetch_assoc(mysqli_query($conn, $total_customers_query))['count'] ?? 0;
$total_orders = mysqli_fetch_assoc(mysqli_query($conn, $total_orders_query))['count'] ?? 0;
$pending_orders = mysqli_fetch_assoc(mysqli_query($conn, $pending_orders_query))['count'] ?? 0;
$total_revenue = mysqli_fetch_assoc(mysqli_query($conn, $revenue_query))['total'] ?? 0;

// Get recent orders
$recent_orders_query = "SELECT o.*, c.first_name, c.last_name 
                        FROM orders o 
                        LEFT JOIN customers c ON o.customer_id = c.id 
                        ORDER BY o.created_at DESC LIMIT 5";
$recent_orders_result = mysqli_query($conn, $recent_orders_query);

include 'includes/header.php';
?>

<div class="row">
    <div class="col-12">
        <h2>Dashboard</h2>
        <p class="text-muted">Welcome to the Emily Bakes Cakes Staff Portal</p>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mt-4">
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <h6 class="text-muted">Total Customers</h6>
                <h2><?php echo $total_customers; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <h6 class="text-muted">Total Orders</h6>
                <h2><?php echo $total_orders; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <h6 class="text-muted">Pending Orders</h6>
                <h2><?php echo $pending_orders; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <h6 class="text-muted">Total Revenue</h6>
                <h2><?php echo format_money($total_revenue); ?></h2>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Recent Orders
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($recent_orders_result) > 0): ?>
                            <?php while ($order = mysqli_fetch_assoc($recent_orders_result)): ?>
                                <tr>
                                    <td>#<?php echo $order['id']; ?></td>
                                    <td><?php echo $order['first_name'] . ' ' . $order['last_name']; ?></td>
                                    <td>
                                        <span class="badge bg-<?php 
                                            echo $order['status'] == 'completed' ? 'success' : 
                                                ($order['status'] == 'pending' ? 'warning' : 'info'); 
                                        ?>">
                                            <?php echo ucfirst($order['status']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo format_money($order['total_amount']); ?></td>
                                    <td><?php echo format_date($order['created_at']); ?></td>
                                    <td>
                                        <a href="order_details.php?id=<?php echo $order['id']; ?>" class="btn btn-sm btn-primary">View</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No orders found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Quick Links -->
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h5>New Order</h5>
                <p class="text-muted">Create a new customer order</p>
                <a href="order_create.php" class="btn btn-primary">Create Order</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h5>View Customers</h5>
                <p class="text-muted">Manage customer information</p>
                <a href="customers.php" class="btn btn-primary">View Customers</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h5>Reports</h5>
                <p class="text-muted">View business reports</p>
                <a href="reports.php" class="btn btn-primary">View Reports</a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
