<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["RO_login"])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>

    <link rel="stylesheet" href="CSS/Report.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

    <style>
        body{
            margin-left: 2%;
            padding: 2%;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./RO_Navigationbar.php" ?>

    <div class="card">       
            <h2 style="text-align:center">Total Profit</h2>
            <?php         
                $query1 = "SELECT SUM(Order_Total) As sum FROM orderrecord WHERE Rest_ID = '{$_SESSION["RO_login"]}'";  
                $result = mysqli_query($con, $query1);

                while($row = $result->fetch_assoc()){
                    $output = number_format($row['sum'],2);
                }
                echo '<h1 style="text-align:center">RM ' .$output. '</h1>';
            ?>
    </div>

    <?php 
        $query = $con->query("
            SELECT 
            MONTH(Order_DeliveryTime) as month,
                SUM(Order_Total) as amount
            FROM orderrecord WHERE Rest_ID = '{$_SESSION["RO_login"]}'
            GROUP BY month
        ");

        foreach($query as $data)
        {
            $month[] = $data['month'];
            $amount[] = $data['amount'];
        }

    ?>

    <div style="width: 65%; margin-left:16%; ">
        <canvas class="card" id="myChart"></canvas>
    </div>
    <script>
  
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Monthly Profit',
      data: <?php echo json_encode($amount) ?>,
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
    
</body>
</html>