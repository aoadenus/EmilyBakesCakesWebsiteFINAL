<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login - Emily Bakes Cakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #C44569 0%, #8B3A5E 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            padding: 40px;
            max-width: 400px;
            width: 100%;
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo h1 {
            color: #C44569;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .logo p {
            color: #666;
            font-size: 14px;
        }
        .btn-login {
            background-color: #C44569;
            border: none;
            width: 100%;
            padding: 12px;
            font-weight: bold;
        }
        .btn-login:hover {
            background-color: #8B3A5E;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo">
            <h1>Emily Bakes Cakes</h1>
            <p>Staff Portal Login</p>
        </div>

        <form action="dashboard.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-login">Login</button>
        </form>

        <div class="mt-4 text-center">
            <a href="../index.html" style="color: #C44569; text-decoration: none;">
                ← Back to Public Site
            </a>
        </div>
    </div>
</body>
</html>
