<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';

try {
    // First connect without database
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS farmer_assistant");
    
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=farmer_assistant", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Create admins table if it doesn't exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS admins (
        id INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
    // Create users table if it doesn't exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Create questions table if it doesn't exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS questions (
        id INT PRIMARY KEY AUTO_INCREMENT,
        user_id INT NOT NULL,
        farmer_name VARCHAR(100) NOT NULL,
        question TEXT NOT NULL,
        language VARCHAR(50) NOT NULL,
        status ENUM('pending', 'answered') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    )");

    // Create weather_logs table if it doesn't exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS weather_logs (
        id INT PRIMARY KEY AUTO_INCREMENT,
        user_id INT NOT NULL,
        city VARCHAR(100) NOT NULL,
        temperature DECIMAL(5,2) NOT NULL,
        humidity INT NOT NULL,
        wind_speed DECIMAL(5,2) NOT NULL,
        description VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    )");
    
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?> 