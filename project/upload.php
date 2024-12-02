<?php
// upload.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['profileImage'])) {
        $file = $_FILES['profileImage'];
        $uploadDir = 'Admin_dashboard\admin\uploads/';
        $uploadFile = $uploadDir . basename($file['name']);
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

        // Check if file is an image
        $check = getimagesize($file['tmp_name']);
        if ($check === false) {
            die('File is not an image.');
        }

        // Check file size (5MB maximum)
        if ($file['size'] > 5000000) {
            die('Sorry, your file is too large.');
        }

        // Allow certain file formats
        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
            die('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
        }

        // Check if file already exists
        if (file_exists($uploadFile)) {
            die('Sorry, file already exists.');
        }

        // Move uploaded file to the uploads directory
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            echo 'The file ' . htmlspecialchars(basename($file['name'])) . ' has been uploaded.';
        } else {
            die('Sorry, there was an error uploading your file.');
        }
    } else {
        die('No file was uploaded.');
    }
} else {
    die('Invalid request method.');
}
