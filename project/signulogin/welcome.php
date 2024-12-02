<?php
// Start a session if none is active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in; if not, redirect to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ..\index.php"); // Redirect to your login page (e.g., index.php)
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script>
        window.onload = function() {
            alert("Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!");
        };
    </script>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>You are now logged in.</p>
    <p><a href="..\signulogin\logout.php">Logout</a></p> <!-- Provide a link to log out -->
</body>
</html>
