<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $details = mysqli_real_escape_string($conn, $_POST['details']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);

        $sql = "UPDATE items SET type = '$type', details = '$details', price = '$price' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Invalid request";
    }
} else {
    header("Location: admin.php");
    exit();
}

$conn->close();
?>
