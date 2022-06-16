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
    <title>User Report</title>

    <link rel="stylesheet" href="CSS/userReport.css">

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./NavigationBar.php" ?>

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

    <?php 
        $query = $con->query("
            SELECT 
                SUM(Cust_ID) as totalUser,
            FROM customer
        ");

        foreach($query as $data)
        {
            $state[] = $data['Cust_State'];
            $totalUser[] = $data['totalUser'];
        }

    ?>
 
    <script>
    // === include 'setup' then 'config' above ===
    const labels = <?php echo json_encode($state) ?>;
    const data = {
        labels: labels,
        datasets: [{
        label: <?php echo json_encode($state) ?>,
        data: <?php echo json_encode($totalUser) ?>,
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
        scales: {
            y: {
            beginAtZero: true
            }
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