<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
if (!hasRole('manager')) {
    header('Location: ' . SITE_URL . 'includes/role_router.php');
    exit();
}

// Mock report data
$revenueByMonth = [
    ['month' => 'January 2025', 'revenue' => 15200],
    ['month' => 'February 2025', 'revenue' => 18400],
    ['month' => 'March 2025', 'revenue' => 21100],
    ['month' => 'April 2025', 'revenue' => 19800],
];

$topProducts = [
    ['product' => 'Birthday Celebration', 'orders' => 145, 'revenue' => 4350],
    ['product' => 'German Chocolate', 'orders' => 98, 'revenue' => 3920],
    ['product' => 'Strawberry Delight', 'orders' => 87, 'revenue' => 3045],
    ['product' => 'Chocolate Ganache', 'orders' => 76, 'revenue' => 2660],
];

$topCustomers = [
    ['name' => 'Jennifer Smith', 'orders' => 12, 'total_spent' => 840],
    ['name' => 'Michael Brown', 'orders' => 10, 'total_spent' => 725],
    ['name' => 'Sarah Wilson', 'orders' => 9, 'total_spent' => 680],
];

include __DIR__ . '/../includes/header.php';
?>

<div class="page-header">
    <h1 class="page-title">Reports & Analytics</h1>
    <p class="page-subtitle">Business insights and performance metrics</p>
</div>

<div class="btn-group">
    <button class="btn btn-primary" onclick="window.print()">Print Report</button>
    <button class="btn btn-secondary">Export to CSV</button>
    <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
</div>

<div class="table-container">
    <h2 style="margin-bottom: 1rem;">Revenue by Month</h2>
    <table>
        <thead>
            <tr>
                <th>Month</th>
                <th>Revenue</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($revenueByMonth as $data): ?>
            <tr>
                <td><?php echo $data['month']; ?></td>
                <td>$<?php echo number_format($data['revenue']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="table-container">
    <h2 style="margin-bottom: 1rem;">Top Products</h2>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Total Orders</th>
                <th>Revenue</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($topProducts as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['product']); ?></td>
                <td><?php echo $product['orders']; ?></td>
                <td>$<?php echo number_format($product['revenue']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="table-container">
    <h2 style="margin-bottom: 1rem;">Top Customers</h2>
    <table>
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Total Orders</th>
                <th>Total Spent</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($topCustomers as $customer): ?>
            <tr>
                <td><?php echo htmlspecialchars($customer['name']); ?></td>
                <td><?php echo $customer['orders']; ?></td>
                <td>$<?php echo number_format($customer['total_spent']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
