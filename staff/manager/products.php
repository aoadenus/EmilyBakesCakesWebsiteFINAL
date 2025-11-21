<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
if (!hasRole('manager')) {
    header('Location: ' . SITE_URL . 'includes/role_router.php');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'add_product_option') {
        $category = $_POST['category'];
        $name = trim($_POST['name']);
        $cost = floatval($_POST['cost']);
        
        if (empty($category) || empty($name)) {
            setToast('Category and name are required', 'error');
        } else {
            // In a real app, save to database
            setToast('Product option added successfully!', 'success');
            header('Location: products.php');
            exit();
        }
    }
}

// Mock product options data
$cakeFlavors = ['Vanilla', 'Almond', 'Yellow', 'Devil\'s Food Chocolate', 'Chocolate', 'Strawberry'];
$fillingFlavors = ['White Buttercream', 'Chocolate Buttercream', 'Almond Buttercream', 'Cream Cheese', 'Lemon Curd', 'Strawberry', 'Rum/Strawberry', 'Raspberry', 'Pecan Praline'];
$icingFlavors = ['White Buttercream', 'Chocolate Buttercream', 'Almond Buttercream', 'White Chocolate Buttercream', 'Cream Cheese', 'Chocolate Ganache'];
$writingColors = ['Red', 'Blue', 'Green', 'Yellow', 'Purple', 'Pink', 'Orange', 'Black', 'White'];
$decorations = ['Buttercream Flowers', 'Fondant Decorations', 'Silk Flowers (Iris, Rose, Daisy, Lily)', 'Silk Butterflies', 'Edible Sugar-Based Photos', 'Toy Trains', 'Plastic Dinosaurs'];

include __DIR__ . '/../includes/header.php';
?>

<div class="page-header">
    <h1 class="page-title">Product Options Management</h1>
    <p class="page-subtitle">Manage cake flavors, fillings, icings, and decorations</p>
</div>

<div class="btn-group">
    <button onclick="openModal('addProductModal')" class="btn btn-primary">Add New Product Option</button>
    <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
</div>

<div class="card-grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
    <div class="card">
        <h3 style="color: var(--color-raspberry); margin-bottom: 1rem;">Cake Flavors</h3>
        <ul style="list-style: none; padding: 0;">
            <?php foreach ($cakeFlavors as $flavor): ?>
                <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--color-light-gray);">
                    <?php echo htmlspecialchars($flavor); ?>
                    <button class="btn btn-sm btn-danger" style="float: right;">Delete</button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="card">
        <h3 style="color: var(--color-raspberry); margin-bottom: 1rem;">Filling Flavors</h3>
        <ul style="list-style: none; padding: 0;">
            <?php foreach ($fillingFlavors as $filling): ?>
                <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--color-light-gray);">
                    <?php echo htmlspecialchars($filling); ?>
                    <button class="btn btn-sm btn-danger" style="float: right;">Delete</button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="card">
        <h3 style="color: var(--color-raspberry); margin-bottom: 1rem;">Icing Flavors</h3>
        <ul style="list-style: none; padding: 0;">
            <?php foreach ($icingFlavors as $icing): ?>
                <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--color-light-gray);">
                    <?php echo htmlspecialchars($icing); ?>
                    <button class="btn btn-sm btn-danger" style="float: right;">Delete</button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="card">
        <h3 style="color: var(--color-raspberry); margin-bottom: 1rem;">Writing Colors</h3>
        <ul style="list-style: none; padding: 0;">
            <?php foreach ($writingColors as $color): ?>
                <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--color-light-gray);">
                    <?php echo htmlspecialchars($color); ?>
                    <button class="btn btn-sm btn-danger" style="float: right;">Delete</button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<!-- Add Product Option Modal -->
<div id="addProductModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Add Product Option</h2>
            <button class="modal-close" onclick="closeModal('addProductModal')">&times;</button>
        </div>
        <form method="POST">
            <input type="hidden" name="action" value="add_product_option">
            
            <div class="form-group">
                <label class="form-label">Category <span class="required">*</span></label>
                <select name="category" class="form-select" required>
                    <option value="">Select category</option>
                    <option value="flavor">Cake Flavor</option>
                    <option value="filling">Filling Flavor</option>
                    <option value="icing">Icing Flavor</option>
                    <option value="writing_color">Writing Color</option>
                    <option value="decoration">Decoration</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Name <span class="required">*</span></label>
                <input type="text" name="name" class="form-input" required maxlength="100">
            </div>

            <div class="form-group">
                <label class="form-label">Additional Cost</label>
                <input type="number" name="cost" class="form-input" step="0.01" min="0" value="0.00">
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-success">Add Option</button>
                <button type="button" onclick="closeModal('addProductModal')" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
