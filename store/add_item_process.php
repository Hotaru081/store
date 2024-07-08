<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connection.php';

    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file was uploaded without errors
    if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        // Check if file is an image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Proceed with upload
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Attempt to upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;
            $sql = "INSERT INTO items (type, details, price, image) VALUES ('$type', '$details', '$price', '$image')";

            if ($conn->query($sql) === TRUE) {
                header("Location: admin.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $conn->close();
} else {
    header("Location: admin.php");
    exit();
}
?>
