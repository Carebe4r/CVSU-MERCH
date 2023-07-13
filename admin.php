<?php
session_start();
include("connect.php");
include("function.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <script type="text/javascript" src="js/admin.js"></script>
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="images/cvsu-logo.png">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <h2>Admin</h2>
            <div class="admin-card">
                <i class="fas fa-calendar-check"></i>
                <h3>Accounts</h3>
                <p>View and manage Accounts.</p>
                <a href="#" class="btn" id="bookingsBtn">Go to Accounts</a>
            </div>

            <div class="admin-card">
                <i class="fas fa-calendar-plus"></i>
                <h3>Inventory</h3>
                <p>Manage the Inventory.</p>
                <a href="#" class="btn" id="checkInBtn">Go to Inventory</a>
            </div>
            <div class="admin-card">
                <i class="fas fa-calendar-times"></i>
                <h3>Check-out</h3>
                <p>Manage the check-out process .</p>
                <a href="#" class="btn" id="checkOutBtn">Check-out</a>
            </div>
            <div class="admin-card">
                <i class="fas fa-bed"></i>
                <h3>Categories</h3>
                <p>Manage categories.</p>
                <a href="#" class="btn" id="roomCategoriesBtn">Categories</a>
            </div>
            <div class="admin-card">
                <i class="fas fa-door-open"></i>
                <a href="index.php" class="btn" id="roomsBtn">Logout</a>
            </div>
        </div>
        <div class="content">
            <h1>Dashboard</h1>
            <table id="bookingsTable" style="display: none;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date Created</th>
                    </tr>
                <tbody>
                    <?php
                    $sql = "SELECT STUDENT_ID, NAMES, EMAIL, DATE FROM INFO";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["STUDENT_ID"] . "</td><td>" . $row["NAMES"] . "</td><td>" . $row["EMAIL"] . "</td><td>" . $row["DATE"] . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 result";
                    }
                    ?>
                    </thead>

                </tbody>
            </table>
            <table id="checkInTable" style="display: none;">
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT ITEM_ID, ITEM_NAME, STOCK, PRICE FROM items";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["ITEM_ID"] . "</td><td>" . $row["ITEM_NAME"] . "</td><td>" . $row["STOCK"] . "</td><td>". $row["PRICE"] . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 result";
                    }
                    ?>
                </tbody>
            </table>
            <table id="checkOutTable" style="display: none;">
                <thead>
                    <tr>
                        <th>Student No</th>
                        <th>Check-out Date</th>
                        <th>Address</th>
                        <th>Amount Due</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Populate table rows with data -->
                </tbody>
            </table>
            <table id="roomCategoriesTable" style="display: none;">
                <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Availability</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Populate table rows with data -->
                </tbody>
            </table>
            <table id="roomsTable" style="display: none;">
                <thead>
                    <tr>
                        <th>Room Number</th>
                        <th>Room Category</th>
                        <th>Status</th>
                        <th>Last Cleaned</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Populate table rows with data -->
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>