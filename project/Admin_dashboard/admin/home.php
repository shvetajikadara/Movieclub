<?php
include '../../signulogin/connection.php';

// Query to get the count of records
$userc = mysqli_query($conn,"SELECT COUNT(*) AS count FROM signup");
$moviec = mysqli_query($conn,"SELECT COUNT(*) AS count FROM movie");
$ticketc = mysqli_query($conn,"SELECT COUNT(*) AS count FROM tickets");

// Fetch the result
$rowu= mysqli_fetch_assoc($userc);
$countu = $rowu['count'];
$rowm = mysqli_fetch_assoc($moviec);
$countm = $rowm['count'];
$rowt = mysqli_fetch_assoc($ticketc);
$countt = $rowt['count'];
// Close the connection
mysqli_close($conn);
?>

<h3 class="homeh1">Welcome to Home</h3>
<hr>
<div class="home">
    <div class="userdata bg-success">
        <span class="usercount"><?php echo $countu; ?></span>
        <span><img src="user.png" alt=""></span>
        <h1>Total Users</h1>
        <a href="?page=viewuser" class="a" data-page="viewuser.php" >more Details ...</a>
    </div>
    <div class="moviesdata bg-info">
        <span class="usercount"><?php echo $countm; ?></span>
        <span><img src="movie.png" alt=""></span>
        <h1>Total Movie</h1>
        <a href="" class="a" >more Details ...</a>

    </div>
    <div class="ticketdata bg-warning"><span class="usercount"><?php echo $countt; ?></span>
        <span><img src="ticket.png" alt=""></span>
        <h1>Total Tickets</h1>
        <a class="a" href="">more Details ...</a>

    </div>
</div>