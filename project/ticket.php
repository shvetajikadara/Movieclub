<?php
// Assume $conn is your database connection

if (isset($_GET['movie_id'])) {
    $movie_id = $_GET['movie_id'];
    include '../project/signulogin/connection.php';
    // Query to fetch movie details
    $sqlmovie = mysqli_query($conn, "SELECT * FROM movie WHERE id = $movie_id");

    // Check if movie exists
    if (mysqli_num_rows($sqlmovie) > 0) {
        $moviedetails = mysqli_fetch_assoc($sqlmovie);
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- css -->
            <link rel="stylesheet" href="ticketstyle.css">
            <!-- bootstrap -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

            <!-- icon link -->
            <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
            <!-- script -->
            <script src="ticketscript.js" defer></script>
            <title><?php echo $moviedetails['title']; ?> </title>
        </head>

        <body>
            <div class="main">
                <div class="image"
                    style="background-image: linear-gradient(90deg, black 24.97%, black 38.3%, rgba(26, 26, 26, 0.0409746) 97.47%, #1A1A1A 100%), url('Admin_dashboard/admin/<?php echo $moviedetails['large_poster_path'] ?>');">
                    <div><a href="#" class="preview"><span><i class="lni lni-arrow-left"></i></span></a></div>
                    <script>
                        const prebtn = document.querySelector('.preview');
                        prebtn.addEventListener('click', () => {
                            history.back();
                        })
                    </script>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <img class="movieimg" src="Admin_dashboard/admin/<?php echo $moviedetails['poster_path'] ?>"
                                alt="">
                        </div>
                        <div class="col-lg-6 col-md-6  moviedetail ">
                            <h1 class="moviename text-wrap"><?php echo $moviedetails['title']; ?></h1>
                            <div class="rating"><i class="lni lni-star-fill"></i><?php echo $moviedetails['vote']; ?></div>
                            <div class="movietype"> &nbsp;<?php echo $moviedetails['shows']; ?></div>
                            <div class="movielanguage"> &nbsp;<?php echo $moviedetails['language']; ?></div>
                            <div class="moviedit text-wrap"><?php echo $moviedetails['times'] . " . ";
                                                            echo  $moviedetails['genre'] . " . UA  . ";
                                                            echo $moviedetails['release_date'] ?></div>
                            <div class="moviebtn"><button class="btn"><span>View Trailer</span> <i class="lni lni-video"></i>
                                </button></div>
                        </div>
                    </div>

                </div>
                <form action="" method="post">
                    <div class="container-fluied fix-div">
                        <?php
                        if (isset($_POST['sub'])) {
                            $seatid = $_POST['seat_id'];
                            $payment = $_POST['paym'];
                            $totalticket = $_POST['seat_count'];
                            $cinema = $_POST['cinema'];
                            $mdate = $_POST['mdate'];
                            $mtime = $_POST['mtime'];
                            $phone = $_POST['phone'];
                            $mid = $moviedetails['id'];
                            $mname = $moviedetails['title'];

                            $sql = mysqli_query($conn, "INSERT INTO `tickets` (`phone_no`, `m_id`, `m_name`, `seat_id`, `total_tickets`, `cinema`, `m_date`, `m_time`, `payment`, `ticketbooking_time`) VALUES ('$phone', '$mid','$mname', '$seatid', ' $totalticket', ' $cinema', '$mdate', '$mtime', '$payment', current_timestamp())");
                        }
                        ?>

                        <div class="movietitle container">
                            <h1> <?php echo $moviedetails['title']; ?> </h1>
                            <div class="moviedit text-wrap"><?php echo $moviedetails['times'] . " . ";
                                                            echo  $moviedetails['genre'] . " . UA  . ";
                                                            echo $moviedetails['release_date'] ?></div>
                                                   <div class="moviedit text-wrap"><h5>About the movie</h5><?php echo $moviedetails['about']?> </div>
                        </div>
                        <hr>
                        <div class="moviedate container"></div>
                        <input type="hidden" name="mdate">

                        <div class="movietime container"></div>
                        <input type="hidden" name="mtime">

                        <div class="movieselect container">

                            <select name="cinema" id="cinema">
                                <option value="Cherish Cinemas: Katargam">Cherish Cinemas: Katargam</option>
                                <option value="INOX: DR World, Surat">INOX: DR World, Surat</option>
                                <option value="Raj Imperial, INOX: Varachha Road, Surat">Raj Imperial, INOX: Varachha Road, Surat</option>
                                <option value="INOX: Reliance Mall, Surat">INOX: Reliance Mall, Surat</option>
                            </select>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                        </div>

                    </div>

                    <div class="seat-class container-fluied">


                        <div class="seat-div container">
                            <div class="seat-info">
                                <div class="seat-status">

                                    <div class="status-item">
                                        <label for="selected" style="background-color: rgb(202, 7, 7);"></label>
                                        <span>Selected</span>
                                    </div>
                                    <div class="status-item">
                                        <label for="available" style="border: 2px solid red;"></label>
                                        <span>Available</span>
                                    </div>
                                    <div class="status-item">
                                        <label for="sold" style="background-color: rgb(102, 102, 102);"></label>
                                        <span> Sold</span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="selectseat-info">
                                <div>
                                    Number of selected seats :
                                    <span class="selected-seatno"></span>
                                    <input type="hidden" name="seat_count">

                                </div>
                                <div>

                                    Your Seat id:
                                    <span class="selectseat-name"></span>
                                    <input type="hidden" name="seat_id">


                                </div>
                            </div>


                            <center>

                                <div class="seat-row container">
                                    <table>
                                        <tbody class="seats"></tbody>
                                    </table>
                                </div>
                                <div>
                                    <div class="tv"></div>
                                    <span style="color: rgb(168, 165, 165);">All eyes this way please</span>
                                </div>

                                <div class="paybtn">

                                    <input type="hidden" name="paym">
                                    <button type="button" class="pay" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Pay</button>

                                    <!-- Modal -->

                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content  text-dark">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ticket Conformation</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <span id="india">+91</span>
                                    <input type="text" name="phone" id="phone" pattern="\d{10}" maxlength="10" placeholder="Enter your phone number" class="form-control" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">

                                    <h6>Your Total payment is : <span class="totalpay"></span></h6>
                                    <h6>Scan QR for payment </h6><br>
                                    <div class="scanner">
                                        <img src="scanner.jpeg" alt="" height="100px"><br>
                                        &nbsp;&nbsp;(Scan now)
                                    </div>
                                    <input type="submit" name="sub" value="submit" class="btn btn-danger submit" style="margin-left: 60px;" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content  text-dark">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ticket</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ticketrec">
                                        <table>
                                            <tr>
                                                <td>
                                                    <h1>MOVIE CLUB</h1>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" aria-label="Ok">OK</button>
                                    <button type="button" class="btn btn-danger print">Print</button>

                                </div>

                            </div>
                        </div>
                    </div>
                </form>


        <?php
    } else {
        echo "Movie not found.";
    }
} else {
    echo "Invalid request.";
}
        ?>
        <!--bootstrap script  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('.print').click(function() {
                    window.print();
                });

                let selectedSeats = [];

                $('.seat').click(function() {
                    $(this).toggleClass('select');
                    var id = $(this).attr('id');

                    if ($(this).hasClass('select')) {
                        selectedSeats.push(id);
                    } else {
                        selectedSeats = selectedSeats.filter(seat => seat !== id);
                    }

                    $('.selectseat-name').text(selectedSeats.join(', '));

                    document.getElementsByName('seat_id')[0].value = selectedSeats.join(', ');

                    updateSelectedCount();

                });
                $('.submit').submit(() => {
                    alert('Ticket booked successfully')
                    // window.location.href = 'ticketreciept.html';
                })

                function updateSelectedCount() {
                    var selectedCount = document.querySelectorAll('.select').length;
                    selecetdseatno.innerText = selectedCount + " X " + <?php echo $moviedetails['price']; ?> + "₹";
                    document.getElementsByClassName('totalpay')[0].innerText = "₹" + selectedCount + " X " + <?php echo $moviedetails['price']; ?> + " => " + "₹" + selectedCount * <?php echo $moviedetails['price']; ?>;
                    document.getElementsByName('seat_count')[0].value = selectedCount;
                    pay.innerHTML = "Pay " + selectedCount * <?php echo $moviedetails['price']; ?> + "₹";
                    document.getElementsByName('paym')[0].value = "₹" + selectedCount * <?php echo $moviedetails['price']; ?>;
                    // const ph= document.getElementById('phonno').value();


                }


            });
        </script>
        </body>

        </html>