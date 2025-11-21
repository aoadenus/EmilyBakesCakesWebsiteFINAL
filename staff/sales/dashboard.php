<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
if (!hasRole('sales')) {
    header('Location: ' . SITE_URL . 'includes/role_router.php');
    exit();
}

$currentUser = getCurrentUser();

// Mock KPI data
$ordersToday = 8;
$pickupsToday = 5;
$inProduction = 12;
$revenueToday = 450;

// Mock today's pickups
$todaysPickups = [
    ['id' => '1001', 'customer' => 'Jennifer Smith', 'cake_type' => 'Birthday Celebration', 'pickup_time' => '02:00 PM', 'status' => 'Ready'],
    ['id' => '1002', 'customer' => 'Michael Brown', 'cake_type' => 'German Chocolate', 'pickup_time' => '03:30 PM', 'status' => 'Decorating'],
    ['id' => '1003', 'customer' => 'Sarah Wilson', 'cake_type' => 'Strawberry Delight', 'pickup_time' => '05:00 PM', 'status' => 'Ready'],
];

// Mock recent orders
$recentOrders = [
    ['id' => '1004', 'customer' => 'David Lee', 'product' => 'Chocolate Ganache', 'order_date' => '2025-01-19', 'status' => 'Baking'],
    ['id' => '1005', 'customer' => 'Amanda Garcia', 'product' => 'Lemon Doberge', 'order_date' => '2025-01-18', 'status' => 'Completed'],
    ['id' => '1006', 'customer' => 'Robert Taylor', 'product' => 'Black Forest', 'order_date' => '2025-01-18', 'status' => 'Picked Up'],
];

include __DIR__ . '/../includes/header.php';
?>

<div class="page-header">
    <h1 class="page-title">Sales Dashboard</h1>
    <p class="page-subtitle">Welcome, <?php echo htmlspecialchars($currentUser['name']); ?>!</p>
</div>

<div class="card-grid">
    <div class="card">
        <div class="card-header">
            <span class="card-title">Orders Today</span>
        </div>
        <div class="card-value"><?php echo $ordersToday; ?></div>
        <div class="card-label">New orders</div>
    </div>

    <div class="card">
        <div class="card-header">
            <span class="card-title">Pickups Today</span>
        </div>
        <div class="card-value"><?php echo $pickupsToday; ?></div>
        <div class="card-label">Ready for pickup</div>
    </div>

    <div class="card">
        <div class="card-header">
            <span class="card-title">In Production</span>
        </div>
        <div class="card-value"><?php echo $inProduction; ?></div>
        <div class="card-label">Active orders</div>
    </div>

    <div class="card">
        <div class="card-header">
            <span class="card-title">Revenue Today</span>
        </div>
        <div class="card-value">$<?php echo number_format($revenueToday); ?></div>
        <div class="card-label">Today's sales</div>
    </div>
</div>

<div class="btn-group">
    <a href="new_order.php" class="btn btn-primary">Create New Order</a>
    <a href="customers.php" class="btn btn-secondary">View Customers</a>
    <button onclick="openModal('addCustomerModal')" class="btn btn-secondary">Add Customer</button>
    <a href="orders.php" class="btn btn-secondary">All Orders</a>
</div>

<div class="table-container">
    <h2 style="margin-bottom: 1rem;">Today's Pickups</h2>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Cake Type</th>
                <th>Pickup Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($todaysPickups as $order): ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo htmlspecialchars($order['customer']); ?></td>
                <td><?php echo htmlspecialchars($order['cake_type']); ?></td>
                <td><?php echo $order['pickup_time']; ?></td>
                <td>
                    <span class="status-badge status-<?php echo strtolower(str_replace(' ', '-', $order['status'])); ?>">
                        <?php echo $order['status']; ?>
                    </span>
                </td>
                <td>
                    <a href="order_details.php?id=<?php echo $order['id']; ?>" class="btn btn-sm btn-primary">View</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="table-container">
    <h2 style="margin-bottom: 1rem;">Recent Orders</h2>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recentOrders as $order): ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo htmlspecialchars($order['customer']); ?></td>
                <td><?php echo htmlspecialchars($order['product']); ?></td>
                <td><?php echo date('M j, Y', strtotime($order['order_date'])); ?></td>
                <td>
                    <span class="status-badge status-<?php echo strtolower(str_replace(' ', '-', $order['status'])); ?>">
                        <?php echo $order['status']; ?>
                    </span>
                </td>
                <td>
                    <a href="order_details.php?id=<?php echo $order['id']; ?>" class="btn btn-sm btn-primary">View</a>
                    <a href="new_order.php?edit=<?php echo $order['id']; ?>" class="btn btn-sm btn-secondary">Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Add Customer Modal -->
<div id="addCustomerModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Add New Customer</h2>
            <button class="modal-close" onclick="closeModal('addCustomerModal')">&times;</button>
        </div>
        <form method="POST" action="new_customer.php">
            <div class="form-group">
                <label class="form-label">Customer Type <span class="required">*</span></label>
                <select name="type" class="form-select" required>
                    <option value="retail">Retail</option>
                    <option value="corporate">Corporate</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Name <span class="required">*</span></label>
                <input type="text" name="name" class="form-input" required maxlength="100">
            </div>

            <div class="form-group">
                <label class="form-label">Email <span class="required">*</span></label>
                <input type="email" name="email" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Phone <span class="required">*</span></label>
                <input type="tel" name="phone" class="form-input" required pattern="[0-9]{10}" placeholder="1234567890">
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-success">Add Customer</button>
                <button type="button" onclick="closeModal('addCustomerModal')" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
