<?php
// Test database connection
require_once 'php/db_connect.php';

// Test session
session_start();
$_SESSION['test'] = 'working';

// Test file paths
$files = [
    'weather.php' => file_exists('weather.php'),
    'shop.php' => file_exists('shop.php'),
    'ask-question.php' => file_exists('ask-question.php'),
    'php/db_connect.php' => file_exists('php/db_connect.php'),
    'php/shop_tools.php' => file_exists('php/shop_tools.php'),
    'css/style.css' => file_exists('css/style.css')
];

// Display results
echo "<h1>System Test Results</h1>";
echo "<pre>";
echo "PHP Version: " . phpversion() . "\n";
echo "Session Working: " . ($_SESSION['test'] === 'working' ? 'Yes' : 'No') . "\n";
echo "Database Connection: " . (isset($pdo) ? 'Yes' : 'No') . "\n\n";
echo "File Check Results:\n";
foreach ($files as $file => $exists) {
    echo $file . ": " . ($exists ? 'Found' : 'Not Found') . "\n";
}
echo "</pre>";

phpinfo();
?> 