<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      
    <!-- Icon link -->
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- External JS and CSS -->
    <link rel="stylesheet" href="sidestyle.css">
    <link rel="stylesheet" href="userstyle.css">
    <link rel="stylesheet" href="addmovie.css">
    <link rel="stylesheet" href="historystyle.css">


</head>

<body>

    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button id="toggle-btn" type="button"> <i class="lni lni-grid-alt"></i></button>
                <div class="sidebar-logo">
                    <a href="#">MOVIE CLUB</a>
                </div>
          
            </div>
            <div class="profile">
            <img src="https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o=" alt="">
            </div>
            <hr>
            <ul class="sidebar-nav">

                <li class="sidebar-item">
                    <a href="?page=home" class="sidebar-link navlink" data-page="home.php"><i class="lni lni-home"></i>
                        <span>Home</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="?page=viewuser" class="sidebar-link navlink">
                        <i class="lni lni-protection"></i><span>User Details</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"
                        data-bs-target="#movie" aria-expanded="false" aria-controls="auth"><i class="lni lni-video"></i>
                        <span>Movie Details</span></a>
                    <ul id="movie" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item dlink">
                            <a href="?page=addmovie" class="sidebar-link ">
                                <i class="lni lni-plus"></i> <span>ADD Movie</span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="?page=history" class="sidebar-link navlink" data-page="history.php"><i class="lni lni-support"></i>
                        <span>History</span></a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link"><i class="lni lni-popup"></i>
                        <span>Notification</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link"><i class="lni lni-cog"></i>
                        <span>Setting</span></a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="../../signulogin/logout.php" class="sidebar-link"><i class="lni lni-exit"></i>
                    <span>Logout</span></a>
            </div>
        </aside>
        <div class="main p-3" id="content">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : '';

            switch ($page) {
                
                case 'viewuser':
                    include('viewuser.php');
                    break;
                case 'addmovie':
                    include('addmovie.php');
                    break;
                case 'history':
                    include('history.php');
                    break;
                default:
                include('home.php');
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
