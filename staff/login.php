<?php
/**
 * Emily Bakes Cakes - Staff Portal Login
 * Secure PHP-based authentication for staff access
 */

session_start();

// Redirect if already logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: dashboard.php');
    exit();
}

$error = '';
$form_submitted = false;

// Handle login submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_submitted = true;
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';
    
    // Valid staff users with demo credentials
    $valid_users = [
        'manager@emilybakes.com' => [
            'password' => 'Test',
            'role' => 'manager',
            'name' => 'Emily Boudreaux'
        ],
        'sales@emilybakes.com' => [
            'password' => 'Test',
            'role' => 'sales',
            'name' => 'Sarah Johnson'
        ],
        'baker@emilybakes.com' => [
            'password' => 'Test',
            'role' => 'baker',
            'name' => 'Mike Chen'
        ],
        'decorator@emilybakes.com' => [
            'password' => 'Test',
            'role' => 'decorator',
            'name' => 'Lisa Martinez'
        ],
        'accountant@emilybakes.com' => [
            'password' => 'Test',
            'role' => 'accountant',
            'name' => 'Dan Boudreaux'
        ]
    ];
    
    // Validate credentials
    if (empty($email) || empty($password)) {
        $error = 'Please enter both email and password.';
    } elseif (isset($valid_users[$email]) && $valid_users[$email]['password'] === $password) {
        // Authentication successful
        $_SESSION['logged_in'] = true;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_role'] = $valid_users[$email]['role'];
        $_SESSION['user_name'] = $valid_users[$email]['name'];
        $_SESSION['login_time'] = time();
        
        // Redirect to dashboard
        header('Location: dashboard.php');
        exit();
    } else {
        $error = 'Invalid email or password. Please try again.';
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Poppins:wght@500;600;700&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Emily Bakes Cakes Brand Colors */
        :root {
            --primary-pink: #C44569;
            --secondary-cream: #F8EBD7;
            --accent-dark: #2B2B2B;
            --accent-muted: #5A3825;
            --gold: #d4af37;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, var(--secondary-cream) 0%, #e8d4bf 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Open Sans', sans-serif;
            padding: 20px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
        }

        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(196, 69, 105, 0.15);
            overflow: hidden;
            border: 2px solid var(--primary-pink);
        }

        .login-header {
            background: linear-gradient(135deg, var(--primary-pink) 0%, #a63857 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .login-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .login-header .tagline {
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            font-weight: 500;
            opacity: 0.95;
        }

        .login-body {
            padding: 40px 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: var(--accent-dark);
            font-size: 0.95rem;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            border: 1.5px solid #ddd;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 0.95rem;
            font-family: 'Open Sans', sans-serif;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-pink);
            box-shadow: 0 0 0 0.2rem rgba(196, 69, 105, 0.1);
        }

        .form-control::placeholder {
            color: #999;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background: var(--primary-pink);
            color: white;
            border: none;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .login-btn:hover {
            background: #a63857;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(196, 69, 105, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .alert {
            margin-bottom: 20px;
            border-radius: 8px;
            border: none;
            padding: 12px 15px;
            font-size: 0.9rem;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .demo-section {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-top: 30px;
            border-left: 4px solid var(--gold);
        }

        .demo-section h5 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: var(--accent-dark);
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        .demo-credentials {
            display: grid;
            gap: 10px;
        }

        .demo-credential {
            background: white;
            padding: 10px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            border-left: 3px solid var(--primary-pink);
        }

        .demo-credential strong {
            color: var(--primary-pink);
            display: block;
            margin-bottom: 2px;
        }

        .demo-credential .role {
            color: #666;
            font-size: 0.8rem;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: var(--primary-pink);
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .back-link a:hover {
            color: #a63857;
            text-decoration: underline;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--primary-pink);
        }

        .checkbox-group label {
            margin: 0;
            font-size: 0.9rem;
            cursor: pointer;
            font-family: 'Open Sans', sans-serif;
            color: var(--accent-dark);
        }

        .form-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            margin-bottom: 20px;
        }

        .forgot-password-link {
            color: var(--primary-pink);
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .forgot-password-link:hover {
            color: #a63857;
            text-decoration: underline;
        }

        .login-btn.loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .spinner-border {
            width: 18px;
            height: 18px;
            border-width: 2px;
            margin-right: 8px;
        }

        .demo-section-wrapper {
            margin-top: 35px;
        }

        .demo-toggle-btn {
            width: 100%;
            padding: 12px;
            background: white;
            border: 1.5px solid var(--primary-pink);
            color: var(--primary-pink);
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .demo-toggle-btn:hover {
            background: var(--primary-pink);
            color: white;
        }

        .demo-toggle-arrow {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .demo-toggle-arrow.open {
            transform: rotate(180deg);
        }

        .demo-section {
            display: none;
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-top: 12px;
            border: 1.5px solid var(--primary-pink);
        }

        .demo-section.show {
            display: block;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .demo-section h5 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: var(--accent-dark);
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        .demo-credentials {
            display: grid;
            gap: 10px;
        }

        .demo-credential {
            background: white;
            padding: 10px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            border-left: 3px solid var(--primary-pink);
        }

        .demo-credential strong {
            color: var(--primary-pink);
            display: block;
            margin-bottom: 2px;
        }

        .demo-credential .role {
            color: #666;
            font-size: 0.8rem;
        }

        @media (max-width: 480px) {
            .login-header {
                padding: 30px 20px;
            }

            .login-header h1 {
                font-size: 1.5rem;
            }

            .login-body {
                padding: 30px 20px;
            }

            .form-links {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <h1>🧁</h1>
                <h1>Emily Bakes Cakes</h1>
                <p class="tagline">Staff Portal</p>
            </div>

            <!-- Login Form -->
            <div class="login-body">
                <?php if ($error): ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Login Failed:</strong> <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="login.php" novalidate id="loginForm">
                    <div class="form-group">
                        <label for="email" class="form-label">Staff Email Address</label>
                        <input 
                            type="email" 
                            class="form-control" 
                            id="email" 
                            name="email" 
                            placeholder="your.email@emilybakes.com"
                            value="<?php echo htmlspecialchars($email ?? ''); ?>"
                            required
                            autocomplete="email"
                        >
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input 
                            type="password" 
                            class="form-control" 
                            id="password" 
                            name="password" 
                            placeholder="Enter your password"
                            required
                            autocomplete="current-password"
                        >
                    </div>

                    <div class="form-links">
                        <div class="checkbox-group">
                            <input type="checkbox" id="rememberMe" name="remember_me">
                            <label for="rememberMe">Remember me</label>
                        </div>
                        <a href="forgot-password.php" class="forgot-password-link">Forgot Password?</a>
                    </div>

                    <button type="submit" class="login-btn" id="signInBtn">Sign In</button>
                </form>

                <!-- Demo Credentials Dropdown Section -->
                <div class="demo-section-wrapper">
                    <button type="button" class="demo-toggle-btn" onclick="toggleDemoCredentials()">
                        <span>Demo Credentials</span>
                        <span class="demo-toggle-arrow">▼</span>
                    </button>

                    <div class="demo-section" id="demoSection">
                        <h5>📋 Demo Staff Accounts</h5>
                        <div class="demo-credentials">
                            <div class="demo-credential">
                                <strong>Manager</strong>
                                <div>manager@emilybakes.com</div>
                                <div class="role">Password: Test</div>
                            </div>
                            <div class="demo-credential">
                                <strong>Sales</strong>
                                <div>sales@emilybakes.com</div>
                                <div class="role">Password: Test</div>
                            </div>
                            <div class="demo-credential">
                                <strong>Baker</strong>
                                <div>baker@emilybakes.com</div>
                                <div class="role">Password: Test</div>
                            </div>
                            <div class="demo-credential">
                                <strong>Decorator</strong>
                                <div>decorator@emilybakes.com</div>
                                <div class="role">Password: Test</div>
                            </div>
                            <div class="demo-credential">
                                <strong>Accountant</strong>
                                <div>accountant@emilybakes.com</div>
                                <div class="role">Password: Test</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back Link -->
                <div class="back-link">
                    <p>Not a staff member?</p>
                    <a href="../index.php">← Back to Customer Website</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle demo credentials visibility with arrow rotation
        function toggleDemoCredentials() {
            const demoSection = document.getElementById('demoSection');
            const toggleBtn = document.querySelector('.demo-toggle-btn');
            const arrow = document.querySelector('.demo-toggle-arrow');
            
            demoSection.classList.toggle('show');
            arrow.classList.toggle('open');
        }

        // Handle form submission with loading state
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const signInBtn = document.getElementById('signInBtn');
            signInBtn.classList.add('loading');
            signInBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Signing In...';
            signInBtn.disabled = true;
            
            // Simulate brief delay for loading effect
            setTimeout(() => {
                this.submit();
            }, 600);
        });

        // Restore button state if user goes back
        window.addEventListener('pageshow', function() {
            const signInBtn = document.getElementById('signInBtn');
            signInBtn.classList.remove('loading');
            signInBtn.innerHTML = 'Sign In';
            signInBtn.disabled = false;
        });
    </script>
</body>
</html>
