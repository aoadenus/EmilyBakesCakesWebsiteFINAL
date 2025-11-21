<?php
session_start();

// If already logged in, redirect to role router
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: includes/role_router.php');
    exit;
}

$error = '';

// Handle login submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $validUsers = [
        'manager@emilybakes.com' => ['password' => 'Demo2024!', 'role' => 'manager', 'name' => 'Emily Boudreaux'],
        'sales@emilybakes.com' => ['password' => 'Demo2024!', 'role' => 'sales', 'name' => 'Sarah Johnson'],
        'baker@emilybakes.com' => ['password' => 'Demo2024!', 'role' => 'baker', 'name' => 'Mike Chen'],
        'decorator@emilybakes.com' => ['password' => 'Demo2024!', 'role' => 'decorator', 'name' => 'Lisa Martinez'],
        'accountant@emilybakes.com' => ['password' => 'Demo2024!', 'role' => 'accountant', 'name' => 'Dan Boudreaux']
    ];
    
    // Check credentials
    if (isset($validUsers[$email]) && $validUsers[$email]['password'] === $password) {
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['user_role'] = $validUsers[$email]['role'];
        $_SESSION['user_name'] = $validUsers[$email]['name'];
        header('Location: includes/role_router.php');
        exit;
    } else {
        $error = 'Invalid credentials. Please try again.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login - Emily Bakes Cakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="logo-section">
                <h1>🧁 Emily Bakes Cakes</h1>
                <p>Staff Portal</p>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="login.php">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            
            <div class="demo-credentials">
                <h6>=== DEMO CREDENTIALS ===</h6>
                <p><strong>Manager:</strong> manager@emilybakes.com / Demo2024!</p>
                <p><strong>Sales Staff:</strong> sales@emilybakes.com / Demo2024!</p>
                <p><strong>Baker:</strong> baker@emilybakes.com / Demo2024!</p>
                <p><strong>Decorator:</strong> decorator@emilybakes.com / Demo2024!</p>
                <p><strong>Accountant:</strong> accountant@emilybakes.com / Demo2024!</p>
            </div>
        </div>
    </div>
</body>
</html>
