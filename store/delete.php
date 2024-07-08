<?php
include 'connection.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Perform deletion based on the ID
    $sql = "DELETE FROM items WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
