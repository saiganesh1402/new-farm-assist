<?php
session_start();
require_once 'db_connect.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "All fields are required";
    } else {
        try {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                header("Location: ../home.php");
                exit();
            } else {
                $error = "Invalid email or password";
            }
        } catch(PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Farmer Assistant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .form-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .toggle-btns button {
            margin-right: 10px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">🌾 Farmer Assistant</a>
    </div>
</nav>

<!-- Login Section -->
<div class="container my-5">
    <div class="form-container">
        <h2 class="text-center mb-4">Login</h2>

        <!-- Toggle Buttons for User/Admin Login -->
        <div class="toggle-btns text-center mb-4">
            <button class="btn btn-success" id="userLoginBtn">User Login</button>
            <button class="btn btn-outline-dark" id="adminLoginBtn">Admin Login</button>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- User Login Form -->
        <div id="userLoginForm">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Login</button>
            </form>
            <p class="mt-3 text-center">Don't have an account? <a href="signup.php">Sign up</a></p>
        </div>

        <!-- Admin Login Form (Initially Hidden) -->
        <div id="adminLoginForm" style="display: none;">
            <form action="admin_login.php" method="POST">
                <div class="mb-3">
                    <label for="adminUsername" class="form-label">Admin Username</label>
                    <input type="text" class="form-control" id="adminUsername" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="adminPassword" class="form-label">Admin Password</label>
                    <input type="password" class="form-control" id="adminPassword" name="password" required>
                </div>
                <button type="submit" class="btn btn-dark w-100">Login</button>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-success text-white text-center p-3">
    <p class="mb-0">&copy; 2025 Farmer Assistant. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // JavaScript to Toggle Between User and Admin Login Forms
    document.getElementById('userLoginBtn').addEventListener('click', function() {
        document.getElementById('userLoginForm').style.display = 'block';
        document.getElementById('adminLoginForm').style.display = 'none';
        this.classList.add('btn-success');
        document.getElementById('adminLoginBtn').classList.remove('btn-dark');
        document.getElementById('adminLoginBtn').classList.add('btn-outline-dark');
        this.classList.remove('btn-outline-success');
    });

    document.getElementById('adminLoginBtn').addEventListener('click', function() {
        document.getElementById('adminLoginForm').style.display = 'block';
        document.getElementById('userLoginForm').style.display = 'none';
        this.classList.add('btn-dark');
        document.getElementById('userLoginBtn').classList.remove('btn-success');
        document.getElementById('userLoginBtn').classList.add('btn-outline-success');
        this.classList.remove('btn-outline-dark');
    });
</script>
</body>
</html> 