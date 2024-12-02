<?php
session_start();
// if (isset($_SESSION['username'])) {
//     header("Location: welcome.php");
//     exit();
// }
include("connection.php");

if (isset($_POST['signupbtn'])) {
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpass']);

    $sql = "SELECT * FROM signup WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $count_user = mysqli_num_rows($result);

    $sql = "SELECT * FROM signup WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    $sql = "SELECT * FROM signup WHERE phonenumber='$phone'";
    $result = mysqli_query($conn, $sql);
    $count_phone = mysqli_num_rows($result);

    if ($count_user == 0 && $count_email == 0 && $count_phone == 0) {
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `signup` (`username`, `email`, `phonenumber`, `password`) VALUES('$username', '$email','$phone', '$hash')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>
                        alert("Welcome to our movie club!");
                        window.location.href = "../index.php";
                      </script>';
                exit();
            } else {
                echo '<script>alert("Something went wrong! Please try again.");</script>';
            }
        } else {
            echo '<script>alert("Passwords do not match");
                        window.location.href = "signup.php";
            
            </script>';
        }
    } else {
        if ($count_user > 0) {
            echo '<script>alert("Username already exists!");
                        window.location.href = "signup.php";            
            </script>';
        }
        if ($count_email > 0) {
            echo '<script>alert("Email already exists!");
                        window.location.href = "signup.php";
            </script>';
        }
        if ($count_phone > 0) {
            echo '<script>alert("Phone number already exists!");
                        window.location.href = "signup.php";
            </script>';
        }
    }
}
?>
