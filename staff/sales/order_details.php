<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
if (!hasAnyRole(['sales', 'manager', 'baker', 'decorator'])) {
    header('Location: ' . SITE_URL . 'includes/role_router.php');
    exit();
}

$orderId = $_GET['id'] ?? '';

// Mock order data
$order = [
    'id' => '1001',
    'customer_name' => 'Jennifer Smith',
    'customer_email' => 'jennifer@email.com',
    'customer_phone' => '(555) 123-4567',
    'cake_type' => 'Birthday Celebration',
    'size' => '8-inch Double Layer',
    'layers' => [
        ['number' => 1, 'flavor' => 'Vanilla', 'filling' => 'Strawberry'],
        ['number' => 2, 'flavor' => 'Chocolate', 'filling' => 'White Buttercream'],
    ],
    'icing' => 'White Buttercream',
    'writing_color' => 'Pink',
    'special_instructions' => 'Happy Birthday Sarah! with pink flowers',
    'decorations' => 'Buttercream Flowers, Pink Ribbons',
    'order_date' => '2025-01-19',
    'pickup_date' => '2025-01-20',
    'pickup_time' => '02:00 PM',
    'total_price' => 75.00,
    'deposit' => 50.00,
    'balance' => 25.00,
    'payment_method' => 'Credit Card',
    'status' => 'Ready',
    'timeline' => [
        ['status' => 'Order Created', 'time' => '2025-01-19 10:30 AM', 'by' => 'Sarah Johnson'],
        ['status' => 'Baking', 'time' => '2025-01-19 02:00 PM', 'by' => 'Mike Chen'],
        ['status' => 'Decorating', 'time' => '2025-01-20 09:00 AM', 'by' => 'Lisa Martinez'],
        ['status' => 'Ready', 'time' => '2025-01-20 11:30 AM', 'by' => 'Emily Boudreaux'],
    ],
];

include __DIR__ . '/../includes/header.php';
?>

<div class="page-header">
    <h1 class="page-title">Order Details #<?php echo $order['id']; ?></h1>
    <p class="page-subtitle">Complete order information</p>
</div>

<div class="btn-group">
    <a href="new_order.php?edit=<?php echo $order['id']; ?>" class="btn btn-primary">Edit Order</a>
    <button onclick="window.print()" class="btn btn-secondary">Print Production Sheet</button>
    <button onclick="openModal('changeStatusModal')" class="btn btn-secondary">Change Status</button>
    <a href="orders.php" class="btn btn-secondary">Back to Orders</a>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
    
    <!-- Customer Information -->
    <div class="card">
        <h3 style="color: var(--color-raspberry); margin-bottom: 1rem;">Customer Information</h3>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($order['customer_name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($order['customer_email']); ?></p>
        <p><strong>Phone:</strong> <?php echo $order['customer_phone']; ?></p>
    </div>

    <!-- Order Status & Dates -->
    <div class="card">
        <h3 style="color: var(--color-raspberry); margin-bottom: 1rem;">Order Status & Dates</h3>
        <p><strong>Status:</strong> 
            <span class="status-badge status-<?php echo strtolower(str_replace(' ', '-', $order['status'])); ?>">
                <?php echo $order['status']; ?>
            </span>
        </p>
        <p><strong>Order Date:</strong> <?php echo date('F j, Y', strtotime($order['order_date'])); ?></p>
        <p><strong>Pickup Date:</strong> <?php echo date('F j, Y', strtotime($order['pickup_date'])); ?></p>
        <p><strong>Pickup Time:</strong> <?php echo $order['pickup_time']; ?></p>
    </div>
</div>

<!-- Cake Specifications -->
<div class="card" style="margin-bottom: 2rem;">
    <h3 style="color: var(--color-raspberry); margin-bottom: 1rem;">Cake Specifications</h3>
    
    <p><strong>Cake Type:</strong> <?php echo htmlspecialchars($order['cake_type']); ?></p>
    <p><strong>Size:</strong> <?php echo $order['size']; ?></p>
    
    <h4 style="margin-top: 1rem;">Layers:</h4>
    <?php foreach ($order['layers'] as $layer): ?>
        <div style="background-color: var(--color-light-gray); padding: 1rem; border-radius: 6px; margin-bottom: 0.5rem;">
            <strong>Layer <?php echo $layer['number']; ?>:</strong>
            <?php echo $layer['flavor']; ?> cake with <?php echo $layer['filling']; ?> filling
        </div>
    <?php endforeach; ?>
    
    <p style="margin-top: 1rem;"><strong>Icing:</strong> <?php echo $order['icing']; ?></p>
    <p><strong>Writing Color:</strong> <?php echo $order['writing_color']; ?></p>
    <p><strong>Special Instructions:</strong> <?php echo htmlspecialchars($order['special_instructions']); ?></p>
    <p><strong>Decorations:</strong> <?php echo htmlspecialchars($order['decorations']); ?></p>
</div>

<!-- Pricing Information -->
<div class="card" style="margin-bottom: 2rem;">
    <h3 style="color: var(--color-raspberry); margin-bottom: 1rem;">Pricing Information</h3>
    
    <p><strong>Total Price:</strong> $<?php echo number_format($order['total_price'], 2); ?></p>
    <p><strong>Deposit Paid:</strong> $<?php echo number_format($order['deposit'], 2); ?></p>
    <p><strong>Balance Due:</strong> $<?php echo number_format($order['balance'], 2); ?></p>
    <p><strong>Payment Method:</strong> <?php echo $order['payment_method']; ?></p>
</div>

<!-- Order Timeline -->
<div class="card">
    <h3 style="color: var(--color-raspberry); margin-bottom: 1rem;">Order Timeline</h3>
    
    <?php foreach ($order['timeline'] as $event): ?>
        <div style="border-left: 3px solid var(--color-raspberry); padding-left: 1rem; margin-bottom: 1rem;">
            <p><strong><?php echo $event['status']; ?></strong></p>
            <p style="color: var(--color-gray); font-size: 0.9rem;">
                <?php echo $event['time']; ?> by <?php echo $event['by']; ?>
            </p>
        </div>
    <?php endforeach; ?>
</div>

<!-- Change Status Modal -->
<div id="changeStatusModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Change Order Status</h2>
            <button class="modal-close" onclick="closeModal('changeStatusModal')">&times;</button>
        </div>
        <form method="POST">
            <div class="form-group">
                <label class="form-label">New Status</label>
                <select name="status" class="form-select" required>
                    <option value="">Select status</option>
                    <option value="to-be-created">To Be Created</option>
                    <option value="baking">Baking</option>
                    <option value="decorating">Decorating</option>
                    <option value="completed">Completed</option>
                    <option value="ready">Ready</option>
                    <option value="picked-up">Picked Up</option>
                </select>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-success">Update Status</button>
                <button type="button" onclick="closeModal('changeStatusModal')" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
