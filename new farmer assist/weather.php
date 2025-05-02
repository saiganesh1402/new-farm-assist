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
    <title>Weather Forecast - Farmer Assistant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="index.php">🌾 Farmer Assistant</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="ask-question.php">Ask Question</a></li>
                <li class="nav-item"><a class="nav-link active" href="weather.php">Weather Info</a></li>
                <li class="nav-item"><a class="nav-link" href="shop.php">Tools Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="php/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Weather Section -->
<section class="py-5" style="background: linear-gradient(#e0f7fa, #ffffff);">
    <div class="container text-center">
        <h1 class="mb-4">☀️ Today's Weather Forecast</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <h3 id="cityName">City Name</h3>
                    <h1 id="temperature">--°C</h1>
                    <p id="description">Weather Description</p>
                    <p id="humidity">Humidity: --%</p>
                    <p id="wind">Wind Speed: -- km/h</p>

                    <div class="mt-4">
                        <input type="text" id="cityInput" class="form-control mb-3" placeholder="Enter City Name">
                        <button onclick="getWeather()" class="btn btn-success w-100">🔍 Get Weather</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-success text-white text-center p-3 mt-5">
    <p class="mb-0">&copy; 2025 Farmer Assistant. All Rights Reserved.</p>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
const apiKey = "0200315732859944605e3dc6db903281"; // Replace with your OpenWeatherMap API key

async function getWeather() {
    const city = document.getElementById('cityInput').value;
    if (!city) {
        alert("Please enter a city name!");
        return;
    }

    const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`;

    try {
        const response = await fetch(url);
        if (!response.ok) {
            alert("City not found! Please try again.");
            return;
        }
        const data = await response.json();
        
        // Update the card
        document.getElementById('cityName').innerText = data.name;
        document.getElementById('temperature').innerText = `${Math.round(data.main.temp)}°C`;
        document.getElementById('description').innerText = data.weather[0].description;
        document.getElementById('humidity').innerText = `Humidity: ${data.main.humidity}%`;
        document.getElementById('wind').innerText = `Wind Speed: ${data.wind.speed} km/h`;

        // Log weather search
        try {
            const logResponse = await fetch('php/log_weather.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    city: data.name,
                    temperature: data.main.temp,
                    humidity: data.main.humidity,
                    wind_speed: data.wind.speed,
                    description: data.weather[0].description
                })
            });
        } catch (error) {
            console.error('Error logging weather:', error);
        }

    } catch (error) {
        console.error("Error fetching weather:", error);
        alert("Something went wrong. Try again later.");
    }
}

// Get weather for default city on page load
window.onload = function() {
    document.getElementById('cityInput').value = 'Mumbai';
    getWeather();
}
</script>

</body>
</html> 