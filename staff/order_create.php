<?php
// Order creation page
$current_page = 'orders';
$page_title = 'Create Order';
include 'includes/db.php';

// Get all customers for dropdown
$customers_query = "SELECT id, first_name, last_name FROM customers ORDER BY last_name, first_name";
$customers_result = mysqli_query($conn, $customers_query);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = clean_input($_POST['customer_id']);
    $pickup_date = clean_input($_POST['pickup_date']);
    $total_amount = clean_input($_POST['total_amount']);
    $deposit_amount = clean_input($_POST['deposit_amount']);
    $status = clean_input($_POST['status']);
    $notes = clean_input($_POST['notes']);
    
    $query = "INSERT INTO orders (customer_id, pickup_date, total_amount, deposit_amount, status, notes, created_at) 
              VALUES ($customer_id, '$pickup_date', $total_amount, $deposit_amount, '$status', '$notes', NOW())";
    
    if (mysqli_query($conn, $query)) {
        $order_id = mysqli_insert_id($conn);
        header("Location: order_details.php?id=$order_id");
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}

include 'includes/header.php';
?>

<div class="row">
    <div class="col-md-8">
        <h2>Create New Order</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="orders.php" class="btn btn-secondary">Back to Orders</a>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Order Information
            </div>
            <div class="card-body">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="customer_id" class="form-label">Customer *</label>
                        <select class="form-select" id="customer_id" name="customer_id" required>
                            <option value="">Select a customer...</option>
                            <?php while ($customer = mysqli_fetch_assoc($customers_result)): ?>
                                <option value="<?php echo $customer['id']; ?>">
                                    <?php echo $customer['first_name'] . ' ' . $customer['last_name']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                        <small class="text-muted">
                            Don't see the customer? <a href="customer_form.php" target="_blank">Add New Customer</a>
                        </small>
                    </div>

                    <div class="mb-3">
                        <label for="pickup_date" class="form-label">Pickup Date *</label>
                        <input type="date" class="form-control" id="pickup_date" name="pickup_date" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="total_amount" class="form-label">Total Amount *</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="0.01" class="form-control" id="total_amount" name="total_amount" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="deposit_amount" class="form-label">Deposit Amount</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="0.01" class="form-control" id="deposit_amount" name="deposit_amount" value="0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status *</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">Order Notes</label>
                        <textarea class="form-control" id="notes" name="notes" rows="4" placeholder="Cake flavors, decorations, special instructions..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Order</button>
                    <a href="orders.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
