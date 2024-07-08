<?php
session_start();

include 'adminheader.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        table {
            margin-top: 20px;
            margin-left: 50px;
            margin-right: 30px;
            border-collapse: collapse;
            width: 95%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .add-button {
            margin-top: 80px;
            margin-left: 50px;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .add-button:hover {
            background-color: #45a049;
        }

        .item-image {
            max-width: 100px;
            height: auto;
        }

        .action-dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 4px;
        }

        .dropdown-content a {
            color: black;
            padding: 8px 12px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .action-dropdown:hover .dropdown-content {
            display: block;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
        }

    </style>
</head>
<body>
    <h2>Admin Dashboard</h2>

    <a href="add_item.php" class="add-button">Add New Item</a>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">ID</th>
                <th>TYPE</th>
                <th>DETAILS</th>
                <th>PRICE</th>
                <th>PHOTO</th>
                <th style="width: 5%;">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include 'connection.php';

            $sql = "SELECT id, type, details, price, image FROM items";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td>" . $row['details'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";

                    echo "<td>";
                    if (!empty($row['image'])) {
                        echo '<img src="' . $row['image'] . '" class="item-image" alt="Item Image">';
                    } else {
                        echo "No image available";
                    }
                    echo "</td>";

                    echo '<td class="action-buttons">
                            <div class="action-dropdown">
                                <button class="dropbtn">Actions</button>
                                <div class="dropdown-content">
                                    <a href="edit.php?id=' . $row['id'] . '">Edit</a>
                                    <a href="delete.php?id=' . $row['id'] . '">Delete</a>
                                </div>
                            </div>
                        </td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No data found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
    <?php include 'footer.php';?>
</body>
</html>
