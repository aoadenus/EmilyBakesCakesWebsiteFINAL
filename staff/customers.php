<?php
// Customers page
$current_page = 'customers';
$page_title = 'Customers';
include 'includes/db.php';

// Handle search
$search = isset($_GET['search']) ? clean_input($_GET['search']) : '';
$where_clause = '';
if ($search) {
    $where_clause = "WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%'";
}

// Get customers
$query = "SELECT * FROM customers $where_clause ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

include 'includes/header.php';
?>

<div class="row">
    <div class="col-md-6">
        <h2>Customers</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="customer_form.php" class="btn btn-primary">Add New Customer</a>
    </div>
</div>

<!-- Search Bar -->
<div class="row mt-3">
    <div class="col-md-6">
        <form method="GET" action="customers.php">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search by name, email, or phone" value="<?php echo $search; ?>">
                <button class="btn btn-primary" type="submit">Search</button>
                <?php if ($search): ?>
                    <a href="customers.php" class="btn btn-secondary">Clear</a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<!-- Customers Table -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Customer List (<?php echo mysqli_num_rows($result); ?> customers)
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Orders</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0): ?>
                            <?php while ($customer = mysqli_fetch_assoc($result)): ?>
                                <?php
                                // Count orders for this customer
                                $order_count_query = "SELECT COUNT(*) as count FROM orders WHERE customer_id = " . $customer['id'];
                                $order_count = mysqli_fetch_assoc(mysqli_query($conn, $order_count_query))['count'];
                                ?>
                                <tr>
                                    <td><?php echo $customer['id']; ?></td>
                                    <td><?php echo $customer['first_name'] . ' ' . $customer['last_name']; ?></td>
                                    <td><?php echo $customer['email']; ?></td>
                                    <td><?php echo $customer['phone']; ?></td>
                                    <td><?php echo $order_count; ?></td>
                                    <td>
                                        <a href="customer_form.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No customers found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
