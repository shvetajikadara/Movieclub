<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("connection.php");

if (isset($_POST['loginbtn'])) {
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "SELECT * FROM signup WHERE username='$username' or email ='$username' ";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;

            // Redirect to welcome.php
            // header("Location: welcome.php");
            exit();
        } else {
            echo '<script>alert("Incorrect password!");</script>';
        }
    } else {
        echo '<script>alert("Username does not exist!");</script>';
    }
}
?>