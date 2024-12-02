<?php
session_start();
session_unset();
session_destroy();
header("Location: ../index.php"); // Redirect to your login page (e.g., index.php)
exit();
?>
<h1>you are log out</h1>

