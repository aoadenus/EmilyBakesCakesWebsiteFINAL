<?php
// Customer form (add/edit)
$current_page = 'customers';
$page_title = 'Customer Form';
include 'includes/db.php';

$edit_mode = false;
$customer = null;

// Check if editing
if (isset($_GET['id'])) {
    $edit_mode = true;
    $customer_id = clean_input($_GET['id']);
    $query = "SELECT * FROM customers WHERE id = $customer_id";
    $result = mysqli_query($conn, $query);
    $customer = mysqli_fetch_assoc($result);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = clean_input($_POST['first_name']);
    $last_name = clean_input($_POST['last_name']);
    $email = clean_input($_POST['email']);
    $phone = clean_input($_POST['phone']);
    $address = clean_input($_POST['address']);
    
    if ($edit_mode) {
        // Update existing customer
        $customer_id = clean_input($_POST['customer_id']);
        $query = "UPDATE customers SET 
                  first_name = '$first_name',
                  last_name = '$last_name',
                  email = '$email',
                  phone = '$phone',
                  address = '$address'
                  WHERE id = $customer_id";
    } else {
        // Insert new customer
        $query = "INSERT INTO customers (first_name, last_name, email, phone, address, created_at) 
                  VALUES ('$first_name', '$last_name', '$email', '$phone', '$address', NOW())";
    }
    
    if (mysqli_query($conn, $query)) {
        header('Location: customers.php');
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}

include 'includes/header.php';
?>

<div class="row">
    <div class="col-md-8">
        <h2><?php echo $edit_mode ? 'Edit Customer' : 'Add New Customer'; ?></h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="customers.php" class="btn btn-secondary">Back to Customers</a>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Customer Information
            </div>
            <div class="card-body">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form method="POST" action="">
                    <?php if ($edit_mode): ?>
                        <input type="hidden" name="customer_id" value="<?php echo $customer['id']; ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name *</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" 
                               value="<?php echo $customer['first_name'] ?? ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name *</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" 
                               value="<?php echo $customer['last_name'] ?? ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="<?php echo $customer['email'] ?? ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone *</label>
                        <input type="text" class="form-control" id="phone" name="phone" 
                               value="<?php echo $customer['phone'] ?? ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3"><?php echo $customer['address'] ?? ''; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <?php echo $edit_mode ? 'Update Customer' : 'Add Customer'; ?>
                    </button>
                    <a href="customers.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
