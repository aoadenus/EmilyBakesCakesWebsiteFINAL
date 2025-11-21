<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
if (!hasRole('decorator')) {
    header('Location: ' . SITE_URL . 'includes/role_router.php');
    exit();
}

// Mock detailed decorating tasks
$tasks = [
    [
        'id' => '1002',
        'customer' => 'Michael Brown',
        'cake_type' => 'German Chocolate',
        'size' => '10-inch',
        'icing' => 'Chocolate Buttercream',
        'writing_color' => 'Red',
        'decorations' => 'Buttercream Flowers, Fondant',
        'special_instructions' => 'Happy Anniversary Michael & Sarah! Red and white color scheme',
        'due_time' => '03:30 PM',
        'pickup_date' => '2025-01-20',
        'status' => 'Ready to Decorate'
    ],
    [
        'id' => '1009',
        'customer' => 'Karen Davis',
        'cake_type' => 'Birthday Celebration',
        'size' => '8-inch',
        'icing' => 'White Buttercream',
        'writing_color' => 'Pink',
        'decorations' => 'Edible Photo, Pink Ribbons',
        'special_instructions' => 'Happy Birthday Emily! with customer-provided photo',
        'due_time' => '04:00 PM',
        'pickup_date' => '2025-01-20',
        'status' => 'Ready to Decorate'
    ],
];

include __DIR__ . '/../includes/header.php';
?>

<div class="page-header">
    <h1 class="page-title">Detailed Decorating Tasks</h1>
    <p class="page-subtitle">Complete specifications for today's decorating</p>
</div>

<div class="btn-group">
    <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    <button onclick="window.print()" class="btn btn-secondary">Print Decorating Sheet</button>
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
        </div>
    </div>
    
    <div style="background-color: var(--color-cream); padding: 1.5rem; border-radius: 8px; margin-bottom: 1rem;">
        <h4 style="margin-bottom: 0.75rem;">Decoration Details:</h4>
        <p><strong>Icing:</strong> <?php echo $task['icing']; ?></p>
        <p><strong>Writing Color:</strong> <?php echo $task['writing_color']; ?></p>
        <p><strong>Decorations:</strong> <?php echo $task['decorations']; ?></p>
        <p><strong>Special Instructions:</strong> <?php echo htmlspecialchars($task['special_instructions']); ?></p>
    </div>
    
    <div class="btn-group">
        <a href="../sales/order_details.php?id=<?php echo $task['id']; ?>" class="btn btn-sm btn-primary">Full Details</a>
        <button onclick="markDecorating('<?php echo $task['id']; ?>')" class="btn btn-sm btn-success">Start Decorating</button>
        <button onclick="markCompleted('<?php echo $task['id']; ?>')" class="btn btn-sm btn-success">Decorating Complete</button>
    </div>
</div>
<?php endforeach; ?>

<script>
function markDecorating(orderId) {
    if (confirm('Mark this order as "Decorating"?')) {
        alert('Order #' + orderId + ' marked as Decorating!');
        location.reload();
    }
}

function markCompleted(orderId) {
    if (confirm('Mark decorating as complete and send for manager approval?')) {
        alert('Order #' + orderId + ' sent for approval!');
        location.reload();
    }
}
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
