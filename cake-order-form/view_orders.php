<?php
include 'db.php';

// Get all orders
$query = "SELECT * FROM orders ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #C44569 0%, #8B3A5E 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-top: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
        }
        h2 {
            color: #C44569;
            text-align: center;
            margin-bottom: 30px;
        }
        .btn-custom {
            background-color: #C44569;
            border: none;
            color: white;
        }
        .btn-custom:hover {
            background-color: #8B3A5E;
            color: white;
        }
        .badge-pending {
            background-color: #ffc107;
        }
        .badge-completed {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h2>📋 All Orders</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="index.php" class="btn btn-secondary">← Back to Home</a>
                <a href="order_form.php" class="btn btn-custom">+ New Order</a>
            </div>
        </div>

        <?php if (mysqli_num_rows($result) == 0): ?>
            <div class="alert alert-info text-center">
                No orders yet. <a href="order_form.php">Create your first order!</a>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Order #</th>
                            <th>Customer</th>
                            <th>Cake Details</th>
                            <th>Pickup</th>
                            <th>Total</th>
                            <th>Deposit</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($order = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><strong>#<?php echo $order['id']; ?></strong></td>
                                <td>
                                    <?php echo htmlspecialchars($order['customer_name']); ?><br>
                                    <small class="text-muted"><?php echo htmlspecialchars($order['customer_phone']); ?></small>
                                </td>
                                <td>
                                    <strong><?php echo htmlspecialchars($order['cake_type']); ?></strong><br>
                                    <small>
                                        <?php echo htmlspecialchars($order['size']); ?> | 
                                        <?php echo htmlspecialchars($order['flavor']); ?> | 
                                        <?php echo htmlspecialchars($order['icing_color']); ?>
                                    </small>
                                    <?php if ($order['writing_text']): ?>
                                        <br><small class="text-primary">"<?php echo htmlspecialchars($order['writing_text']); ?>"</small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo format_date($order['pickup_date']); ?><br>
                                    <small class="text-muted"><?php echo date('g:i A', strtotime($order['pickup_time'])); ?></small>
                                </td>
                                <td><?php echo format_money($order['total_amount']); ?></td>
                                <td><?php echo format_money($order['deposit_amount']); ?></td>
                                <td>
                                    <span class="badge badge-<?php echo $order['status']; ?>">
                                        <?php echo ucfirst($order['status']); ?>
                                    </span>
                                </td>
                                <td>
                                    <small><?php echo format_date($order['created_at']); ?></small>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
