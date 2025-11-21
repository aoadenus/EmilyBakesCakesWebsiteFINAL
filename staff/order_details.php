<?php
// Order details page
$current_page = 'orders';
$page_title = 'Order Details';
include 'includes/db.php';

// Get order ID
if (!isset($_GET['id'])) {
    header('Location: orders.php');
    exit();
}

$order_id = clean_input($_GET['id']);

// Get order details
$query = "SELECT o.*, c.first_name, c.last_name, c.email, c.phone 
          FROM orders o 
          LEFT JOIN customers c ON o.customer_id = c.id 
          WHERE o.id = $order_id";
$result = mysqli_query($conn, $query);
$order = mysqli_fetch_assoc($result);

if (!$order) {
    header('Location: orders.php');
    exit();
}

// Handle status update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $new_status = clean_input($_POST['status']);
    $update_query = "UPDATE orders SET status = '$new_status' WHERE id = $order_id";
    if (mysqli_query($conn, $update_query)) {
        header("Location: order_details.php?id=$order_id");
        exit();
    }
}

include 'includes/header.php';
?>

<div class="row">
    <div class="col-md-6">
        <h2>Order #<?php echo $order['id']; ?></h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="orders.php" class="btn btn-secondary">Back to Orders</a>
    </div>
</div>

<div class="row mt-4">
    <!-- Order Information -->
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                Order Information
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Order ID:</strong> #<?php echo $order['id']; ?>
                    </div>
                    <div class="col-md-6">
                        <strong>Status:</strong>
                        <span class="badge bg-<?php 
                            echo $order['status'] == 'completed' ? 'success' : 
                                ($order['status'] == 'pending' ? 'warning' : 
                                ($order['status'] == 'in_progress' ? 'info' : 'secondary')); 
                        ?>">
                            <?php echo ucfirst(str_replace('_', ' ', $order['status'])); ?>
                        </span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Pickup Date:</strong> <?php echo format_date($order['pickup_date']); ?>
                    </div>
                    <div class="col-md-6">
                        <strong>Created:</strong> <?php echo format_date($order['created_at']); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Total Amount:</strong> <?php echo format_money($order['total_amount']); ?>
                    </div>
                    <div class="col-md-6">
                        <strong>Deposit:</strong> <?php echo format_money($order['deposit_amount']); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <strong>Order Notes:</strong>
                        <p><?php echo nl2br($order['notes']); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Status -->
        <div class="card">
            <div class="card-header">
                Update Order Status
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="row">
                        <div class="col-md-8">
                            <select class="form-select" name="status" required>
                                <option value="pending" <?php echo $order['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                <option value="in_progress" <?php echo $order['status'] == 'in_progress' ? 'selected' : ''; ?>>In Progress</option>
                                <option value="completed" <?php echo $order['status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
                                <option value="cancelled" <?php echo $order['status'] == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" name="update_status" class="btn btn-primary w-100">Update Status</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Customer Information -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Customer Information
            </div>
            <div class="card-body">
                <p><strong>Name:</strong><br><?php echo $order['first_name'] . ' ' . $order['last_name']; ?></p>
                <p><strong>Email:</strong><br><?php echo $order['email']; ?></p>
                <p><strong>Phone:</strong><br><?php echo $order['phone']; ?></p>
                <a href="customer_form.php?id=<?php echo $order['customer_id']; ?>" class="btn btn-sm btn-primary">View Customer</a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
