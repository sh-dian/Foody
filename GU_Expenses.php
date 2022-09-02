<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Cust_login"])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Expenses</title>

    <link rel="stylesheet" href="CSS/expenses.css">

    <style>
        body{
            margin-left: 2%;
            padding: 2%;
        }
    </style>
    
</head>
<body> 

    <!-- Navigation Bar -->
    <?php include "./GU_NavigationBar.php" ?>

    <div class="bar">
        <form action="" class="search-bar">
            <input type="text" placeholder="search" name="searchBar">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <h1><i class="fa-solid fa-chart-line"></i>Expenses</h1>
    </div>

    <div class="flexbox">
        <div class="card">       
            <h2>Total Order</h2>
            <?php         
                $query = "SELECT Order_ID FROM orderrecord ORDER BY Order_ID";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h1>' .$row. '</h1>';
            ?>
        </div>

        <div class="card">       
            <h2>Money Spent</h2>
            <?php         
                $query = "SELECT Order_ID FROM orderrecord ORDER BY Order_Total";  
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