<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["adminLogin"])){
        header("Location: Login.php");
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
            <h2>Total User</h2>
            <?php         
                $query = "SELECT Rest_ID FROM restaurant ORDER BY Rest_ID";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h1>' .$row. '</h1>';
            ?>
        </div>

        <div class="card">       
            <h2>Total Restaurant</h2>
            <?php         
                $query = "SELECT Rest_ID FROM restaurant ORDER BY Rest_ID";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h1>' .$row. '</h1>';
            ?>
        </div>

        <div class="card">       
            <h2>Total Profit</h2>
            <?php         
                $query = "SELECT Rest_ID FROM restaurant ORDER BY Rest_ID";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h1>' .$row. '</h1>';
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
    <script src="JavaScript/graph.js"></script>

</body>
</html>