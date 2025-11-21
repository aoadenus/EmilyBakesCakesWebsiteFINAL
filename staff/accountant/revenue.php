<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
if (!hasRole('accountant')) {
    header('Location: ' . SITE_URL . 'includes/role_router.php');
    exit();
}

// Mock revenue data with filters
$filter_date_range = $_GET['date_range'] ?? 'all';
$filter_customer = $_GET['customer'] ?? '';
$filter_product_type = $_GET['product_type'] ?? '';

// Mock revenue transactions
$transactions = [
    ['date' => '2025-01-20', 'order_id' => '1003', 'customer' => 'Sarah Wilson', 'product' => 'Strawberry Delight', 'total' => 70.00, 'payment_method' => 'Credit Card', 'status' => 'Paid'],
    ['date' => '2025-01-20', 'order_id' => '1002', 'customer' => 'Michael Brown', 'product' => 'German Chocolate', 'total' => 95.00, 'payment_method' => 'Cash', 'status' => 'Partial'],
    ['date' => '2025-01-19', 'order_id' => '1005', 'customer' => 'Amanda Garcia', 'product' => 'Lemon Doberge', 'total' => 120.00, 'payment_method' => 'Debit Card', 'status' => 'Paid'],
    ['date' => '2025-01-19', 'order_id' => '1001', 'customer' => 'Jennifer Smith', 'product' => 'Birthday Celebration', 'total' => 75.00, 'payment_method' => 'Credit Card', 'status' => 'Partial'],
    ['date' => '2025-01-19', 'order_id' => '1004', 'customer' => 'David Lee', 'product' => 'Chocolate Ganache', 'total' => 45.00, 'payment_method' => 'Cash', 'status' => 'Paid'],
    ['date' => '2025-01-18', 'order_id' => '1006', 'customer' => 'Robert Taylor', 'product' => 'Black Forest', 'total' => 85.00, 'payment_method' => 'Credit Card', 'status' => 'Paid'],
    ['date' => '2025-01-18', 'order_id' => '1007', 'customer' => 'Patricia Moore', 'product' => 'Lemon and Cream Cheese', 'total' => 65.00, 'payment_method' => 'Debit Card', 'status' => 'Partial'],
    ['date' => '2025-01-17', 'order_id' => '1008', 'customer' => 'Thomas White', 'product' => 'Strawberry Delight', 'total' => 70.00, 'payment_method' => 'Cash', 'status' => 'Paid'],
];

$totalRevenue = array_sum(array_column($transactions, 'total'));

include __DIR__ . '/../includes/header.php';
?>

<div class="page-header">
    <h1 class="page-title">Revenue Details</h1>
    <p class="page-subtitle">Detailed revenue and payment tracking</p>
</div>

<div class="filters">
    <form method="GET" style="display: contents;">
        <div class="filter-group">
            <label class="filter-label">Date Range</label>
            <select name="date_range" class="form-select" onchange="this.form.submit()">
                <option value="all" <?php echo $filter_date_range === 'all' ? 'selected' : ''; ?>>All Dates</option>
                <option value="today" <?php echo $filter_date_range === 'today' ? 'selected' : ''; ?>>Today</option>
                <option value="week" <?php echo $filter_date_range === 'week' ? 'selected' : ''; ?>>This Week</option>
                <option value="month" <?php echo $filter_date_range === 'month' ? 'selected' : ''; ?>>This Month</option>
            </select>
        </div>
        
        <div class="filter-group">
            <label class="filter-label">Customer</label>
            <input type="text" name="customer" class="form-input" placeholder="Search customer" 
                   value="<?php echo htmlspecialchars($filter_customer); ?>" style="width: 200px;">
        </div>
        
        <div class="filter-group">
            <label class="filter-label">Product Type</label>
            <select name="product_type" class="form-select">
                <option value="">All Products</option>
                <option value="birthday">Birthday Cakes</option>
                <option value="chocolate">Chocolate Cakes</option>
                <option value="fruit">Fruit Cakes</option>
            </select>
        </div>
        
        <div class="filter-group">
            <button type="submit" class="btn btn-primary" style="margin-top: 1.5rem;">Apply Filters</button>
        </div>
    </form>
</div>

<div class="btn-group">
    <button onclick="window.print()" class="btn btn-primary">Print Report</button>
    <button class="btn btn-secondary">Export to CSV</button>
    <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
</div>

<div class="card" style="margin-bottom: 2rem;">
    <h3 style="color: var(--color-raspberry); font-size: 1.5rem;">Total Revenue: $<?php echo number_format($totalRevenue, 2); ?></h3>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Total</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
            <tr>
                <td><?php echo date('M j, Y', strtotime($transaction['date'])); ?></td>
                <td><?php echo $transaction['order_id']; ?></td>
                <td><?php echo htmlspecialchars($transaction['customer']); ?></td>
                <td><?php echo htmlspecialchars($transaction['product']); ?></td>
                <td><strong>$<?php echo number_format($transaction['total'], 2); ?></strong></td>
                <td>
                    <?php
                    $badgeClass = 'sales';
                    if ($transaction['payment_method'] === 'Cash') $badgeClass = 'baker';
                    elseif ($transaction['payment_method'] === 'Debit Card') $badgeClass = 'decorator';
                    ?>
                    <span class="role-badge role-<?php echo $badgeClass; ?>">
                        <?php echo $transaction['payment_method']; ?>
                    </span>
                </td>
                <td>
                    <?php
                    $statusClass = $transaction['status'] === 'Paid' ? 'status-completed' : 'status-baking';
                    ?>
                    <span class="status-badge <?php echo $statusClass; ?>">
                        <?php echo $transaction['status']; ?>
                    </span>
                </td>
                <td>
                    <a href="../sales/order_details.php?id=<?php echo $transaction['order_id']; ?>" class="btn btn-sm btn-primary">View Order</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
