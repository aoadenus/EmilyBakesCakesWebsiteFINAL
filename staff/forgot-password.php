<?php
/**
 * Emily Bakes Cakes - Forgot Password Page
 * Contact Averium Solutions for password reset assistance
 */

session_start();

// Redirect if already logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Emily Bakes Cakes</title>
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

        .forgot-wrapper {
            width: 100%;
            max-width: 480px;
        }

        .forgot-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(196, 69, 105, 0.15);
            overflow: hidden;
            border: 2px solid var(--primary-pink);
        }

        .forgot-header {
            background: linear-gradient(135deg, var(--primary-pink) 0%, #a63857 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .forgot-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .forgot-header .tagline {
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            font-weight: 500;
            opacity: 0.95;
        }

        .forgot-body {
            padding: 40px 30px;
        }

        .info-box {
            background: #f0f4ff;
            border-left: 4px solid var(--primary-pink);
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .info-box h3 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: var(--accent-dark);
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .info-box p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        .info-box p:last-child {
            margin-bottom: 0;
        }

        .contact-details {
            background: white;
            border: 1.5px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .contact-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .contact-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .contact-label {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: var(--primary-pink);
            font-size: 0.9rem;
            margin-bottom: 5px;
            display: block;
        }

        .contact-value {
            color: var(--accent-dark);
            font-size: 0.95rem;
        }

        .contact-value a {
            color: var(--primary-pink);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-value a:hover {
            color: #a63857;
            text-decoration: underline;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 25px;
        }

        .btn-action {
            padding: 12px;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-back {
            background: var(--primary-pink);
            color: white;
            border: none;
        }

        .btn-back:hover {
            background: #a63857;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(196, 69, 105, 0.3);
        }

        .btn-support {
            background: var(--secondary-cream);
            color: var(--primary-pink);
            border: 1.5px solid var(--primary-pink);
        }

        .btn-support:hover {
            background: var(--primary-pink);
            color: white;
        }

        .icon {
            font-size: 1.2rem;
        }

        @media (max-width: 480px) {
            .forgot-header {
                padding: 30px 20px;
            }

            .forgot-header h1 {
                font-size: 1.5rem;
            }

            .forgot-body {
                padding: 30px 20px;
            }

            .action-buttons {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="forgot-wrapper">
        <div class="forgot-card">
            <!-- Header -->
            <div class="forgot-header">
                <h1>🔐</h1>
                <h1>Password Assistance</h1>
                <p class="tagline">Contact Averium Solutions</p>
            </div>

            <!-- Body -->
            <div class="forgot-body">
                <!-- Main Message -->
                <div class="info-box">
                    <h3>Need Help With Your Password?</h3>
                    <p>
                        To reset your password or regain access to your staff account, 
                        please contact <strong>Averium Solutions</strong>.
                    </p>
                    <p>
                        Our support team is here to help you regain access to your Emily Bakes Cakes 
                        staff portal account securely and quickly.
                    </p>
                </div>

                <!-- Contact Information -->
                <div class="contact-details">
                    <div class="contact-item">
                        <span class="contact-label">📧 Email Support</span>
                        <span class="contact-value">
                            <a href="mailto:support@averiumsolutions.com">support@averiumsolutions.com</a>
                        </span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-label">📞 Phone Support</span>
                        <span class="contact-value">(713) 555-AVERIUM</span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-label">🌐 Website</span>
                        <span class="contact-value">
                            <a href="https://averiumsolutions.com" target="_blank">averiumsolutions.com</a>
                        </span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-label">⏰ Support Hours</span>
                        <span class="contact-value">Monday - Friday, 9:00 AM - 5:00 PM CST</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <a href="login.php" class="btn-action btn-back">
                        <span class="icon">←</span> Back to Login
                    </a>
                    <a href="mailto:support@averiumsolutions.com" class="btn-action btn-support">
                        <span class="icon">✉️</span> Send Email
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
