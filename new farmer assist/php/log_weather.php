<?php
session_start();
require_once 'db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}

// Get JSON data
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid data']);
    exit();
}

try {
    $stmt = $pdo->prepare("INSERT INTO weather_logs (user_id, city, temperature, humidity, wind_speed, description) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_SESSION['user_id'],
        $data['city'],
        $data['temperature'],
        $data['humidity'],
        $data['wind_speed'],
        $data['description']
    ]);
    
    echo json_encode(['success' => true]);
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error']);
}
?> 