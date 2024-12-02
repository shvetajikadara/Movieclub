<?php include 'connection.php';

//  $query = "SELECT t.*,s.username FROM tickets t INNER JOIN signup s ON t.phone_no = s.phonenumber  ;";

$query = "SELECT * FROM tickets";
$sql = mysqli_query($conn, $query);
?>
<div class="container">
    <h1 id="head">Tickets History</h1>
    <div class="moviedata">
        <span id="heading">Show Tickets Details</span>
        <hr>
        <table class="table table-hover">
            <thead class="table-danger">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">phone_no</th>
                    <th scope="col">M_id</th>
                    <th scope="col">M_name</th>
                    <th scope="col">Seat_id</th>
                    <th scope="col">Total tickets</th>
                    <th scope="col">cinema name</th>
                    <th scope="col">movie date</th>
                    <th scope="col">Movie Time</th>
                    <th scope="col">Payment Amount</th>
                    <th scope="col">Ticket booking time</th>
                    <th scope="col" colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($sql)) { ?>
                    <tr>
                        <td><?php echo $row['no']; ?></td>
                        <th scope="row"><?php echo $row['phone_no']; ?></th>
                        <td><?php echo $row['m_id']; ?></td>
                        <td><?php echo $row['m_name']; ?></td>
                        <td><?php echo $row['seat_id']; ?></td>
                        <td><?php echo $row['total_tickets']; ?></td>
                        <td><?php echo $row['cinema']; ?></td>
                        <td><?php echo $row['m_date']; ?></td>
                        <td><?php echo $row['m_time']; ?></td>
                        <td><?php echo $row['payment']; ?></td>
                        <td><?php echo $row['ticketbooking_time']; ?></td>

                        <td class="delete"><i class="fa-solid fa-trash"></i></td>
                        <td class="update"><i class="fas fa-edit"></i></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- <div class="container ticketrec">
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
        <?php //endwhile; 
        ?> -->

</div>