<?php
session_start();

include 'header.php';
include 'connection.php'; // Include your database connection file

// Fetch data from the database
$sql = "SELECT * FROM items WHERE type = 'Hoodies'"; // Update with your table name
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hoodies List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #607274;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            margin-top: 90px;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center; 
        }
        .item {
            border: 1px solid #ccc;
            padding: 10px;
            width: calc(33.33% - 20px);
            box-sizing: border-box;
            background-color: #A9A9A9;
        }
        .item h3 {
            margin-top: 60;
        }
        .item img {
            max-width: 300px;
            height: auto;
            display: block;
            margin: 10px auto;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hoodies List</h2>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='item'>";
                echo "<p>Type: " . $row['type'] . "</p>";
                echo "<p>Details: " . $row['details'] . "</p>";
                echo "<p>Price: ₱" . $row['price'] . "</p>";
                echo "<img src='" . $row['image'] . "' alt='Item Image'>";
                echo "</div>";
            }
        } else {
            echo "<p>No data found</p>";
        }
        ?>
    </div>
    <?php include 'footer.php';?>
</body>
</html>

<?php
$conn->close(); 
?>

