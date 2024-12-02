<?php
// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection
include("signulogin/connection.php");

if (isset($_POST['loginbtn'])) {
    // Sanitize inputs
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    // Check admin credentials
    $sqladmin = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
    $resultadmin = mysqli_fetch_assoc($sqladmin);

    // Check user credentials
    $sqluser = mysqli_query($conn, "SELECT * FROM signup WHERE username='$username' or email ='$username' ");
    $resultuser = mysqli_fetch_assoc($sqluser);

    if ($resultadmin ) {

        if ($resultadmin['password'] === $password) {
            // Redirect to admin dashboard
            header("Location: Admin_dashboard/admin/sidebar.php");
            exit(); // Ensure no further code is executed
        } else {
            echo '<script>alert("Incorrect admin password!");</script>';
        }
    } elseif ($resultuser) {

        if (mysqli_num_rows($sqluser) == 1) {
            // $row = mysqli_fetch_assoc($resultuser);
            if (password_verify($password, $resultuser['password'])) {
                // Set session variables
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $resultuser['username'];
                $_SESSION['phonenumber'] = $resultuser['phonenumber'];

                // Redirect to welcome page
                header("Location: index.php");
                exit(); // Ensure no further code is executed
            } else {
                echo '<script>alert("Incorrect password!");</script>';
            }
        } else {
            echo '<script>alert("Username does not exist!");</script>';
        }
    } else {
        echo '<script>alert("Username does not exist!");</script>';
    }
}
?>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="form">
                    <h2 id="heading"><span><i class="lni lni-unlock"></i></span> Login Your Account</h2>
                    <br>
                    <form name="form" id="loginform" action="" method="POST" required>
                        <label for="user">Enter Username/Email: </label>
                        <input type="text" id="user" name="user"></br></br>
                        <label for="pass">Password: </label>
                        <input type="password" id="pass" name="pass" required></br></br>

                        <input type="checkbox" name="rem" id="rem" value="rem">
                        <label for="rem">Remember me</label>
                        <a href="#" class="forget">Forget password?</a><br><br>
                        <input type="submit" id="loginbtn" value="Login" class="btns" name="loginbtn" />
                        <a href="signulogin/signup.php" class="create">Create a new Account</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>