<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
if (!hasRole('accountant')) {
    header('Location: ' . SITE_URL . 'includes/role_router.php');
    exit();
}

$reportType = $_GET['type'] ?? 'monthly_sales';

// Mock report data
$monthlySalesData = [
    ['month' => 'January 2025', 'orders' => 145, 'revenue' => 12800.00, 'avg_order' => 88.28],
    ['month' => 'December 2024', 'orders' => 198, 'revenue' => 18400.00, 'avg_order' => 92.93],
    ['month' => 'November 2024', 'orders' => 156, 'revenue' => 15200.00, 'avg_order' => 97.44],
    ['month' => 'October 2024', 'orders' => 134, 'revenue' => 13100.00, 'avg_order' => 97.76],
];

$customerPaymentData = [
    ['customer' => 'Jennifer Smith', 'total_orders' => 12, 'total_spent' => 840.00, 'avg_order' => 70.00, 'outstanding' => 0.00],
    ['customer' => 'Michael Brown', 'total_orders' => 10, 'total_spent' => 725.00, 'avg_order' => 72.50, 'outstanding' => 20.00],
    ['customer' => 'Amanda Garcia', 'total_orders' => 8, 'total_spent' => 680.00, 'avg_order' => 85.00, 'outstanding' => 0.00],
    ['customer' => 'Sarah Wilson', 'total_orders' => 5, 'total_spent' => 350.00, 'avg_order' => 70.00, 'outstanding' => 0.00],
];

$productRevenueData = [
    ['product' => 'Birthday Celebration', 'units_sold' => 145, 'revenue' => 4350.00, 'percentage' => 22.5],
    ['product' => 'German Chocolate', 'units_sold' => 98, 'revenue' => 3920.00, 'percentage' => 20.3],
    ['product' => 'Strawberry Delight', 'units_sold' => 87, 'revenue' => 3045.00, 'percentage' => 15.8],
    ['product' => 'Chocolate Ganache', 'units_sold' => 76, 'revenue' => 2660.00, 'percentage' => 13.8],
    ['product' => 'Lemon Doberge', 'units_sold' => 65, 'revenue' => 2275.00, 'percentage' => 11.8],
    ['product' => 'Black Forest', 'units_sold' => 54, 'revenue' => 1890.00, 'percentage' => 9.8],
];

include __DIR__ . '/../includes/header.php';
?>

<div class="page-header">
    <h1 class="page-title">Financial Reports</h1>
    <p class="page-subtitle">Comprehensive business analytics</p>
</div>

<div class="btn-group">
    <a href="?type=monthly_sales" class="btn <?php echo $reportType === 'monthly_sales' ? 'btn-primary' : 'btn-secondary'; ?>">
        Monthly Sales
    </a>
    <a href="?type=customer_payments" class="btn <?php echo $reportType === 'customer_payments' ? 'btn-primary' : 'btn-secondary'; ?>">
        Customer Payments
    </a>
    <a href="?type=product_revenue" class="btn <?php echo $reportType === 'product_revenue' ? 'btn-primary' : 'btn-secondary'; ?>">
        Product Revenue
    </a>
</div>

<div class="btn-group">
    <button onclick="window.print()" class="btn btn-secondary">Print Report</button>
    <button class="btn btn-secondary">Export to CSV</button>
    <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
</div>

<?php if ($reportType === 'monthly_sales'): ?>
<div class="table-container">
    <h2 style="margin-bottom: 1rem;">Monthly Sales Report</h2>
    <table>
        <thead>
            <tr>
                <th>Month</th>
                <th>Total Orders</th>
                <th>Revenue</th>
                <th>Average Order Value</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($monthlySalesData as $data): ?>
            <tr>
                <td><?php echo $data['month']; ?></td>
                <td><?php echo $data['orders']; ?></td>
                <td><strong>$<?php echo number_format($data['revenue'], 2); ?></strong></td>
                <td>$<?php echo number_format($data['avg_order'], 2); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

<?php if ($reportType === 'customer_payments'): ?>
<div class="table-container">
    <h2 style="margin-bottom: 1rem;">Customer Payment History</h2>
    <table>
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Total Orders</th>
                <th>Total Spent</th>
                <th>Average Order</th>
                <th>Outstanding Balance</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customerPaymentData as $data): ?>
            <tr>
                <td><?php echo htmlspecialchars($data['customer']); ?></td>
                <td><?php echo $data['total_orders']; ?></td>
                <td><strong>$<?php echo number_format($data['total_spent'], 2); ?></strong></td>
                <td>$<?php echo number_format($data['avg_order'], 2); ?></td>
                <td>
                    <?php if ($data['outstanding'] > 0): ?>
                        <span style="color: var(--color-error); font-weight: bold;">
                            $<?php echo number_format($data['outstanding'], 2); ?>
                        </span>
                    <?php else: ?>
                        <span style="color: var(--color-success);">$0.00</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

<?php if ($reportType === 'product_revenue'): ?>
<div class="table-container">
    <h2 style="margin-bottom: 1rem;">Product Revenue Analysis</h2>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Units Sold</th>
                <th>Revenue</th>
                <th>% of Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productRevenueData as $data): ?>
            <tr>
                <td><?php echo htmlspecialchars($data['product']); ?></td>
                <td><?php echo $data['units_sold']; ?></td>
                <td><strong>$<?php echo number_format($data['revenue'], 2); ?></strong></td>
                <td>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <div style="background-color: var(--color-light-gray); border-radius: 10px; height: 20px; width: 100px; overflow: hidden;">
                            <div style="background-color: var(--color-raspberry); height: 100%; width: <?php echo $data['percentage']; ?>%;"></div>
                        </div>
                        <span><?php echo number_format($data['percentage'], 1); ?>%</span>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

<?php include __DIR__ . '/../includes/footer.php'; ?>
