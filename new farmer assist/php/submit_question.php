<?php
session_start();
require_once 'db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php");
    exit();
}

// Create questions table if it doesn't exist
try {
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
} catch(PDOException $e) {
    die("Error creating questions table: " . $e->getMessage());
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $farmer_name = trim($_POST['farmer_name']);
    $question = trim($_POST['question']);
    $language = $_POST['language'];
    $user_id = $_SESSION['user_id'];

    if (empty($farmer_name) || empty($question) || empty($language)) {
        $error = "All fields are required";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO questions (user_id, farmer_name, question, language) VALUES (?, ?, ?, ?)");
            $stmt->execute([$user_id, $farmer_name, $question, $language]);
            $success = "Your question has been submitted successfully!";
        } catch(PDOException $e) {
            $error = "Error submitting question: " . $e->getMessage();
        }
    }
}

// Redirect back to ask question page with message
if ($error) {
    header("Location: ../ask-question.php?error=" . urlencode($error));
} else {
    header("Location: ../ask-question.php?success=" . urlencode($success));
}
exit();
?> 