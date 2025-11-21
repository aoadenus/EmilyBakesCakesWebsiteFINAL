<?php
require_once '../includes/auth.php';
require_once '../includes/header.php';

// Sample data for demonstration
$orders_today = 8;
$pickups_today = 5;
$in_production = 12;
$revenue_today = 450.00;

$todays_pickups = [
    ['id' => 'ORD-101', 'customer' => 'Jessica Smith', 'cake' => 'Birthday Celebration', 'time' => '2:00 PM', 'status' => 'Ready'],
    ['id' => 'ORD-098', 'customer' => 'Mike Johnson', 'cake' => 'Chocolate Ganache', 'time' => '3:30 PM', 'status' => 'Decorating'],
    ['id' => 'ORD-095', 'customer' => 'Sweet Treats Corp', 'cake' => 'Italian Cream', 'time' => '4:00 PM', 'status' => 'Ready'],
];

$recent_orders = [
    ['id' => 'ORD-104', 'customer' => 'Sarah Williams', 'product' => 'Lemon Doberge', 'date' => '2025-11-21', 'status' => 'In Production'],
    ['id' => 'ORD-103', 'customer' => 'Tom Davis', 'product' => 'Black Forest', 'date' => '2025-11-21', 'status' => 'Baking'],
    ['id' => 'ORD-102', 'customer' => 'Emily Chen', 'product' => 'Strawberry Delight', 'date' => '2025-11-20', 'status' => 'Completed'],
];
?>

<div class="row">
    <div class="col-12">
        <h2 class="mb-4"><i class="bi bi-bag-check"></i> Sales Dashboard</h2>
    </div>
</div>

<!-- KPI Cards -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-label">Orders Today</div>
                <div class="stat-value"><?php echo $orders_today; ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-label">Pickups Today</div>
                <div class="stat-value"><?php echo $pickups_today; ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-label">In Production</div>
                <div class="stat-value"><?php echo $in_production; ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="stat-label">Revenue Today</div>
                <div class="stat-value">$<?php echo number_format($revenue_today, 2); ?></div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-md-3">
        <a href="new_order.php" class="btn btn-primary quick-action-btn">
            <i class="bi bi-plus-circle"></i><br>Create New Order
        </a>
    </div>
    <div class="col-md-3">
        <a href="customers.php" class="btn btn-primary quick-action-btn">
            <i class="bi bi-people"></i><br>View Customers
        </a>
    </div>
    <div class="col-md-3">
        <button class="btn btn-primary quick-action-btn" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
            <i class="bi bi-person-plus"></i><br>Add Customer
        </button>
    </div>
    <div class="col-md-3">
        <a href="orders.php" class="btn btn-primary quick-action-btn">
            <i class="bi bi-list-check"></i><br>All Orders
        </a>
    </div>
</div>

<!-- Today's Pickups -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-calendar-check"></i> Today's Pickups
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
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
                            <?php foreach ($todays_pickups as $pickup): ?>
                            <tr>
                                <td><strong><?php echo $pickup['id']; ?></strong></td>
                                <td><?php echo $pickup['customer']; ?></td>
                                <td><?php echo $pickup['cake']; ?></td>
                                <td><?php echo $pickup['time']; ?></td>
                                <td>
                                    <span class="badge <?php echo $pickup['status'] === 'Ready' ? 'bg-success' : 'bg-warning'; ?> badge-status">
                                        <?php echo $pickup['status']; ?>
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#orderDetailModal">
                                        <i class="bi bi-eye"></i> View
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-clock-history"></i> Recent Orders
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
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
                            <?php foreach ($recent_orders as $order): ?>
                            <tr>
                                <td><strong><?php echo $order['id']; ?></strong></td>
                                <td><?php echo $order['customer']; ?></td>
                                <td><?php echo $order['product']; ?></td>
                                <td><?php echo $order['date']; ?></td>
                                <td>
                                    <span class="badge bg-info badge-status"><?php echo $order['status']; ?></span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-1">
                                        <i class="bi bi-eye"></i> View
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Customer Modal -->
<div class="modal fade" id="addCustomerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: var(--primary-pink); color: white;">
                <h5 class="modal-title">Add New Customer</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Customer Name</label>
                        <input type="text" class="form-control" placeholder="Enter full name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="customer@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" placeholder="(555) 123-4567">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Customer Type</label>
                        <select class="form-select">
                            <option>Retail</option>
                            <option>Corporate</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Customer</button>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
