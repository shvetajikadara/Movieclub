<?php
include '..\..\signulogin\connection.php';  // Include your database connection

if (isset($_POST['addmoviebtn'])) {
    // Sanitize and validate other inputs
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['tittle']);
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $vote = mysqli_real_escape_string($conn, $_POST['vote']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $release_date = mysqli_real_escape_string($conn, $_POST['date']);
    $director = mysqli_real_escape_string($conn, $_POST['director']);
    $actors = mysqli_real_escape_string($conn, $_POST['actors']);
    $shows = mysqli_real_escape_string($conn, $_POST['shows']);
    $language = mysqli_real_escape_string($conn, $_POST['language']);
    $times = mysqli_real_escape_string($conn, $_POST['times']);
    $about = mysqli_real_escape_string($conn, $_POST['about']);

    // Check if the poster file is uploaded
    if (isset($_FILES['poster']) && $_FILES['poster']['error'] == UPLOAD_ERR_OK) {
        $poster = $_FILES['poster']['name'];
        $poster_tmp = $_FILES['poster']['tmp_name'];
        $poster_folder = "uploads/" . basename($poster);
    } else {
        $poster_folder = null;  // Handle the case where no file was uploaded
    }

    // Check if the large poster file is uploaded
    if (isset($_FILES['largeposter']) && $_FILES['largeposter']['error'] == UPLOAD_ERR_OK) {
        $large_poster = $_FILES['largeposter']['name'];
        $large_poster_tmp = $_FILES['largeposter']['tmp_name'];
        $large_poster_folder = "uploads/" . basename($large_poster);
    } else {
        $large_poster_folder = null;  // Handle the case where no file was uploaded
    }

    // Only proceed if both files were uploaded successfully
    if ($poster_folder && $large_poster_folder) {
        if (move_uploaded_file($poster_tmp, $poster_folder) && move_uploaded_file($large_poster_tmp, $large_poster_folder)) {
            // Insert the data into the database
            $sql = "INSERT INTO movie (id, title, genre, vote, price, release_date, director, actors, shows, language, times, poster_path, large_poster_path,about)
                    VALUES ('$id', '$title', '$genre', '$vote', '$price', '$release_date', '$director', '$actors', '$shows','$language','$times' ,'$poster_folder', '$large_poster_folder',$about)";

            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("Movie added successfully!");</script>';
            } else {
                echo '<script>alert("Failed to add movie. Please try again.");</script>';
            }
        } else {
            echo '<script>alert("Failed to upload posters. Please try again.");</script>';
        }
    } else {
        echo '<script>alert("Please upload both posters.");</script>';
    }
}

if (isset($_POST['delete'])) {
    // Get the ID from the form and sanitize it
    $id = intval($_POST['id']); // Convert to integer to ensure it's a number

    // Create the DELETE query
    $query = "DELETE FROM movie WHERE id = $id";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
if (isset($_POST['update'])) {
    // Get the ID and updated data from the form
    $id = intval($_POST['id']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['tittle']);
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $vote = mysqli_real_escape_string($conn, $_POST['vote']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $release_date = mysqli_real_escape_string($conn, $_POST['date']);
    $director = mysqli_real_escape_string($conn, $_POST['director']);
    $actors = mysqli_real_escape_string($conn, $_POST['actors']);
    $shows = mysqli_real_escape_string($conn, $_POST['shows']);
    $language = mysqli_real_escape_string($conn, $_POST['language']);
    $about = mysqli_real_escape_string($conn, $_POST['about']);
    $times = mysqli_real_escape_string($conn, $_POST['times']);

    // Ensure the passwords match before updating
    
        // Update query
        $query = "UPDATE movie SET title = '$title',  genre = '$genre',  vote = '$vote',  price = '$price', release_date = '$release_date',    director = '$director', actors = '$actors', shows = '$shows', language = '$language',times = '$times',about='$about'  WHERE id = $id";
        
        // Execute the query
        if (!mysqli_query($conn, $query)) {
            echo "Error updating record: " . mysqli_error($conn);
        }
    
}

?>
