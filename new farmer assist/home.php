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
    <title>Farmer Assistant</title>
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
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="php/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero text-center text-dark d-flex align-items-center" style="background-image: url('images/farm-hero.jpg'); background-size: cover; height: 90vh;">
    <div class="container">
        <h1 class="display-4">Empowering Farmers with Knowledge & Tools</h1>
        <p class="lead mt-3">Ask questions, get weather updates, expert advice, and shop farming tools — all in your local language!</p>
        <a href="ask-question.php" class="btn btn-warning btn-lg mt-4">Get Started</a>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Ask a Question</h5>
                        <p class="card-text">Submit your farming questions in your own language and get expert answers.</p>
                        <a href="ask-question.php" class="btn btn-success">Ask Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Weather Info</h5>
                        <p class="card-text">Receive up-to-date weather information to plan your farming activities.</p>
                        <a href="weather.php" class="btn btn-success">View Weather</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Tools Shop</h5>
                        <p class="card-text">Find the best tools and equipment for your farming needs at affordable prices.</p>
                        <a href="shop.php" class="btn btn-success">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Weather Widget -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Current Weather</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div id="weather-widget" class="text-center">
                            <div class="spinner-border text-success" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
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
<script>
// Weather API Integration
const weatherWidget = document.getElementById('weather-widget');
const apiKey = '0200315732859944605e3dc6db903281'; // Replace with your actual API key

async function getWeather() {
    try {
        const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=Mumbai&appid=${apiKey}&units=metric`);
        const data = await response.json();
        
        weatherWidget.innerHTML = `
            <h3>${data.name}</h3>
            <div class="display-4">${Math.round(data.main.temp)}°C</div>
            <p>${data.weather[0].description}</p>
            <div class="row">
                <div class="col-6">
                    <p>Humidity: ${data.main.humidity}%</p>
                </div>
                <div class="col-6">
                    <p>Wind: ${data.wind.speed} m/s</p>
                </div>
            </div>
        `;
    } catch (error) {
        weatherWidget.innerHTML = '<p class="text-danger">Error loading weather data</p>';
    }
}

getWeather();
</script>
</body>
</html> 