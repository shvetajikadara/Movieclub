<?php
session_start();
include 'connection.php';

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
                echo '<script>alert("User inserted successfully!");</script>';
                echo '<script>window.location.reload();</script>';
                exit();
            } else {
                echo '<script>alert("Something went wrong! Please try again.");</script>';
            }
        } else {
            echo '<script>alert("Passwords do not match");</script>';
        }
    } else {
        if ($count_user > 0 || $count_email > 0 || $count_phone > 0) {
            echo '<script>alert("UserDeatails(Email,username,phonenumber) already exists!");</script>';
        }
    }
}


if (isset($_POST['delete'])) {
    // Get the ID from the form and sanitize it
    $id = intval($_POST['id']); // Convert to integer to ensure it's a number

    // Create the DELETE query
    $query = "DELETE FROM signup WHERE id = $id";

    // Execute the query
    if (!mysqli_query($conn, $query)) {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
if (isset($_POST['update'])) {
    // Get the ID and updated data from the form
    $id = intval($_POST['id']);
    $username = $_POST['user'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phone'];
    $password = $_POST['pass'];
    // $confirmPassword = $_POST['cpass'];

    // Ensure the passwords match before updating
   
        // Update query
        $query = "UPDATE signup SET username = '$username', email = '$email', phonenumber = '$phonenumber', password = '$password' WHERE id = $id";
        
        // Execute the query
        if (!mysqli_query($conn, $query)) {
            echo "Error updating record: " . mysqli_error($conn);
        }
   
}
// Fetch and display all users
if (isset($_POST['search'])) {
    $search = $_POST['searchval'];
    $sqlshow = mysqli_query($conn, "SELECT * FROM signup  where username like '%$search%'  ORDER BY id ASC");

}else{

    $sqlshow = mysqli_query($conn, "SELECT * FROM signup ORDER BY id ASC");
}
?>



<div class="container">
    <h1 id="head">User Dashboard</h1>
    <div class="userdata">
        <span id="heading">Registered User</span>
        <span id="addbtn">
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add User</button>
        </span>
        <span id="searching">
            <form action="" method="post">           <input type="text" name="searchval" id="searchval"  placeholder="Search username"> <button type="submit" class="btn btn-success" name="search" value="Search">Search</button></form>

        </span>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">User Register Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="form" action="" method="POST">
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
                            <input type="submit" name="signupbtn" id="signupbtn" class="btns btn btn-danger" value="SignUp" />
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <hr>

        <div class="usertable">
            <table class="table table-hover ">
                <thead class="table-danger">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phonenumber</th>
                        <th scope="col" colspan="2">Operations</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    # code...
                    while ($row = mysqli_fetch_array($sqlshow)) {

                    ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phonenumber']; ?></td>

                            <td class="delete">
                                <form method="post" action="" style="display: inline;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                    <!-- Use the button tag to wrap the icon -->
                                    <button type="submit" name="delete" style="border: none; background: none; cursor: pointer;">
                                        <i class="fa-solid fa-trash" style="color: red;"></i> <!-- You can customize the icon's style -->
                                    </button>

                                </form>
                            </td>
                            <td class=" update">
                                <form method="post" action="" style="display: inline;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                    <!-- Use the button tag to wrap the icon -->
                                    <button type="button" style="border: none; background: none; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modal<?php echo $row['id']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <div class="modal fade" id="modal<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modalLabel<?php echo $row['id']; ?>">Update Details for <?php echo $row['username']; ?></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Update form inside the modal -->
                                                    <form name="form" action="" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />

                                                        <label for="user"> Username: </label>
                                                        <input type="text" name="user" value="<?php echo $row['username']; ?>" required><br><br>

                                                        <label for="email"> Email: </label>
                                                        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

                                                        <label for="phone"> Phone Number: </label>
                                                        <input type="number" name="phone" value="<?php echo $row['phonenumber']; ?>" required><br><br>

                                                        <label for="pass"> Change Password: </label>
                                                        <input type="text" name="pass" value="<?php echo htmlspecialchars($row['password']); ?>" required><br><br>

                                                        

                                                        <input type="submit" name="update" id="update" class="btn btn-danger" value="Update" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php

                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
