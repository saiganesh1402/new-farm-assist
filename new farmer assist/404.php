<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - Page Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 text-center">
                <h1 class="display-1 text-danger">404</h1>
                <h2 class="mb-4">Page Not Found</h2>
                <p class="lead mb-4">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                <a href="index.php" class="btn btn-success btn-lg">Go to Homepage</a>
            </div>
        </div>
    </div>
</body>
</html> 