<?php
// Start a session if none is active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../project/signulogin/connection.php';

// Check if the user is logged in; if not, set a flag to trigger the modal
$showLoginModal = !isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true;

// Initialize $sql variable and visibility flags
$sql = null;
$showEmptyImage = $showLoginModal;
$showTickets = !$showLoginModal;

// Only execute the query if the user is logged in and the session contains the phone number
if (!$showLoginModal && isset($_SESSION['phonenumber'])) {
    $phonenumber = $_SESSION['phonenumber'];

    // Construct the SQL query to fetch the tickets associated with the logged-in user's phone number
    $query = "SELECT t.* FROM tickets t INNER JOIN signup s ON t.phone_no = s.phonenumber WHERE s.phonenumber = '$phonenumber'";

    $sql = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$sql) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Update visibility flags
    $showEmptyImage = false;
    $showTickets = mysqli_num_rows($sql) > 0;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    
    <!-- css, bootstrap, and other resources -->
    <link rel="stylesheet" href="ticketstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="navstyle.css">
    <link rel="stylesheet" href="signulogin/signuplogin.css">
    <link rel="stylesheet" href="historystyle.css">
    <link rel="stylesheet" href="footerstyle.css">

    <title><?php echo $_SESSION['username'] ?> Ticket History</title>
</head>

<body>

    <?php include 'nav.php'; ?>

    <?php if ($showLoginModal): ?>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                var loginModal = new bootstrap.Modal(document.getElementById("staticBackdrop"));
                loginModal.show();
                document.querySelector('.ticketrec').classList.add('d-none');
                document.querySelector('.empty').classList.remove('d-none');
            });
        </script>
    <?php else: ?>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector('.ticketrec').classList.remove('d-none');
                document.querySelector('.empty').classList.add('d-none');
            });
        </script>
    <?php endif; ?>

    <div class="container ticketpage">
        <h2>Tickets History</h2>
        <hr>
    </div>

    <?php if ($showTickets && $sql): ?>
        <?php while ($row = mysqli_fetch_array($sql)): ?>
            <div class="container ticketrec">
                <table>
                    <tr>
                        <td><img src="https://cdn.prod.website-files.com/62b4c5fb2654ca30abd9b38f/651fa17bbbad4c45d561dcbf_vertical%20barcode.png" alt=""></td>
                        <td class="ticketinfo">
                            <h1>MOVIE CLUB</h1>
                            <span><?php echo $row['m_name']; ?></span><br>
                            <div class="ticketdetail">
                                <span>Total &nbsp;<span class="tshow"><?php echo $row['total_tickets']; ?></span></span>
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <span>Seat_id <span class="tshow"><?php echo $row['seat_id']; ?></span>&nbsp; &nbsp; &nbsp;</span><br>
                                <span>Date <span class="tshow"><?php echo $row['m_date']; ?></span>&nbsp; &nbsp; &nbsp;</span><br>
                                <span>Time <span class="tshow"><?php echo $row['m_time']; ?></span>&nbsp; &nbsp; &nbsp;</span><br>
                                <span>Price <span class="tshow"><?php echo $row['payment']; ?></span>&nbsp; &nbsp; &nbsp;</span>
                                &nbsp; &nbsp; &nbsp; <span>No <span class="tshow"><?php echo $row['phone_no']; ?></span></span>
                            </div>
                        </td>
                        <td class="line"><img src="https://upload.wikimedia.org/wikipedia/commons/3/32/Dotted-line.png" alt=""></td>
                        <td class="ticketslip">
                            <span class="movie_name"><?php echo $row['m_name']; ?></span><br>
                            <span>Screen 1</span><br>
                            <span>Seats <?php echo $row['total_tickets']; ?> - <?php echo $row['seat_id']; ?></span><br>
                            <img src="32-main-barcode-removebg-preview.png" alt=""><br>
                            <span>Date <?php echo $row['m_date']; ?></span><br>
                            <span>Time <?php echo $row['m_time']; ?></span><br>
                        </td>
                    </tr>
                </table>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

    <div class="empty">
        <img src="empty.png" alt="">
    </div>
    <script>
        $(document).ready(function() {
            $('#rem').change(function() {
                if (this.checked) {
                    $("#loginbtn").attr("disabled", false);
                } else {
                    $("#loginbtn").attr("disabled", true);
                }

            })
        });
    </script>

    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>