<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: php/user_login.php");
    exit();
}

// Get messages from URL parameters
$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ask a Question - Farmer Assistant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">🌾 Farmer Assistant</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="ask-question.php">Ask Question</a></li>
                <li class="nav-item"><a class="nav-link" href="weather.php">Weather Info</a></li>
                <li class="nav-item"><a class="nav-link" href="shop.php">Tools Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="php/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Ask a Question Form -->
<div class="container my-5">
    <h2 class="text-center mb-4">Ask Your Farming Question</h2>
    
    <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    
    <?php if ($success): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>

    <form action="php/submit_question.php" method="POST" class="p-4 shadow rounded bg-light">
        <div class="mb-3">
            <label for="farmerName" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="farmerName" name="farmer_name" required>
        </div>
        <div class="mb-3">
            <label for="question" class="form-label">Your Question</label>
            <textarea class="form-control" id="question" name="question" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="language" class="form-label">Select Language</label>
            <select class="form-select" id="language" name="language" required>
                <option selected disabled>Choose Language</option>
                <option value="English">English</option>
                <option value="Hindi">Hindi</option>
                <option value="Marathi">Marathi</option>
                <option value="Telugu">Telugu</option>
                <option value="Tamil">Tamil</option>
                <option value="Kannada">Kannada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success w-100">Submit Question</button>
    </form>
</div>

<!-- Footer -->
<footer class="bg-success text-white text-center p-3">
    <p class="mb-0">&copy; 2025 Farmer Assistant. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 