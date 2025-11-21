<?php
include 'db.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = clean_input($_POST['customer_name']);
    $customer_email = clean_input($_POST['customer_email']);
    $customer_phone = clean_input($_POST['customer_phone']);
    $pickup_date = clean_input($_POST['pickup_date']);
    $pickup_time = clean_input($_POST['pickup_time']);
    
    // Cake details
    $cake_type = clean_input($_POST['cake_type']);
    $size = clean_input($_POST['size']);
    $flavor = clean_input($_POST['flavor']);
    $filling = clean_input($_POST['filling']);
    $icing_flavor = clean_input($_POST['icing_flavor']);
    $icing_color = clean_input($_POST['icing_color']);
    $writing_text = clean_input($_POST['writing_text']);
    $decorations = clean_input($_POST['decorations']);
    
    // Pricing
    $total_amount = clean_input($_POST['total_amount']);
    $deposit_amount = clean_input($_POST['deposit_amount']);
    $special_instructions = clean_input($_POST['special_instructions']);
    
    $query = "INSERT INTO orders (customer_name, customer_email, customer_phone, pickup_date, pickup_time, 
              cake_type, size, flavor, filling, icing_flavor, icing_color, writing_text, decorations, 
              total_amount, deposit_amount, special_instructions, created_at) 
              VALUES ('$customer_name', '$customer_email', '$customer_phone', '$pickup_date', '$pickup_time', 
              '$cake_type', '$size', '$flavor', '$filling', '$icing_flavor', '$icing_color', 
              '$writing_text', '$decorations', $total_amount, $deposit_amount, '$special_instructions', NOW())";
    
    if (mysqli_query($conn, $query)) {
        $order_id = mysqli_insert_id($conn);
        header("Location: order_success.php?id=$order_id");
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Cake Order</title>
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
            max-width: 900px;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>🎂 Create Cake Order</h2>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            
            <!-- Customer Info -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">1. Customer Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Customer Name *</label>
                            <input type="text" class="form-control" name="customer_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="customer_email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Phone *</label>
                            <input type="tel" class="form-control" name="customer_phone" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Pickup Date *</label>
                            <input type="date" class="form-control" name="pickup_date" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Pickup Time *</label>
                            <input type="time" class="form-control" name="pickup_time" value="10:00" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cake Customization -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">2. Cake Customization</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cake Type *</label>
                            <select class="form-select" name="cake_type" required>
                                <option value="">Select...</option>
                                <option value="Standard Cake">Standard Cake</option>
                                <option value="Birthday Celebration">Birthday Celebration</option>
                                <option value="Black Forest">Black Forest</option>
                                <option value="Red Velvet">Red Velvet</option>
                                <option value="Lemon Doberge">Lemon Doberge</option>
                                <option value="Custom Design">Custom Design</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Size *</label>
                            <select class="form-select" name="size" required>
                                <option value="">Select...</option>
                                <option value="6 inch round">6" Round (serves 8-10)</option>
                                <option value="8 inch round">8" Round (serves 12-16)</option>
                                <option value="10 inch round">10" Round (serves 20-25)</option>
                                <option value="12 inch round">12" Round (serves 30-35)</option>
                                <option value="Quarter Sheet">Quarter Sheet (serves 20-25)</option>
                                <option value="Half Sheet">Half Sheet (serves 40-50)</option>
                                <option value="Full Sheet">Full Sheet (serves 80-100)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cake Flavor *</label>
                            <select class="form-select" name="flavor" required>
                                <option value="">Select...</option>
                                <option value="Vanilla">Vanilla</option>
                                <option value="Chocolate">Chocolate</option>
                                <option value="Red Velvet">Red Velvet</option>
                                <option value="Lemon">Lemon</option>
                                <option value="Strawberry">Strawberry</option>
                                <option value="Carrot">Carrot</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Filling</label>
                            <select class="form-select" name="filling">
                                <option value="None">None</option>
                                <option value="Bavarian Cream">Bavarian Cream</option>
                                <option value="Chocolate Ganache">Chocolate Ganache</option>
                                <option value="Raspberry">Raspberry</option>
                                <option value="Lemon Curd">Lemon Curd</option>
                                <option value="Strawberry">Strawberry</option>
                                <option value="Vanilla Custard">Vanilla Custard</option>
                                <option value="Cream Cheese">Cream Cheese</option>
                                <option value="Nutella">Nutella</option>
                                <option value="Caramel">Caramel</option>
                                <option value="Chocolate Mousse">Chocolate Mousse</option>
                                <option value="White Chocolate Mousse">White Chocolate Mousse</option>
                                <option value="Lemon Mousse">Lemon Mousse</option>
                                <option value="Strawberry Mousse">Strawberry Mousse</option>
                                <option value="Raspberry Mousse">Raspberry Mousse</option>
                                <option value="Blueberry">Blueberry</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Icing Flavor *</label>
                            <select class="form-select" name="icing_flavor" required>
                                <option value="">Select...</option>
                                <option value="Vanilla Buttercream">Vanilla Buttercream</option>
                                <option value="Chocolate Buttercream">Chocolate Buttercream</option>
                                <option value="Cream Cheese">Cream Cheese</option>
                                <option value="Whipped Cream">Whipped Cream</option>
                                <option value="Ganache">Ganache</option>
                                <option value="Fondant">Fondant</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Icing Color *</label>
                            <select class="form-select" name="icing_color" required>
                                <option value="">Select...</option>
                                <optgroup label="Classic">
                                    <option value="White">White</option>
                                    <option value="Ivory">Ivory</option>
                                    <option value="Chocolate">Chocolate</option>
                                </optgroup>
                                <optgroup label="Pastel">
                                    <option value="Pastel Pink">Pastel Pink</option>
                                    <option value="Pastel Blue">Pastel Blue</option>
                                    <option value="Pastel Yellow">Pastel Yellow</option>
                                    <option value="Pastel Green">Pastel Green</option>
                                    <option value="Pastel Purple">Pastel Purple</option>
                                    <option value="Pastel Peach">Pastel Peach</option>
                                </optgroup>
                                <optgroup label="Vibrant">
                                    <option value="Hot Pink">Hot Pink</option>
                                    <option value="Royal Blue">Royal Blue</option>
                                    <option value="Bright Yellow">Bright Yellow</option>
                                    <option value="Lime Green">Lime Green</option>
                                    <option value="Purple">Purple</option>
                                    <option value="Orange">Orange</option>
                                    <option value="Red">Red</option>
                                </optgroup>
                                <optgroup label="Elegant">
                                    <option value="Gold">Gold</option>
                                    <option value="Silver">Silver</option>
                                    <option value="Rose Gold">Rose Gold</option>
                                    <option value="Navy Blue">Navy Blue</option>
                                    <option value="Burgundy">Burgundy</option>
                                    <option value="Forest Green">Forest Green</option>
                                </optgroup>
                                <optgroup label="Earth Tones">
                                    <option value="Beige">Beige</option>
                                    <option value="Sage Green">Sage Green</option>
                                    <option value="Dusty Rose">Dusty Rose</option>
                                    <option value="Lavender">Lavender</option>
                                    <option value="Mint">Mint</option>
                                    <option value="Coral">Coral</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Writing on Cake</label>
                        <input type="text" class="form-control" name="writing_text" placeholder="e.g., Happy Birthday Sarah!">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Decorations</label>
                        <textarea class="form-control" name="decorations" rows="2" placeholder="e.g., Fresh strawberries, edible flowers, sprinkles..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Special Instructions</label>
                        <textarea class="form-control" name="special_instructions" rows="2" placeholder="Allergies, dietary restrictions, etc."></textarea>
                    </div>
                </div>
            </div>

            <!-- Pricing -->
            <div class="card mb-4">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">3. Pricing</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Total Amount *</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" class="form-control" id="total_amount" name="total_amount" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Deposit (50%)</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" class="form-control" id="deposit_amount" name="deposit_amount" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <a href="index.php" class="btn btn-secondary btn-lg">Cancel</a>
                <button type="submit" class="btn btn-custom btn-lg">Submit Order</button>
            </div>
        </form>
    </div>

    <script>
    // Auto-calculate 50% deposit
    document.getElementById('total_amount').addEventListener('input', function() {
        const total = parseFloat(this.value) || 0;
        document.getElementById('deposit_amount').value = (total * 0.5).toFixed(2);
    });
    </script>
</body>
</html>
