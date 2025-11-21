<?php
// Reports page
$current_page = 'reports';
$page_title = 'Reports';
include 'includes/db.php';

// Get report data
$total_customers = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM customers"))['count'];
$total_orders = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM orders"))['count'];
$completed_orders = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM orders WHERE status = 'completed'"))['count'];
$pending_orders = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM orders WHERE status = 'pending'"))['count'];
$total_revenue = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_amount) as total FROM orders WHERE status = 'completed'"))['total'] ?? 0;

// Get customer list for customer report
$customers_query = "SELECT c.*, COUNT(o.id) as order_count 
                    FROM customers c 
                    LEFT JOIN orders o ON c.id = o.customer_id 
                    GROUP BY c.id 
                    ORDER BY order_count DESC 
                    LIMIT 10";
$customers_result = mysqli_query($conn, $customers_query);

// Get recent orders for order report
$orders_query = "SELECT o.*, c.first_name, c.last_name 
                 FROM orders o 
                 LEFT JOIN customers c ON o.customer_id = c.id 
                 ORDER BY o.created_at DESC 
                 LIMIT 10";
$orders_result = mysqli_query($conn, $orders_query);

include 'includes/header.php';
?>

<div class="row">
    <div class="col-12">
        <h2>Reports</h2>
        <p class="text-muted">Business analytics and reporting</p>
    </div>
</div>

<!-- Summary Stats -->
<div class="row mt-4">
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body text-center">
                <h6 class="text-muted">Total Customers</h6>
                <h2><?php echo $total_customers; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body text-center">
                <h6 class="text-muted">Total Orders</h6>
                <h2><?php echo $total_orders; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body text-center">
                <h6 class="text-muted">Completed Orders</h6>
                <h2><?php echo $completed_orders; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body text-center">
                <h6 class="text-muted">Total Revenue</h6>
                <h2><?php echo format_money($total_revenue); ?></h2>
            </div>
        </div>
    </div>
</div>

<!-- Customer Report -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Top Customers by Order Count
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Total Orders</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($customer = mysqli_fetch_assoc($customers_result)): ?>
                            <tr>
                                <td><?php echo $customer['first_name'] . ' ' . $customer['last_name']; ?></td>
                                <td><?php echo $customer['email']; ?></td>
                                <td><?php echo $customer['phone']; ?></td>
                                <td><span class="badge bg-primary"><?php echo $customer['order_count']; ?></span></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Order Report -->
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
                            <th>Pickup Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($order = mysqli_fetch_assoc($orders_result)): ?>
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
                                <td><?php echo format_date($order['pickup_date']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Order Status Breakdown -->
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Order Status Breakdown
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Pending
                        <span class="badge bg-warning rounded-pill"><?php echo $pending_orders; ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Completed
                        <span class="badge bg-success rounded-pill"><?php echo $completed_orders; ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Orders
                        <span class="badge bg-primary rounded-pill"><?php echo $total_orders; ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Revenue Summary
            </div>
            <div class="card-body">
                <h3 class="text-center" style="color: #C44569;">
                    <?php echo format_money($total_revenue); ?>
                </h3>
                <p class="text-center text-muted">Total Revenue from Completed Orders</p>
                <?php if ($completed_orders > 0): ?>
                    <p class="text-center">
                        <strong>Average Order Value:</strong>
                        <?php echo format_money($total_revenue / $completed_orders); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
