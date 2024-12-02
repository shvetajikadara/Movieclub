<?php include('signup2.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="signuplogin.css">
    <!-- icon link -->
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
</head>

<body class="signupbody">
    <div class="container signupmain">
        <div><a href="#" class="preview"><span><i class="lni lni-arrow-left"></i></span></a></div>
        <script>
            const prebtn = document.querySelector('.preview');
            prebtn.addEventListener('click', () => {
                history.back();
            })
        </script>
        <div class="loginimage"><img src="https://img.freepik.com/free-vector/sign-concept-illustration_114360-125.jpg" alt=""></div>
        <div id="form signup">
            <h1 id="heading">Create Your Account <h6 id="sub">Already have an Account <a href="#" class="already " data-bs-toggle="modal" data-bs-target="#staticBackdrop">Login</a></h6>
            </h1><br>
            <form name="form" action="signup2.php" method="POST">
                <label for="user">Enter Username: </label>
                <input type="text" id="user" name="user" required><br><br>
                <label for="email">Enter Email: </label>
                <input type="email" id="email" name="email" required><br><br>
                <label for="phone">Phone number </label>
                <input type="number" id="phone" name="phone" required><br><br>
                <label for="pass">Create Password: </label>
                <input type="password" id="pass" name="pass" required><br><br>
                <label for="cpass">Retype Password: </label>
                <input type="password" id="cpass" name="cpass" required><br><br />
                <input type="checkbox" name="term" id="term" value="term">
                <label for="term"><span id="sub">I agree Platforms<a href="#" class="already"> Terms of Services </a> and <a href="#" class="already">Privacy Policy </a></label><br><br>
                <input type="submit" id="signupbtn" class="btns" value="SignUp" name="signupbtn" disabled />
            </form>
        </div>
    </div>
    <?php
    include 'login.php';
    ?>  

    <!-- jquery for chech box checked -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(() => {
            // $('#signupbtn').hover(()=>{
            //     alert('you hover');
            // })
            $('#term').change(function() {
                if (this.checked) {
                    $('#signupbtn').attr("disabled", false);
                    // $('#signupbtn').css("background-color","rgb(202, 7, 7)");

                } else {
                    $('#signupbtn').attr("disabled", true);
                }

            })
            $('#rem').change(function() {
                if (this.checked) {
                    $("#loginbtn").attr("disabled", false);
                } else {
                    $("#loginbtn").attr("disabled", true);
                }

            })


        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>