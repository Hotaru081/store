<?php
session_start();

include 'adminheader.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Add Item</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .add-form label,
        .add-form input {
            display: block;
            width: calc(100% - 20px);
            margin: 10px 0;
        }

        .add-form input[type="submit"] {
            width: 100%;
            padding: 10px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-form input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .add-form a.button {
            display: block;
            width: 100%;
            text-align: center;
            text-decoration: none;
            padding: 10px 0;
            margin-top: 10px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-form a.button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Item</h2>

        <form action="add_item_process.php" method="POST" enctype="multipart/form-data" class="add-form">
            <label for="type">Type:</label>
            <input type="text" id="type" name="type" required>

            <label for="details">Details:</label>
            <input type="text" id="details" name="details" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image">

            <input type="submit" value="Add Item">
            <a href="admin.php" class="button">Back</a>
        </form>
    </div>
</body>
</html>


