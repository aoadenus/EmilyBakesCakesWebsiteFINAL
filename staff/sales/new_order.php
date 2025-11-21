<?php
require_once '../includes/auth.php';
require_once '../includes/header.php';
?>

<div class="row">
    <div class="col-12">
        <h2 class="mb-4"><i class="bi bi-plus-circle"></i> Create New Order</h2>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-file-earmark-plus"></i> Order Details
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-4">
                        <h5>Customer Information</h5>
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Select Customer</label>
                                <select class="form-select">
                                    <option>-- Select Existing Customer --</option>
                                    <option>Jessica Smith</option>
                                    <option>Mike Johnson</option>
                                    <option>Sweet Treats Corp</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">&nbsp;</label>
                                <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#newCustomerModal">
                                    <i class="bi bi-person-plus"></i> New Customer
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="mb-4">
                        <h5>Cake Details</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Cake Type</label>
                                <select class="form-select">
                                    <option>Birthday Celebration</option>
                                    <option>Black Forest</option>
                                    <option>Chocolate Ganache</option>
                                    <option>Italian Cream</option>
                                    <option>Lemon Doberge</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Cake Size</label>
                                <select class="form-select">
                                    <option>6-inch Round ($20)</option>
                                    <option>8-inch Round ($30)</option>
                                    <option>10-inch Round ($60)</option>
                                    <option>12-inch Round ($100)</option>
                                    <option>1/4 Sheet ($40)</option>
                                    <option>1/2 Sheet ($100)</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Cake Flavor</label>
                                <select class="form-select">
                                    <option>Vanilla</option>
                                    <option>Chocolate</option>
                                    <option>Almond</option>
                                    <option>Lemon</option>
                                    <option>Strawberry</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Filling</label>
                                <select class="form-select">
                                    <option>White Buttercream</option>
                                    <option>Chocolate Buttercream</option>
                                    <option>Cream Cheese</option>
                                    <option>Lemon Curd</option>
                                    <option>Strawberry</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Icing</label>
                                <select class="form-select">
                                    <option>White Buttercream</option>
                                    <option>Chocolate Buttercream</option>
                                    <option>Cream Cheese</option>
                                    <option>Chocolate Ganache</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Number of Layers</label>
                                <select class="form-select">
                                    <option>2 Layers</option>
                                    <option>3 Layers</option>
                                    <option>4 Layers</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="mb-4">
                        <h5>Decoration Details</h5>
                        <div class="mb-3">
                            <label class="form-label">Writing on Cake</label>
                            <input type="text" class="form-control" placeholder="e.g., Happy Birthday Sarah!">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Icing Color</label>
                                <input type="text" class="form-control" placeholder="e.g., Pink, Gold">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Writing Color</label>
                                <select class="form-select">
                                    <option>White</option>
                                    <option>Black</option>
                                    <option>Pink</option>
                                    <option>Purple</option>
                                    <option>Blue</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Additional Decorations</label>
                            <textarea class="form-control" rows="3" placeholder="Describe any additional decorations (flowers, toys, etc.)"></textarea>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="mb-4">
                        <h5>Order Information</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pickup Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pickup Time</label>
                                <input type="time" class="form-control">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Special Instructions</label>
                                <textarea class="form-control" rows="3" placeholder="Any special requests or notes"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-check-circle"></i> Create Order
                        </button>
                        <a href="orders.php" class="btn btn-secondary btn-lg">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-calculator"></i> Order Summary
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="text-muted">Base Price</label>
                    <div class="h4">$60.00</div>
                </div>
                <div class="mb-3">
                    <label class="text-muted">Customization Fee</label>
                    <div class="h4">$15.00</div>
                </div>
                <hr>
                <div class="mb-3">
                    <label class="text-muted">Total Price</label>
                    <div class="h3 text-primary">$75.00</div>
                </div>
                <hr>
                <div class="mb-3">
                    <label class="form-label">Deposit Amount (50% minimum)</label>
                    <input type="number" class="form-control" placeholder="37.50" min="37.50">
                </div>
                <div class="mb-3">
                    <label class="form-label">Payment Method</label>
                    <select class="form-select">
                        <option>Cash</option>
                        <option>Debit Card</option>
                        <option>Credit Card</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
