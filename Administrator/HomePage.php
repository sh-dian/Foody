<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["adminLogin"])){
        header("Location: FrontUI.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>

    <link rel="stylesheet" href="CSS/adminHome.css">

    <style>
        body{
            margin-left: 2%;
            padding: 2%;
        }
    </style>
    
</head>
<body> 

    <!-- Navigation Bar -->
    <?php include "./NavigationBar.php" ?>

    <div class="bar">
        <form action="" class="search-bar">
            <input type="text" placeholder="search" name="searchBar">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <h1><i class="fa-solid fa-chart-line"></i>Dashboard</h1>
    </div>

    <div class="flexbox">
        <div class="card">       
            <h2 style="text-align:center">Total User</h2>
            <?php         
                $query = "SELECT Rest_ID FROM restaurant ORDER BY Rest_ID";  
                $query_run = mysqli_query($con, $query);
                $row1 = mysqli_num_rows($query_run);
                  
                $query = "SELECT Cust_ID FROM customer ORDER BY Cust_ID";  
                $query_run = mysqli_query($con, $query);
                $row2 = mysqli_num_rows($query_run);
               
                $query = "SELECT Rider_ID FROM rider ORDER BY Rider_ID";  
                $query_run = mysqli_query($con, $query);
                $row3 = mysqli_num_rows($query_run);
            ?>

            <?php
                $result = $row1 + $row2 + $row3;
                echo '<h1 style="text-align:center">' .$result. '</h1>';
            ?>

        </div>

        <div class="card">       
            <h2 style="text-align:center">Total Order</h2>
            <?php         
                 $query = "SELECT Order_ID FROM orderrecord ORDER BY Order_ID";  
                 $query_run = mysqli_query($con, $query);
                 $row = mysqli_num_rows($query_run);
                 echo '<h1 style="text-align:center">' .$row. '</h1>';
            ?>
        </div>

        <div class="card">       
            <h2 style="text-align:center">Total Profit</h2>
            <?php         
                $query = "SELECT SUM(Order_Total) As sum FROM orderrecord ";  
                $result = mysqli_query($con, $query);

                while($row = $result->fetch_assoc()){
                    $output = $row['sum'];
                }
                echo '<h1 style="text-align:center">RM ' .$output. '</h1>';
            ?>
        </div>
    </div>

    <div>
        <div class="graphBox">
            <div class="box"><canvas id="myChart"></canvas></div>
            <div class="box"><canvas id="myChart2"></canvas></div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="https://kit.fontawesome.com/bcdb11579f.js" crossorigin="anonymous"></script>
    <script src="JavaScript/HomePageGraph.js"></script>

</body>
</html>