<?php
require_once '../includes/auth.php';
require_once '../includes/header.php';

$customers = [
    ['id' => 'CUST-001', 'name' => 'Jessica Smith', 'email' => 'jessica@email.com', 'phone' => '(555) 123-4567', 'type' => 'Retail', 'orders' => 5],
    ['id' => 'CUST-002', 'name' => 'Sweet Treats Corp', 'email' => 'contact@sweettreats.com', 'phone' => '(555) 987-6543', 'type' => 'Corporate', 'orders' => 12],
    ['id' => 'CUST-003', 'name' => 'Mike Johnson', 'email' => 'mike.j@email.com', 'phone' => '(555) 456-7890', 'type' => 'Retail', 'orders' => 3],
];
?>

<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="bi bi-people"></i> Customers</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
                <i class="bi bi-person-plus"></i> Add Customer
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-list"></i> Customer Directory
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Type</th>
                                <th>Total Orders</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($customers as $customer): ?>
                            <tr>
                                <td><strong><?php echo $customer['id']; ?></strong></td>
                                <td><?php echo $customer['name']; ?></td>
                                <td><?php echo $customer['email']; ?></td>
                                <td><?php echo $customer['phone']; ?></td>
                                <td>
                                    <span class="badge <?php echo $customer['type'] === 'Corporate' ? 'bg-info' : 'bg-secondary'; ?>">
                                        <?php echo $customer['type']; ?>
                                    </span>
                                </td>
                                <td><?php echo $customer['orders']; ?></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i> View
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addCustomerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: var(--primary-pink); color: white;">
                <h5 class="modal-title">Add New Customer</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Customer Name</label>
                        <input type="text" class="form-control" placeholder="Enter full name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="customer@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" placeholder="(555) 123-4567">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Customer Type</label>
                        <select class="form-select">
                            <option>Retail</option>
                            <option>Corporate</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Customer</button>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
