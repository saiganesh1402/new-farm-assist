<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: php/admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Farmer Assistant</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-seedling me-2"></i>Farmer Assistant
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-home me-1"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-users me-1"></i>Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-cog me-1"></i>Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/logout.php"><i class="fas fa-sign-out-alt me-1"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="row">
            <!-- Welcome Card -->
            <div class="col-12 mb-4">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <h2 class="card-title">Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?>!</h2>
                        <p class="card-text">You are logged in as an administrator.</p>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="col-md-4 mb-4">
                <div class="card dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-3x text-success mb-3"></i>
                        <h3 class="card-title">Total Users</h3>
                        <p class="display-4">0</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-chart-line fa-3x text-success mb-3"></i>
                        <h3 class="card-title">Active Sessions</h3>
                        <p class="display-4">0</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card dashboard-card">
                    <div class="card-body text-center">
                        <i class="fas fa-clock fa-3x text-success mb-3"></i>
                        <h3 class="card-title">Last Login</h3>
                        <p class="display-4">-</p>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="col-12">
                <div class="card dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Recent Activity</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Activity</th>
                                        <th>User</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="text-center">No recent activity</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 Farmer Assistant. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 