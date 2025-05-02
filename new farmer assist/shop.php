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
    <title>Shop - Farmer Assistant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Additional Custom Styles */
        .card-img-top {
            height: 220px;
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 15px;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .btn-success {
            border-radius: 50px;
        }
        h2 {
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="index.php">🌾 Farmer Assistant</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="ask-question.php">Ask Question</a></li>
                <li class="nav-item"><a class="nav-link" href="weather.php">Weather Info</a></li>
                <li class="nav-item"><a class="nav-link active" href="shop.php">Tools Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="php/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Shop Section -->
<div class="container my-5">
    <h2 class="text-center mb-5">🛒 Farming Tools Shop</h2>
    
    <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    
    <?php if ($success): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>

    <div class="row g-4">
        <!-- Tool 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <img src="images/plough.jpg" class="card-img-top" alt="Plough">
                <div class="card-body text-center">
                    <h5 class="card-title">Heavy Duty Plough</h5>
                    <p class="card-text">Best for soil preparation and field tilling.</p>
                    <p class="text-success fw-bold">₹4,500</p>
                    <a href="php/shop_tools.php?item=Plough" class="btn btn-success w-100">Buy Now</a>
                </div>
            </div>
        </div>

        <!-- Tool 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <img src="images/drip_irrigation_kit.webp" class="card-img-top" alt="Irrigation Kit">
                <div class="card-body text-center">
                    <h5 class="card-title">Drip Irrigation Kit</h5>
                    <p class="card-text">Save water and improve crop yield efficiently.</p>
                    <p class="text-success fw-bold">₹2,200</p>
                    <a href="php/shop_tools.php?item=Irrigation Kit" class="btn btn-success w-100">Buy Now</a>
                </div>
            </div>
        </div>

        <!-- Tool 3 -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <img src="images/organic_fertilizer.webp" class="card-img-top" alt="Fertilizer">
                <div class="card-body text-center">
                    <h5 class="card-title">Organic Fertilizer</h5>
                    <p class="card-text">Boost your soil health with natural fertilizers.</p>
                    <p class="text-success fw-bold">₹800</p>
                    <a href="php/shop_tools.php?item=Fertilizer" class="btn btn-success w-100">Buy Now</a>
                </div>
            </div>
        </div>

        <!-- Tool 4 -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <img src="images/HYV_seeds.jpeg" class="card-img-top" alt="Seeds">
                <div class="card-body text-center">
                    <h5 class="card-title">High Yield Seeds</h5>
                    <p class="card-text">Certified seeds for higher productivity.</p>
                    <p class="text-success fw-bold">₹400</p>
                    <a href="php/shop_tools.php?item=Seeds" class="btn btn-success w-100">Buy Now</a>
                </div>
            </div>
        </div>

        <!-- Tool 5 -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <img src="images/tractor.jpeg" class="card-img-top" alt="Tractor Rental">
                <div class="card-body text-center">
                    <h5 class="card-title">Tractor Rental (1 Day)</h5>
                    <p class="card-text">Rent a tractor for your heavy-duty fieldwork.</p>
                    <p class="text-success fw-bold">₹2,000</p>
                    <a href="php/shop_tools.php?item=Tractor Rental" class="btn btn-success w-100">Book Now</a>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Footer -->
<footer class="bg-success text-white text-center p-3 mt-5">
    <p class="mb-0">&copy; 2025 Farmer Assistant. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 