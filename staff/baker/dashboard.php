<?php
require_once '../includes/auth.php';
require_once '../includes/header.php';

// Sample data for baker's tasks
$baking_tasks = [
    ['id' => 'ORD-105', 'customer' => 'Amanda Brown', 'cake' => 'Chocolate Ganache', 'size' => '10-inch Round', 'layers' => 2, 'due' => '11:00 AM'],
    ['id' => 'ORD-104', 'customer' => 'Sarah Williams', 'cake' => 'Lemon Doberge', 'size' => '8-inch Round', 'layers' => 3, 'due' => '12:30 PM'],
    ['id' => 'ORD-103', 'customer' => 'Tom Davis', 'cake' => 'Black Forest', 'size' => '12-inch Round', 'layers' => 2, 'due' => '2:00 PM'],
];

$flavor_needs = [
    ['flavor' => 'Chocolate', 'layers' => 12],
    ['flavor' => 'Vanilla', 'layers' => 6],
    ['flavor' => 'Lemon', 'layers' => 3],
    ['flavor' => 'Almond', 'layers' => 2],
];
?>

<div class="row">
    <div class="col-12">
        <h2 class="mb-4"><i class="bi bi-egg"></i> Baker's Dashboard</h2>
        <p class="lead">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>! Here's what needs to be baked today.</p>
    </div>
</div>

<!-- Baking Tasks for Today -->
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-list-task"></i> What I Need to Bake Today
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Cake Type</th>
                                <th>Size</th>
                                <th>Layers</th>
                                <th>Due Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($baking_tasks as $task): ?>
                            <tr>
                                <td><strong><?php echo $task['id']; ?></strong></td>
                                <td><?php echo $task['customer']; ?></td>
                                <td><?php echo $task['cake']; ?></td>
                                <td><?php echo $task['size']; ?></td>
                                <td><?php echo $task['layers']; ?></td>
                                <td><strong><?php echo $task['due']; ?></strong></td>
                                <td>
                                    <span class="badge bg-warning badge-status">To Bake</span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Flavors Needed Today -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-palette"></i> Flavors I Need Today
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php foreach ($flavor_needs as $flavor): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo $flavor['flavor']; ?>
                        <span class="badge bg-primary rounded-pill"><?php echo $flavor['layers']; ?> layers</span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        
        <!-- Quick Links -->
        <div class="card mt-4">
            <div class="card-header">
                <i class="bi bi-link-45deg"></i> Quick Links
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="../sales/orders.php" class="btn btn-outline-primary">
                        <i class="bi bi-list"></i> View All Orders
                    </a>
                    <a href="../sales/customers.php" class="btn btn-outline-primary">
                        <i class="bi bi-people"></i> View Customers
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
