<?php
require_once __DIR__ . '/includes/config.php';

$email = '';
$submitted = false;
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    
    if (empty($email)) {
        $error = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email format';
    } else {
        // In a real app, this would send a password reset email
        $submitted = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

<div class="login-container">
    <div class="login-card" style="max-width: 600px;">
        <div class="login-header">
            <div class="login-logo">🎂</div>
            <h1 class="login-title">Forgot Password</h1>
            <p class="login-subtitle">Reset your staff portal password</p>
        </div>

        <?php if ($submitted): ?>
        <div class="card" style="background-color: var(--color-cream); padding: 2rem; text-align: center;">
            <h3 style="color: var(--color-raspberry); margin-bottom: 1rem;">Contact Support</h3>
            <p style="margin-bottom: 1rem;">
                For security reasons, password resets must be handled by your system administrator.
            </p>
            <p style="font-weight: 600; margin-bottom: 1rem;">
                Please contact Averium Solutions to reset your password.
            </p>
            <div style="background-color: var(--color-white); padding: 1.5rem; border-radius: 8px; margin-top: 1.5rem;">
                <p><strong>Averium Solutions Support</strong></p>
                <p>Email: support@averiumsolutions.com</p>
                <p>Phone: (555) 123-4567</p>
                <p style="margin-top: 1rem; color: var(--color-gray); font-size: 0.9rem;">
                    Please provide your email address: <strong><?php echo htmlspecialchars($email); ?></strong>
                </p>
            </div>
        </div>

        <div style="text-align: center; margin-top: 2rem;">
            <a href="login.php" class="btn btn-primary">Back to Login</a>
        </div>
        
        <?php else: ?>
        
        <?php if ($error): ?>
        <div class="toast toast-error" style="position: static; margin-bottom: 1.5rem;">
            <?php echo htmlspecialchars($error); ?>
        </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-input" required 
                       value="<?php echo htmlspecialchars($email); ?>"
                       placeholder="your.email@emilybakes.com">
                <small style="color: var(--color-gray);">
                    Enter the email address associated with your account
                </small>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Request Password Reset</button>
                <a href="login.php" class="btn btn-secondary">Back to Login</a>
            </div>
        </form>

        <div class="card" style="background-color: var(--color-light-gray); padding: 1.5rem; margin-top: 2rem;">
            <h4 style="margin-bottom: 0.5rem;">Note:</h4>
            <p style="margin: 0; color: var(--color-dark-gray);">
                Password reset requests are processed by Averium Solutions. 
                You will be contacted via email with instructions to reset your password.
            </p>
        </div>
        
        <?php endif; ?>
    </div>
</div>

</body>
</html>
