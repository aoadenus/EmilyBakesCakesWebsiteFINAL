<?php
// Products page
$current_page = 'products';
$page_title = 'Products';
include 'includes/db.php';

// Get all products
$query = "SELECT * FROM products WHERE deleted_at IS NULL ORDER BY name";
$result = mysqli_query($conn, $query);

include 'includes/header.php';
?>

<div class="row">
    <div class="col-md-6">
        <h2>Products</h2>
        <p class="text-muted">Standard cake offerings</p>
    </div>
</div>

<!-- Products Table -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Product List (<?php echo mysqli_num_rows($result); ?> products)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Base Price</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($result) > 0): ?>
                                <?php while ($product = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?php echo $product['id']; ?></td>
                                        <td><?php echo $product['name']; ?></td>
                                        <td>
                                            <span class="badge bg-info">
                                                <?php echo $product['category'] ?? 'Standard'; ?>
                                            </span>
                                        </td>
                                        <td><?php echo format_money($product['base_price']); ?></td>
                                        <td><?php echo substr($product['description'], 0, 50); ?>...</td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">No products found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Product Categories -->
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Product Categories
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Classic Cakes
                        <span class="badge bg-primary rounded-pill">4</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Premium Cakes
                        <span class="badge bg-primary rounded-pill">6</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Signature Cakes
                        <span class="badge bg-primary rounded-pill">4</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Price Range
            </div>
            <div class="card-body">
                <?php
                // Get price statistics
                $stats_query = "SELECT MIN(base_price) as min_price, MAX(base_price) as max_price, AVG(base_price) as avg_price 
                                FROM products WHERE deleted_at IS NULL";
                $stats = mysqli_fetch_assoc(mysqli_query($conn, $stats_query));
                ?>
                <p><strong>Minimum Price:</strong> <?php echo format_money($stats['min_price']); ?></p>
                <p><strong>Maximum Price:</strong> <?php echo format_money($stats['max_price']); ?></p>
                <p><strong>Average Price:</strong> <?php echo format_money($stats['avg_price']); ?></p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
