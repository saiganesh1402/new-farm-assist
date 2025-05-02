<?php
session_start();
require_once 'db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php");
    exit();
}

// Create shop_orders table if it doesn't exist
try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS shop_orders (
        id INT PRIMARY KEY AUTO_INCREMENT,
        user_id INT NOT NULL,
        item_name VARCHAR(100) NOT NULL,
        price DECIMAL(10,2) NOT NULL,
        status ENUM('pending', 'completed', 'cancelled') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    )");
} catch(PDOException $e) {
    die("Error creating shop_orders table: " . $e->getMessage());
}

// Get item from URL parameter
$item = isset($_GET['item']) ? $_GET['item'] : '';

// Define prices for items
$prices = [
    'Plough' => 4500,
    'Irrigation Kit' => 2200,
    'Fertilizer' => 800,
    'Seeds' => 400,
    'Tractor Rental' => 2000
];

// Check if item exists
if (!isset($prices[$item])) {
    header("Location: ../shop.php?error=Invalid item");
    exit();
}

// Process the order
try {
    $stmt = $pdo->prepare("INSERT INTO shop_orders (user_id, item_name, price) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $item, $prices[$item]]);
    
    // Redirect back to shop with success message
    header("Location: ../shop.php?success=Order placed successfully!");
} catch(PDOException $e) {
    header("Location: ../shop.php?error=Error processing order");
}
exit();
?> 