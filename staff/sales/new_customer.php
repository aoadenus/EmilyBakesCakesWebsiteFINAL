<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();
if (!hasAnyRole(['sales', 'manager'])) {
    header('Location: ' . SITE_URL . 'includes/role_router.php');
    exit();
}

$errors = [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address'] ?? '');
    $preferred = isset($_POST['preferred']) ? 1 : 0;
    $comments = trim($_POST['comments'] ?? '');
    
    // Validation
    if (empty($type)) {
        $errors[] = 'Customer type is required';
    }
    
    if (empty($name) || strlen($name) > 100) {
        $errors[] = 'Name is required and must be less than 100 characters';
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required';
    }
    
    if (empty($phone) || !preg_match('/^[0-9]{10}$/', $phone)) {
        $errors[] = 'Phone must be exactly 10 digits';
    }
    
    if (empty($errors)) {
        // In a real app, save to database
        setToast('Customer added successfully!', 'success');
        header('Location: customers.php');
        exit();
    }
}

include __DIR__ . '/../includes/header.php';
?>

<div class="page-header">
    <h1 class="page-title">Add New Customer</h1>
    <p class="page-subtitle">Enter customer information</p>
</div>

<?php if (!empty($errors)): ?>
<div class="toast toast-error" style="position: static; margin-bottom: 1rem;">
    <ul style="margin: 0; padding-left: 1.5rem;">
        <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<div class="form-container">
    <form method="POST">
        <div class="form-group">
            <label class="form-label">Customer Type <span class="required">*</span></label>
            <select name="type" class="form-select" required>
                <option value="">Select type</option>
                <option value="retail">Retail</option>
                <option value="corporate">Corporate</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Name <span class="required">*</span></label>
            <input type="text" name="name" class="form-input" required maxlength="100" 
                   placeholder="First Last or Company Name">
        </div>

        <div class="form-group">
            <label class="form-label">Email <span class="required">*</span></label>
            <input type="email" name="email" class="form-input" required 
                   placeholder="customer@email.com">
        </div>

        <div class="form-group">
            <label class="form-label">Mobile Phone <span class="required">*</span></label>
            <input type="tel" name="phone" class="form-input" required 
                   pattern="[0-9]{10}" placeholder="1234567890">
            <small style="color: var(--color-gray);">Enter 10 digits without spaces or dashes</small>
        </div>

        <div class="form-group">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-textarea" rows="3" 
                      placeholder="Street, City, State, ZIP"></textarea>
        </div>

        <div class="form-group">
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="preferred" value="1">
                <span class="form-label" style="margin: 0;">Preferred Customer (10% discount)</span>
            </label>
        </div>

        <div class="form-group">
            <label class="form-label">Comments</label>
            <textarea name="comments" class="form-textarea" rows="3" 
                      placeholder="Special notes or preferences"></textarea>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-success">Add Customer</button>
            <a href="customers.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
