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
    
    if ($action === 'add_staff') {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $role = $_POST['role'];
        
        // Validation
        if (empty($name) || empty($email) || empty($role)) {
            setToast('All fields are required', 'error');
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            setToast('Invalid email format', 'error');
        } else {
            // In a real app, save to database
            setToast('Staff member added successfully!', 'success');
            header('Location: staff.php');
            exit();
        }
    } elseif ($action === 'delete_staff') {
        $staffId = $_POST['staff_id'] ?? '';
        // In a real app, delete from database
        setToast('Staff member removed successfully', 'success');
        header('Location: staff.php');
        exit();
    }
}

// Mock staff data
$staffMembers = [
    ['id' => 1, 'name' => 'Emily Boudreaux', 'email' => 'manager@emilybakes.com', 'role' => 'Manager', 'status' => 'Active'],
    ['id' => 2, 'name' => 'Sarah Johnson', 'email' => 'sales@emilybakes.com', 'role' => 'Sales', 'status' => 'Active'],
    ['id' => 3, 'name' => 'Mike Chen', 'email' => 'baker@emilybakes.com', 'role' => 'Baker', 'status' => 'Active'],
    ['id' => 4, 'name' => 'Lisa Martinez', 'email' => 'decorator@emilybakes.com', 'role' => 'Decorator', 'status' => 'Active'],
    ['id' => 5, 'name' => 'Dan Boudreaux', 'email' => 'accountant@emilybakes.com', 'role' => 'Accountant', 'status' => 'Active'],
];

include __DIR__ . '/../includes/header.php';
?>

<div class="page-header">
    <h1 class="page-title">Staff Management</h1>
    <p class="page-subtitle">Manage your team members</p>
</div>

<div class="btn-group">
    <button onclick="openModal('addStaffModal')" class="btn btn-primary">Add New Staff Member</button>
    <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($staffMembers as $staff): ?>
            <tr>
                <td><?php echo $staff['id']; ?></td>
                <td><?php echo htmlspecialchars($staff['name']); ?></td>
                <td><?php echo htmlspecialchars($staff['email']); ?></td>
                <td>
                    <span class="role-badge role-<?php echo strtolower($staff['role']); ?>">
                        <?php echo $staff['role']; ?>
                    </span>
                </td>
                <td>
                    <span class="status-badge status-ready">
                        <?php echo $staff['status']; ?>
                    </span>
                </td>
                <td>
                    <button onclick="openModal('editStaffModal<?php echo $staff['id']; ?>')" class="btn btn-sm btn-primary">Edit</button>
                    <form method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to remove this staff member?');">
                        <input type="hidden" name="action" value="delete_staff">
                        <input type="hidden" name="staff_id" value="<?php echo $staff['id']; ?>">
                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Add Staff Modal -->
<div id="addStaffModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Add Staff Member</h2>
            <button class="modal-close" onclick="closeModal('addStaffModal')">&times;</button>
        </div>
        <form method="POST">
            <input type="hidden" name="action" value="add_staff">
            
            <div class="form-group">
                <label class="form-label">Full Name <span class="required">*</span></label>
                <input type="text" name="name" class="form-input" required maxlength="100">
            </div>

            <div class="form-group">
                <label class="form-label">Email <span class="required">*</span></label>
                <input type="email" name="email" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Password <span class="required">*</span></label>
                <input type="password" name="password" class="form-input" required minlength="6">
            </div>

            <div class="form-group">
                <label class="form-label">Role <span class="required">*</span></label>
                <select name="role" class="form-select" required>
                    <option value="">Select role</option>
                    <option value="manager">Manager</option>
                    <option value="sales">Sales Staff</option>
                    <option value="baker">Baker</option>
                    <option value="decorator">Decorator</option>
                    <option value="accountant">Accountant</option>
                </select>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-success">Add Staff Member</button>
                <button type="button" onclick="closeModal('addStaffModal')" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
