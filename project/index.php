<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Club</title>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <!-- icon link -->
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <!-- bootsrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- owl carousal cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- javascript -->
    <script src="mainscript.js" defer></script>
    <!-- stylesheet -->
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="navstyle.css">
    <link rel="stylesheet" href="signulogin/signuplogin.css">
    <!--footer style -->
    <link rel="stylesheet" href="footerstyle.css">
</head>

<body>
    <?php
    include 'nav.php';
    // Include your database connection
    $sqlshow = mysqli_query($conn, "SELECT * FROM movie ");  // Adjust the query to show recent movies
    ?>
    <!-- carousel -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php while ($row = mysqli_fetch_assoc($sqlshow)) { ?>
                <?php $active = true; ?>
                <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                    <div class="main">
                        <div class="image" style="background-image: linear-gradient(90deg, black 24.97%, black 38.3%, rgba(26, 26, 26, 0.0409746) 97.47%, #1A1A1A 100%), url('Admin_dashboard/admin/<?php echo $row['large_poster_path'] ?>');">
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                                    <img class="movieimg col-12 col-lg-6 col-md-6 col-sm-6" src="Admin_dashboard/admin/<?php echo $row['poster_path'] ?>" alt="">
                                </div>
                                <div class="col-12 col-lg-6 col-md-6 col-sm-6 movieinfo">
                                    <h1 class="moviename"><?php echo $row['title']; ?></h1>
                                    <div class="rating"><i class="lni lni-star-fill"></i><?php echo $row['vote']; ?></div>
                                    <div class="movietype"> &nbsp;<?php echo $row['shows']; ?></div>
                                    <div class="moviedit"><?php echo $row['times'] . " . ";
                                                            echo  $row['genre'] . " . UA  . ";
                                                            echo $row['release_date'] ?></div>
                                    <a href="ticket.php?movie_id=<?php echo $row['id']; ?>" class="btn moviebtn">Book Ticket</a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            <?php } ?>
            <?php  //$active = false; ?> 

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- carousel end -->


    <!-- movie slider -->
    <div class="container-fluid movieslider">
        <div class="heading">
            Latest movies
            <hr>
        </div>
        <div class="container slider">
            <div class="row ">
                <div class="owl-carousel owl-theme">
                    <?php
                    $sqlshowcard = mysqli_query($conn, "SELECT * FROM movie");  // Adjust the query to show recent movies

                    while ($rowc = mysqli_fetch_assoc($sqlshowcard)) { ?>
                        <div class="item">
                            <div class="card ">
                                <div class="card-body p-0 m-0 text-center">
                                    <img src="Admin_dashboard/admin/<?php echo $rowc['poster_path'] ?>"
                                        class="card-img-top cardimg" height="300px" alt="">
                                    <a href="ticket.php?movie_id=<?php echo $rowc['id']; ?>" class="btnbooking">Book Ticket</a>
                                    <!-- <button class="btnbooking">Book Ticket</button> -->
                                    <h5 class="mname"><?php echo $rowc['title']; ?></h5>
                                    <hr>
                                    <!-- <span class="type"><?php //echo $rowc['genre']; 
                                                            ?></span> -->
                                    <span class="rating"><i class="lni lni-star-fill"></i> <?php echo $rowc['vote']; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

    <?php
    include  'footer.php';
    ?>
    <!-- bootsrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- owl carousel js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        $('#rem').change(function() {
            if (this.checked) {
                $("#loginbtn").attr("disabled", false);
            } else {
                $("#loginbtn").attr("disabled", true);
            }

        })
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop: true,
            nav: true,
            margin: 20,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                960: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        });
        owl.on('mousewheel', '.owl-stage', function(e) {
            if (e.deltaY > 0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        });
    </script>



    
</body>

</html>