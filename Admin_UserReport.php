<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["adminLogin"])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Report</title>

    <link rel="stylesheet" href="CSS/userReport.css">

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./AdminBar.php" ?>

    <h1>User Report</h1>

    <div class="flexbox">
        <div class="card">       
            <h2 style="text-align:center">Total Customer</h2>
            <?php         
                $query = "SELECT Cust_ID FROM customer ORDER BY Cust_ID";  
                $query_run = mysqli_query($con, $query);
                $row1 = mysqli_num_rows($query_run);
                echo '<h1 style="text-align:center">' .$row1. '</h1>';
            ?>
        </div>

        <div class="card">       
            <h2 style="text-align:center">Total Rider</h2>
            <?php         
                $query = "SELECT Rider_ID FROM rider ORDER BY Rider_ID";  
                $query_run = mysqli_query($con, $query);
                $row2 = mysqli_num_rows($query_run);
                echo '<h1 style="text-align:center">' .$row2. '</h1>';
            ?>
        </div>

        <div class="card">       
            <h2 style="text-align:center">Total Restaurant Owner</h2>
            <?php         
                $query = "SELECT RO_ID FROM restaurantowner ORDER BY RO_ID";  
                $query_run = mysqli_query($con, $query);
                $row3 = mysqli_num_rows($query_run);
                echo '<h1 style="text-align:center">' .$row3. '</h1>';
            ?>
        </div>
    </div>

    <!--GRAPH-->

    <div>
        <div class="graphBox1">
            <div class="box"><canvas id="myChart"></canvas></div>
            <div class="box"><canvas id="myChart2"></canvas></div>
            <div class="box"><canvas id="myChart3"></canvas></div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="https://kit.fontawesome.com/bcdb11579f.js" crossorigin="anonymous"></script>
    <script src = "JavaScript/Graph.js"></script>
    

</body>
</html>