<?php
// Order creation page with full cake customization
$current_page = 'orders';
$page_title = 'Create Order';
include 'includes/db.php';

// Get all customers for dropdown
$customers_query = "SELECT id, first_name, last_name FROM customers ORDER BY last_name, first_name";
$customers_result = mysqli_query($conn, $customers_query);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = clean_input($_POST['customer_id']);
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
    
    // Pricing and status
    $total_amount = clean_input($_POST['total_amount']);
    $deposit_amount = clean_input($_POST['deposit_amount']);
    $status = clean_input($_POST['status']);
    $special_instructions = clean_input($_POST['special_instructions']);
    
    $query = "INSERT INTO orders (customer_id, pickup_date, pickup_time, cake_type, size, flavor, filling, 
              icing_flavor, icing_color, writing_text, decorations, total_amount, deposit_amount, 
              status, special_instructions, created_at) 
              VALUES ($customer_id, '$pickup_date', '$pickup_time', '$cake_type', '$size', '$flavor', '$filling',
              '$icing_flavor', '$icing_color', '$writing_text', '$decorations', $total_amount, $deposit_amount, 
              '$status', '$special_instructions', NOW())";
    
    if (mysqli_query($conn, $query)) {
        $order_id = mysqli_insert_id($conn);
        header("Location: order_details.php?id=$order_id");
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}

include 'includes/header.php';
?>

<div class="row">
    <div class="col-md-8">
        <h2>Create New Order</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="orders.php" class="btn btn-secondary">Back to Orders</a>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-10">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="" id="orderForm">
            
            <!-- Customer & Pickup Info -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">1. Customer & Pickup Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="customer_id" class="form-label">Customer *</label>
                            <select class="form-select" id="customer_id" name="customer_id" required>
                                <option value="">Select a customer...</option>
                                <?php while ($customer = mysqli_fetch_assoc($customers_result)): ?>
                                    <option value="<?php echo $customer['id']; ?>">
                                        <?php echo $customer['first_name'] . ' ' . $customer['last_name']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                            <small class="text-muted">
                                Don't see the customer? <a href="customer_form.php" target="_blank">Add New Customer</a>
                            </small>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="pickup_date" class="form-label">Pickup Date *</label>
                            <input type="date" class="form-control" id="pickup_date" name="pickup_date" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="pickup_time" class="form-label">Pickup Time *</label>
                            <input type="time" class="form-control" id="pickup_time" name="pickup_time" value="10:00" required>
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
                            <label for="cake_type" class="form-label">Cake Type *</label>
                            <select class="form-select" id="cake_type" name="cake_type" required>
                                <option value="">Select cake type...</option>
                                <option value="Standard Cake">Standard Cake</option>
                                <option value="Birthday Celebration">Birthday Celebration</option>
                                <option value="Black Forest">Black Forest</option>
                                <option value="Red Velvet">Red Velvet</option>
                                <option value="Lemon Doberge">Lemon Doberge</option>
                                <option value="Custom Design">Custom Design</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="size" class="form-label">Size *</label>
                            <select class="form-select" id="size" name="size" required>
                                <option value="">Select size...</option>
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
                            <label for="flavor" class="form-label">Cake Flavor *</label>
                            <select class="form-select" id="flavor" name="flavor" required>
                                <option value="">Select flavor...</option>
                                <option value="Vanilla">Vanilla</option>
                                <option value="Chocolate">Chocolate</option>
                                <option value="Red Velvet">Red Velvet</option>
                                <option value="Lemon">Lemon</option>
                                <option value="Strawberry">Strawberry</option>
                                <option value="Carrot">Carrot</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="filling" class="form-label">Filling</label>
                            <select class="form-select" id="filling" name="filling">
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
                            <label for="icing_flavor" class="form-label">Icing Flavor *</label>
                            <select class="form-select" id="icing_flavor" name="icing_flavor" required>
                                <option value="">Select icing flavor...</option>
                                <option value="Vanilla Buttercream">Vanilla Buttercream</option>
                                <option value="Chocolate Buttercream">Chocolate Buttercream</option>
                                <option value="Cream Cheese">Cream Cheese</option>
                                <option value="Whipped Cream">Whipped Cream</option>
                                <option value="Ganache">Ganache</option>
                                <option value="Fondant">Fondant</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="icing_color" class="form-label">Icing Color *</label>
                            <select class="form-select" id="icing_color" name="icing_color" required>
                                <option value="">Select color...</option>
                                <optgroup label="Classic Colors">
                                    <option value="White">White</option>
                                    <option value="Ivory">Ivory</option>
                                    <option value="Chocolate">Chocolate</option>
                                </optgroup>
                                <optgroup label="Pastel Colors">
                                    <option value="Pastel Pink">Pastel Pink</option>
                                    <option value="Pastel Blue">Pastel Blue</option>
                                    <option value="Pastel Yellow">Pastel Yellow</option>
                                    <option value="Pastel Green">Pastel Green</option>
                                    <option value="Pastel Purple">Pastel Purple</option>
                                    <option value="Pastel Peach">Pastel Peach</option>
                                </optgroup>
                                <optgroup label="Vibrant Colors">
                                    <option value="Hot Pink">Hot Pink</option>
                                    <option value="Royal Blue">Royal Blue</option>
                                    <option value="Bright Yellow">Bright Yellow</option>
                                    <option value="Lime Green">Lime Green</option>
                                    <option value="Purple">Purple</option>
                                    <option value="Orange">Orange</option>
                                    <option value="Red">Red</option>
                                </optgroup>
                                <optgroup label="Elegant Colors">
                                    <option value="Gold">Gold</option>
                                    <option value="Silver">Silver</option>
                                    <option value="Rose Gold">Rose Gold</option>
                                    <option value="Navy Blue">Navy Blue</option>
                                    <option value="Burgundy">Burgundy</option>
                                    <option value="Forest Green">Forest Green</option>
                                </optgroup>
                                <optgroup label="Earth Tones">
                                    <option value="Beige">Beige</option>
                                    <option value="Tan">Tan</option>
                                    <option value="Brown">Brown</option>
                                    <option value="Sage Green">Sage Green</option>
                                    <option value="Dusty Rose">Dusty Rose</option>
                                    <option value="Lavender">Lavender</option>
                                    <option value="Mint">Mint</option>
                                    <option value="Coral">Coral</option>
                                </optgroup>
                                <optgroup label="Dark Colors">
                                    <option value="Black">Black</option>
                                    <option value="Dark Gray">Dark Gray</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="writing_text" class="form-label">Writing on Cake</label>
                            <input type="text" class="form-control" id="writing_text" name="writing_text" 
                                   placeholder="e.g., Happy Birthday Sarah!">
                            <small class="text-muted">Leave blank for no writing</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="decorations" class="form-label">Decorations</label>
                            <textarea class="form-control" id="decorations" name="decorations" rows="3" 
                                      placeholder="e.g., Fresh strawberries, edible flowers, chocolate drizzle, sprinkles..."></textarea>
                            <small class="text-muted">Describe any special decorations, toppers, or design elements</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="special_instructions" class="form-label">Special Instructions</label>
                            <textarea class="form-control" id="special_instructions" name="special_instructions" rows="3" 
                                      placeholder="Allergies, dietary restrictions, delivery notes, etc."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pricing & Status -->
            <div class="card mb-4">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">3. Pricing & Status</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="total_amount" class="form-label">Total Amount *</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" class="form-control" id="total_amount" 
                                       name="total_amount" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="deposit_amount" class="form-label">Deposit Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" class="form-control" id="deposit_amount" 
                                       name="deposit_amount" value="0">
                            </div>
                            <small class="text-muted">Typically 50% of total</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="status" class="form-label">Status *</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="pending" selected>Pending</option>
                                <option value="in_progress">In Progress</option>
                                <option value="ready">Ready for Pickup</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <a href="orders.php" class="btn btn-secondary btn-lg">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg">Create Order</button>
            </div>
        </form>
    </div>
</div>

<!-- Auto-calculate deposit as 50% of total -->
<script>
document.getElementById('total_amount').addEventListener('input', function() {
    const total = parseFloat(this.value) || 0;
    const deposit = (total * 0.5).toFixed(2);
    document.getElementById('deposit_amount').value = deposit;
});
</script>

<?php include 'includes/footer.php'; ?>
