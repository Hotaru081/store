<?php
include 'connection.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch item data based on the ID to populate the form for editing
    $sql = "SELECT * FROM items WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Data fetching and form population logic goes here
        $row = $result->fetch_assoc();
        // Populate form fields with fetched data for editing
        $type = $row['type'];
        $details = $row['details'];
        $price = $row['price'];
        // ...
    } else {
        echo "No item found";
    }
} else {
    // Handle cases where ID is not provided
    echo "Invalid request";
}

$conn->close();
?>

<!-- HTML form for editing -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Item</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .edit-form {
            width: 50%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .edit-form input[type="text"],
        .edit-form input[type="number"] {
            display: block;
            margin-bottom: 20px;
            width: calc(100% - 40px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .edit-form input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="edit-form">
            <h2>Edit Item</h2>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" name="type" value="<?php echo $type; ?>">
                <input type="text" name="details" value="<?php echo $details; ?>">
                <input type="number" name="price" value="<?php echo $price; ?>">
                <input type="submit" value="Update">
            </form>
        </div>
    </div>
</body>
</html>
