<?php
 include('login2.php')
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
                        <input type="submit" id="loginbtn" value="Login" class="btns" name="loginbtn" disabled />
                        <a href="signup.php" class="create">Create a new Account</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>