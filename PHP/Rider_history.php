<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Rider_login"])){
        header("Location: login.php");
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "foody";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $riderid = $_SESSION["Rider_login"];
    $sql = "SELECT * FROM orderrecord O, restaurant E, customer C WHERE '$riderid' = O.Rider_ID AND O.Rest_ID = E.Rest_ID AND O.Cust_ID = C.Cust_ID AND Order_DeliveryTime IS NOT NULL";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rider History</title>
    <link rel="stylesheet" href="CSS/ridercommission.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./Rider_navigationBar.php" ?>
    <div class="ml-5">

    
    <div class="container pt-4">
    
    <h1>Delivery History</h1>
    <div class="ml-4">
    <table id="commissionlist" class="table table-striped table-bordered" style="width:100%;">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Restaurant ID</th>
                <th>Restaurant Name</th>
                <th>Delivery Fee</th>
                <th>Delivery Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row["Order_ID"]; ?></td>
                    <td><?php echo $row["Cust_ID"]; ?></td>
                    <td><?php echo $row["Cust_Name"]; ?></td>
                    <td><?php echo $row["Rest_ID"]; ?></td>
                    <td><?php echo $row["Rest_Name"]; ?></td>
                    <td><?php echo $row["Order_DeliveryFee"]; ?></td>
                    <td><?php echo $row["Order_DeliveryTime"]; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Order ID</th>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Restaurant ID</th>
                <th>Restaurant Name</th>
                <th>Delivery Fee</th>
                <th>Delivery Time</th>
            </tr>
        </tfoot>
    </table>
    </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
   
</body>
<script>
        $(document).ready(function() {
            $("#commissionlist").DataTable();
        });
    </script>
</html>