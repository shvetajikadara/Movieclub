<?php
include('login.php');
// $_SESSION['username'] = '';
// include('upload.php');
?>

<nav class="navbar navbar-expand-lg roboto-bold ">
    <div class="container-fluid">
        <a class="navbar-brand me-auto" href=""><img src="logo.png" alt="">MOVIE CLUB</a>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-danger" id="offcanvasNavbarLabel">MOVIE CLUB</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="history.php">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="#">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="signulogin/signup.php">Register</a>
                    </li>
                    <li class="nav-item">

                    </li>
                </ul>
            </div>
        </div>
        <div class="profile">
            <ul class="navbar-nav justify-content-center pe-3">
                <li class="nav-item dropdown text-white">
                    <div class="photo">
                        <img id="profileImage" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" alt="Profile Picture">
                    </div>
                    <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                    <?php if (isset($_SESSION['username']) && $_SESSION['username'] != ''): ?>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <h5 class="text-center text-danger"><?php echo htmlspecialchars($_SESSION['username']); ?></h5>
                            <hr>
                            <li><a class="dropdown-item" href="#" onclick="document.getElementById('fileInput').click();">Profile Photo</a></li>
                            <li><a class="dropdown-item" href="signulogin/signup.php">Add Account</a></li>
                            <li><a class="dropdown-item" href="signulogin/logout.php"> <i class="lni lni-exit"></i> &nbsp;Logout</a></li>
                        </ul>
                    <?php endif; ?>
                    <input type="file" id="fileInput" style="display:none;" onchange="previewImage();" />
                </li>
            </ul>
        </div>


        <a href="#" class="login-button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Login</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<script>
    function previewImage() {
        var file = document.getElementById('fileInput').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            document.getElementById('profileImage').src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>