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

    $mon = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE DAYNAME(Order_DeliveryTime) = 'Monday'";
    $tue = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE DAYNAME(Order_DeliveryTime) = 'Tuesday'";
    $wed = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE DAYNAME(Order_DeliveryTime) = 'Wednesday'";
    $thu = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE DAYNAME(Order_DeliveryTime) = 'Thursday'";
    $fri = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE DAYNAME(Order_DeliveryTime) = 'Friday'";
    $sat = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE DAYNAME(Order_DeliveryTime) = 'Saturday'";
    $sun = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE DAYNAME(Order_DeliveryTime) = 'Sunday'";
    $result1 = $conn->query($mon);
    $result2 = $conn->query($tue);
    $result3 = $conn->query($wed);
    $result4 = $conn->query($thu);
    $result5 = $conn->query($fri);
    $result6 = $conn->query($sat);
    $result7 = $conn->query($sun);

    $moncom = "SELECT IFNULL((SELECT SUM(Order_DeliveryFee) FROM orderrecord WHERE DAYNAME(Order_DeliveryTime) = 'Monday' AND Rider_ID = '$riderid'), 0) AS Order_DeliveryFee";
    $tuecom = "SELECT IFNULL((SELECT SUM(Order_DeliveryFee) FROM orderrecord WHERE DAYNAME(Order_DeliveryTime) = 'Tuesday' AND Rider_ID = '$riderid'), 0) AS Order_DeliveryFee";
    $wedcom = "SELECT IFNULL((SELECT SUM(Order_DeliveryFee) FROM orderrecord WHERE DAYNAME(Order_DeliveryTime) = 'Wednesday' AND Rider_ID = '$riderid'), 0) AS Order_DeliveryFee";
    $thucom = "SELECT IFNULL((SELECT SUM(Order_DeliveryFee) FROM orderrecord WHERE DAYNAME(Order_DeliveryTime) = 'Thursday' AND Rider_ID = '$riderid'), 0) AS Order_DeliveryFee";
    $fricom = "SELECT IFNULL((SELECT SUM(Order_DeliveryFee) FROM orderrecord WHERE DAYNAME(Order_DeliveryTime) = 'Friday' AND Rider_ID = '$riderid'), 0) AS Order_DeliveryFee";
    $satcom = "SELECT IFNULL((SELECT SUM(Order_DeliveryFee) FROM orderrecord WHERE DAYNAME(Order_DeliveryTime) = 'Saturday' AND Rider_ID = '$riderid'), 0) AS Order_DeliveryFee";
    $suncom = "SELECT IFNULL((SELECT SUM(Order_DeliveryFee) FROM orderrecord WHERE DAYNAME(Order_DeliveryTime) = 'Sunday' AND Rider_ID = '$riderid'), 0) AS Order_DeliveryFee";
    $result8 = $conn->query($moncom);
    $result9 = $conn->query($tuecom);
    $result10 = $conn->query($wedcom);
    $result11 = $conn->query($thucom);
    $result12 = $conn->query($fricom);
    $result13 = $conn->query($satcom);
    $result14 = $conn->query($suncom);

    // if ($result = mysqli_query($conn,$monkk1)){
    //     $rowcount = mysqli_num_rows($result);
        
    //     printf("Result set has %d rows.\n",$rowcount);
    //  }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rider Commission</title>
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
    <!-- <h1>Delivery History</h1> -->
    <div class="ml-4">

    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Day', 'Orders'],
                
                ['Mon', <?php while ($row1 = $result1->fetch_assoc()) { echo "$row1[Order_ID]"; } ?>],
                ['Tue', <?php while ($row2 = $result2->fetch_assoc()) { echo "$row2[Order_ID]"; } ?>],
                ['Wed', <?php while ($row3 = $result3->fetch_assoc()) { echo "$row3[Order_ID]"; } ?>],
                ['Thu', <?php while ($row4 = $result4->fetch_assoc()) { echo "$row4[Order_ID]"; } ?>],
                ['Fri', <?php while ($row5 = $result5->fetch_assoc()) { echo "$row5[Order_ID]"; } ?>],
                ['Sat', <?php while ($row6 = $result6->fetch_assoc()) { echo "$row6[Order_ID]"; } ?>],
                ['Sun', <?php while ($row7 = $result7->fetch_assoc()) { echo "$row7[Order_ID]"; } ?>]
            ]);

            var options = {
                chart: {
                    title: 'Orders Delivered',
                    subtitle: 'Orders Delivered throughout a week',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Day', 'Commission'],
                
                ['Mon', <?php while ($row8 = $result8->fetch_assoc()) { echo "$row8[Order_DeliveryFee]"; } ?>],
                ['Tue', <?php while ($row9 = $result9->fetch_assoc()) { echo "$row9[Order_DeliveryFee]"; } ?>],
                ['Wed', <?php while ($row10 = $result10->fetch_assoc()) { echo "$row10[Order_DeliveryFee]"; } ?>],
                ['Thu', <?php while ($row11 = $result11->fetch_assoc()) { echo "$row11[Order_DeliveryFee]"; } ?>],
                ['Fri', <?php while ($row12 = $result12->fetch_assoc()) { echo "$row12[Order_DeliveryFee]"; } ?>],
                ['Sat', <?php while ($row13 = $result13->fetch_assoc()) { echo "$row13[Order_DeliveryFee]"; } ?>],
                ['Sun', <?php while ($row14 = $result14->fetch_assoc()) { echo "$row14[Order_DeliveryFee]"; } ?>]
            ]);

            var options = {
                chart: {
                    title: 'Total Commissions Gained',
                    subtitle: 'Commissions throughout a week',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material2'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

    <p class="lead text-center text-muted">Report</p>
    <div class="row">
        <div class="col" id="columnchart_material" style="width: 800px; height: 500px;"></div>
        <div class="col" id="columnchart_material2" style="width: 800px; height: 500px;"></div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
   
</body>
</html>