<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: php/user_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Farmer Assistant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">🌾 Farmer Assistant</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="ask-question.php">Ask Question</a></li>
                <li class="nav-item"><a class="nav-link" href="weather.php">Weather Info</a></li>
                <li class="nav-item"><a class="nav-link" href="shop.php">Tools Shop</a></li>
                <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="php/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contact Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Contact Information -->
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Contact Information</h3>
                        <div class="mb-3">
                            <h5>Admin Contact</h5>
                            <p><i class="fas fa-envelope me-2"></i> <a href="mailto:saiganesh_maguluri@srmap.edu.in">saiganesh_maguluri@srmap.edu.in</a></p>
                        </div>
                        <div class="mb-3">
                            <h5>Working Hours</h5>
                            <p><i class="fas fa-clock me-2"></i> Monday - Friday: 9:00 AM - 5:00 PM</p>
                        </div>
                        <div class="mb-3">
                            <h5>Location</h5>
                            <p><i class="fas fa-map-marker-alt me-2"></i> SRM University AP, Andhra Pradesh</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Send us a Message</h3>
                        <form action="php/submit_contact.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-success text-white text-center p-4">
    <div class="container">
        <p class="mb-2">Reach out to <a href="mailto:saiganesh_maguluri@srmap.edu.in" class="text-white">saiganesh_maguluri@srmap.edu.in</a> for queries</p>
        <p class="mb-2">Let's together improve farming practices and support our farmers!</p>
        <p class="mb-0">&copy; 2025 Farmer Assistant. All Rights Reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 