<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cake Order System</title>
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
        h1 {
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
        .card-header {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎂 Cake Order System</h1>
        
        <div class="text-center mb-4">
            <a href="order_form.php" class="btn btn-custom btn-lg me-3">
                📝 Create New Order
            </a>
            <a href="view_orders.php" class="btn btn-outline-secondary btn-lg">
                📋 View All Orders
            </a>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                Welcome to the Cake Order System
            </div>
            <div class="card-body">
                <h5>Quick Start Guide:</h5>
                <ol>
                    <li><strong>Setup Database:</strong> Import <code>database.sql</code> in phpMyAdmin</li>
                    <li><strong>Configure:</strong> Update database credentials in <code>db.php</code></li>
                    <li><strong>Create Orders:</strong> Click "Create New Order" to place orders</li>
                    <li><strong>View Orders:</strong> Click "View All Orders" to see submitted orders</li>
                </ol>
                
                <hr>
                
                <h5>Features:</h5>
                <ul>
                    <li>✅ Comprehensive cake customization (6 flavors, 15 fillings, 33 colors)</li>
                    <li>✅ 7 different cake sizes with serving counts</li>
                    <li>✅ Auto-calculated 50% deposit</li>
                    <li>✅ Order management with status tracking</li>
                    <li>✅ Simple MySQL database</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
