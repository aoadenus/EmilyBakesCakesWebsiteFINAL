<?php
require_once '../includes/auth.php';
require_once '../includes/header.php';

$decorating_tasks = [
    ['id' => 'ORD-101', 'customer' => 'Jessica Smith', 'flavor' => 'Vanilla', 'icing' => 'Cream Cheese', 'colors' => 'Pink, Gold', 'writing' => 'Purple', 'due' => '1:00 PM'],
    ['id' => 'ORD-098', 'customer' => 'Mike Johnson', 'flavor' => 'Chocolate', 'icing' => 'Chocolate Ganache', 'colors' => 'Brown, White', 'writing' => 'White', 'due' => '2:30 PM'],
];
?>

<div class="row">
    <div class="col-12">
        <h2 class="mb-4"><i class="bi bi-brush"></i> Decorator's Dashboard</h2>
        <p class="lead">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>! Here's what needs decorating today.</p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-palette2"></i> What I Need to Decorate Today
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Cake Flavor</th>
                                <th>Icing</th>
                                <th>Colors</th>
                                <th>Writing Color</th>
                                <th>Due Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($decorating_tasks as $task): ?>
                            <tr>
                                <td><strong><?php echo $task['id']; ?></strong></td>
                                <td><?php echo $task['customer']; ?></td>
                                <td><?php echo $task['flavor']; ?></td>
                                <td><?php echo $task['icing']; ?></td>
                                <td><?php echo $task['colors']; ?></td>
                                <td><?php echo $task['writing']; ?></td>
                                <td><strong><?php echo $task['due']; ?></strong></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-clock"></i> Upcoming Pickups
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <span><strong>ORD-101</strong> - Jessica Smith</span>
                        <span class="badge bg-success">Ready</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span><strong>ORD-098</strong> - Mike Johnson</span>
                        <span class="badge bg-warning">Decorating</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
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
