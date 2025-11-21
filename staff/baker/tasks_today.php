<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
if (!hasRole('baker')) {
    header('Location: ' . SITE_URL . 'includes/role_router.php');
    exit();
}

// Mock detailed baking tasks
$tasks = [
    [
        'id' => '1004',
        'customer' => 'David Lee',
        'cake_type' => 'Chocolate Ganache',
        'size' => '6-inch',
        'layers' => [
            ['number' => 1, 'flavor' => 'Chocolate', 'filling' => 'Chocolate Mousse'],
            ['number' => 2, 'flavor' => 'Chocolate', 'filling' => 'Chocolate Mousse'],
        ],
        'icing' => 'Chocolate Ganache',
        'due_time' => '10:00 AM',
        'pickup_date' => '2025-01-21',
        'status' => 'To Bake'
    ],
    [
        'id' => '1007',
        'customer' => 'Patricia Moore',
        'cake_type' => 'Lemon and Cream Cheese',
        'size' => '8-inch',
        'layers' => [
            ['number' => 1, 'flavor' => 'Lemon', 'filling' => 'Lemon Curd'],
            ['number' => 2, 'flavor' => 'Lemon', 'filling' => 'Cream Cheese'],
        ],
        'icing' => 'Cream Cheese',
        'due_time' => '01:00 PM',
        'pickup_date' => '2025-01-21',
        'status' => 'To Bake'
    ],
];

include __DIR__ . '/../includes/header.php';
?>

<div class="page-header">
    <h1 class="page-title">Detailed Baking Tasks</h1>
    <p class="page-subtitle">Complete specifications for today's baking</p>
</div>

<div class="btn-group">
    <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    <button onclick="window.print()" class="btn btn-secondary">Print Baking Sheet</button>
</div>

<?php foreach ($tasks as $task): ?>
<div class="card" style="margin-bottom: 2rem;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <h2 style="color: var(--color-raspberry);">Order #<?php echo $task['id']; ?></h2>
        <span class="status-badge status-<?php echo strtolower(str_replace(' ', '-', $task['status'])); ?>">
            <?php echo $task['status']; ?>
        </span>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 1rem;">
        <div>
            <p><strong>Customer:</strong> <?php echo htmlspecialchars($task['customer']); ?></p>
            <p><strong>Cake Type:</strong> <?php echo htmlspecialchars($task['cake_type']); ?></p>
        </div>
        <div>
            <p><strong>Size:</strong> <?php echo $task['size']; ?></p>
            <p><strong>Pickup Date:</strong> <?php echo date('F j, Y', strtotime($task['pickup_date'])); ?></p>
        </div>
        <div>
            <p><strong>Due Time:</strong> <span style="color: var(--color-raspberry); font-weight: bold;"><?php echo $task['due_time']; ?></span></p>
            <p><strong>Icing:</strong> <?php echo $task['icing']; ?></p>
        </div>
    </div>
    
    <h4 style="margin-bottom: 0.5rem;">Layers to Bake:</h4>
    <?php foreach ($task['layers'] as $layer): ?>
        <div style="background-color: var(--color-cream); padding: 1rem; border-radius: 6px; margin-bottom: 0.5rem;">
            <strong>Layer <?php echo $layer['number']; ?>:</strong>
            <?php echo $layer['flavor']; ?> cake with <?php echo $layer['filling']; ?> filling
        </div>
    <?php endforeach; ?>
    
    <div class="btn-group" style="margin-top: 1rem;">
        <a href="../sales/order_details.php?id=<?php echo $task['id']; ?>" class="btn btn-sm btn-primary">Full Details</a>
        <button onclick="markBaking('<?php echo $task['id']; ?>')" class="btn btn-sm btn-success">Start Baking</button>
        <button onclick="markCompleted('<?php echo $task['id']; ?>')" class="btn btn-sm btn-success">Baking Complete</button>
    </div>
</div>
<?php endforeach; ?>

<script>
function markBaking(orderId) {
    if (confirm('Mark this order as "Baking"?')) {
        alert('Order #' + orderId + ' marked as Baking!');
        location.reload();
    }
}

function markCompleted(orderId) {
    if (confirm('Mark baking as complete and send to decorating?')) {
        alert('Order #' + orderId + ' sent to decorating!');
        location.reload();
    }
}
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
