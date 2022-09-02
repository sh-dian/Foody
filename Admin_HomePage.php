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
    <?php include "./AdminBar.php" ?>

    <div class="bar">
        <form action="" class="search-bar">
            <input type="text" placeholder="search" name="searchBar">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <h1><i class="fa-solid fa-chart-line"></i>Dashboard</h1>
    </div>

    <div class="flexbox">
        <div class="card"> 
            <a href="Admin_UserReport.php" style="text-decoration:none; color:black;">      
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
            </a>

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
        <a href="Admin_Profit.php" style="text-decoration:none; color:black;">        
            <h2 style="text-align:center">Total Profit</h2>
            <?php         
                $query = "SELECT SUM(Order_Total)*0.10 As sum FROM orderrecord ";  
                $result = mysqli_query($con, $query);

                while($row = $result->fetch_assoc()){
                    $output = number_format($row['sum'],2);
                }
                echo '<h1 style="text-align:center">RM ' .$output. '</h1>';
            ?>
             </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="https://kit.fontawesome.com/bcdb11579f.js" crossorigin="anonymous"></script>

    <?php 
        $query = $con->query("
            SELECT 
            MONTH(Order_DeliveryTime) as month,
                SUM(Order_Total) as amount
            FROM orderrecord
            GROUP BY month
        ");

        foreach($query as $data)
        {
            $month[] = $data['month'];
            $amount[] = $data['amount'];
        }

    ?>


    <div style="width: 80%; margin-left:8%;">
        <a href="Profit.php"><canvas class="card" id="myChart"></canvas></a>
    </div>
 
    <script>
        // === include 'setup' then 'config' above ===
        const labels = <?php echo json_encode($month) ?>;
        const data = {
            labels: labels,
            datasets: [{
            label: 'Monthly Profit',
            data: <?php echo json_encode($amount) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
            options: {
                responsive:true,
            }
            },
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

</body>
</html>