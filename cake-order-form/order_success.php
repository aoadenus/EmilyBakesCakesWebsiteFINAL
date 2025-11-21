<?php
include 'db.php';

$order_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = "SELECT * FROM orders WHERE id = $order_id";
$result = mysqli_query($conn, $query);
$order = mysqli_fetch_assoc($result);

if (!$order) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success</title>
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
            padding: 40px;
            margin-top: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            max-width: 700px;
        }
        .success-icon {
            font-size: 80px;
            color: #28a745;
            text-align: center;
        }
        h2 {
            color: #C44569;
            text-align: center;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">✅</div>
        <h2 class="mb-4">Order Submitted Successfully!</h2>
        
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Order #<?php echo $order['id']; ?></h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Customer:</strong><br>
                        <?php echo htmlspecialchars($order['customer_name']); ?><br>
                        <?php echo htmlspecialchars($order['customer_phone']); ?>
                    </div>
                    <div class="col-md-6">
                        <strong>Pickup:</strong><br>
                        <?php echo format_date($order['pickup_date']); ?><br>
                        <?php echo date('g:i A', strtotime($order['pickup_time'])); ?>
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <strong>Cake Details:</strong><br>
                    <ul>
                        <li><strong>Type:</strong> <?php echo htmlspecialchars($order['cake_type']); ?></li>
                        <li><strong>Size:</strong> <?php echo htmlspecialchars($order['size']); ?></li>
                        <li><strong>Flavor:</strong> <?php echo htmlspecialchars($order['flavor']); ?></li>
                        <?php if ($order['filling'] != 'None'): ?>
                            <li><strong>Filling:</strong> <?php echo htmlspecialchars($order['filling']); ?></li>
                        <?php endif; ?>
                        <li><strong>Icing:</strong> <?php echo htmlspecialchars($order['icing_flavor']); ?> - <?php echo htmlspecialchars($order['icing_color']); ?></li>
                        <?php if ($order['writing_text']): ?>
                            <li><strong>Writing:</strong> "<?php echo htmlspecialchars($order['writing_text']); ?>"</li>
                        <?php endif; ?>
                        <?php if ($order['decorations']): ?>
                            <li><strong>Decorations:</strong> <?php echo htmlspecialchars($order['decorations']); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <strong>Total Amount:</strong> <?php echo format_money($order['total_amount']); ?>
                    </div>
                    <div class="col-md-6">
                        <strong>Deposit Due:</strong> <?php echo format_money($order['deposit_amount']); ?>
                    </div>
                </div>

                <?php if ($order['special_instructions']): ?>
                    <hr>
                    <div>
                        <strong>Special Instructions:</strong><br>
                        <?php echo nl2br(htmlspecialchars($order['special_instructions'])); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="text-center">
            <a href="order_form.php" class="btn btn-custom btn-lg me-2">Place Another Order</a>
            <a href="view_orders.php" class="btn btn-outline-secondary btn-lg">View All Orders</a>
        </div>
    </div>
</body>
</html>
