<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';
    
    try {
        // Create contacts table if it doesn't exist
        $pdo->exec("CREATE TABLE IF NOT EXISTS contacts (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            subject VARCHAR(200) NOT NULL,
            message TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
        
        // Insert the contact message
        $stmt = $pdo->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $subject, $message]);
        
        // Redirect back with success message
        $_SESSION['success_message'] = "Your message has been sent successfully! We'll get back to you soon.";
        header("Location: ../contact.php");
        exit();
        
    } catch(PDOException $e) {
        $_SESSION['error_message'] = "Sorry, there was an error sending your message. Please try again later.";
        header("Location: ../contact.php");
        exit();
    }
} else {
    header("Location: ../contact.php");
    exit();
}
?> 