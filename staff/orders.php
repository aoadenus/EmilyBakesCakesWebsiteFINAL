<?php
// Orders page
$current_page = 'orders';
$page_title = 'Orders';
include 'includes/db.php';

// Handle status filter
$status_filter = isset($_GET['status']) ? clean_input($_GET['status']) : 'all';
$where_clause = '';
if ($status_filter != 'all') {
    $where_clause = "WHERE o.status = '$status_filter'";
}

// Get orders
$query = "SELECT o.*, c.first_name, c.last_name 
          FROM orders o 
          LEFT JOIN customers c ON o.customer_id = c.id 
          $where_clause
          ORDER BY o.created_at DESC";
$result = mysqli_query($conn, $query);

include 'includes/header.php';
?>

<div class="row">
    <div class="col-md-6">
        <h2>Orders</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="order_create.php" class="btn btn-primary">Create New Order</a>
    </div>
</div>

<!-- Filter Bar -->
<div class="row mt-3">
    <div class="col-md-12">
        <div class="btn-group" role="group">
            <a href="orders.php?status=all" class="btn btn-<?php echo $status_filter == 'all' ? 'primary' : 'outline-primary'; ?>">
                All
            </a>
            <a href="orders.php?status=pending" class="btn btn-<?php echo $status_filter == 'pending' ? 'warning' : 'outline-warning'; ?>">
                Pending
            </a>
            <a href="orders.php?status=in_progress" class="btn btn-<?php echo $status_filter == 'in_progress' ? 'info' : 'outline-info'; ?>">
                In Progress
            </a>
            <a href="orders.php?status=completed" class="btn btn-<?php echo $status_filter == 'completed' ? 'success' : 'outline-success'; ?>">
                Completed
            </a>
            <a href="orders.php?status=cancelled" class="btn btn-<?php echo $status_filter == 'cancelled' ? 'secondary' : 'outline-secondary'; ?>">
                Cancelled
            </a>
        </div>
    </div>
</div>

<!-- Orders Table -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Order List (<?php echo mysqli_num_rows($result); ?> orders)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Total Amount</th>
                                <th>Pickup Date</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($result) > 0): ?>
                                <?php while ($order = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td>#<?php echo $order['id']; ?></td>
                                        <td><?php echo $order['first_name'] . ' ' . $order['last_name']; ?></td>
                                        <td>
                                            <span class="badge bg-<?php 
                                                echo $order['status'] == 'completed' ? 'success' : 
                                                    ($order['status'] == 'pending' ? 'warning' : 
                                                    ($order['status'] == 'in_progress' ? 'info' : 'secondary')); 
                                            ?>">
                                                <?php echo ucfirst(str_replace('_', ' ', $order['status'])); ?>
                                            </span>
                                        </td>
                                        <td><?php echo format_money($order['total_amount']); ?></td>
                                        <td><?php echo format_date($order['pickup_date']); ?></td>
                                        <td><?php echo format_date($order['created_at']); ?></td>
                                        <td>
                                            <a href="order_details.php?id=<?php echo $order['id']; ?>" class="btn btn-sm btn-primary">View</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">No orders found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
