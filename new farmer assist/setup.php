<?php
require_once 'php/db_connect.php';

// Create default admin account
$admin_username = 'admin';
$admin_password = password_hash('admin123', PASSWORD_DEFAULT);

try {
    // Check if admin exists
    $stmt = $pdo->prepare("SELECT id FROM admins WHERE username = ?");
    $stmt->execute([$admin_username]);
    
    if ($stmt->rowCount() == 0) {
        // Create admin account
        $stmt = $pdo->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
        $stmt->execute([$admin_username, $admin_password]);
        echo "Admin account created successfully!<br>";
        echo "Username: admin<br>";
        echo "Password: admin123<br>";
    } else {
        echo "Admin account already exists.<br>";
    }
    
    echo "Database setup completed successfully!<br>";
    echo "You can now <a href='index.php'>go to the homepage</a> or <a href='admin_login.php'>login as admin</a>.";
    
} catch(PDOException $e) {
    die("Setup failed: " . $e->getMessage());
}
?> 