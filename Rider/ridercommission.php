<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Rider_login"])){
        header("Location: riderlogin.php");
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "foody";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $riderid = $_SESSION["Rider_id"];

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

    // $monarr = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE goods_status = 'Arrived' AND DAYNAME(date_goods_arrive) = 'Monday'";
    // $moncol = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE goods_status = 'Collected' AND DAYNAME(date_goods_collected) = 'Monday'";
    // $tuearr = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE goods_status = 'Arrived' AND DAYNAME(date_goods_arrive) = 'Tuesday'";
    // $tuecol = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE goods_status = 'Collected' AND DAYNAME(date_goods_collected) = 'Tuesday'";
    // $wedarr = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE goods_status = 'Arrived' AND DAYNAME(date_goods_arrive) = 'Wednesday'";
    // $wedcol = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE goods_status = 'Collected' AND DAYNAME(date_goods_collected) = 'Wednesday'";
    // $thuarr = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE goods_status = 'Arrived' AND DAYNAME(date_goods_arrive) = 'Thursday'";
    // $thucol = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE goods_status = 'Collected' AND DAYNAME(date_goods_collected) = 'Thursday'";
    // $friarr = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE goods_status = 'Arrived' AND DAYNAME(date_goods_arrive) = 'Friday'";
    // $fricol = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE goods_status = 'Collected' AND DAYNAME(date_goods_collected) = 'Friday'";
    // $satarr = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE goods_status = 'Arrived' AND DAYNAME(date_goods_arrive) = 'Saturday'";
    // $satcol = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE goods_status = 'Collected' AND DAYNAME(date_goods_collected) = 'Saturday'";
    // $sunarr = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE goods_status = 'Arrived' AND DAYNAME(date_goods_arrive) = 'Sunday'";
    // $suncol = "SELECT COUNT(*) AS Order_ID FROM orderrecord WHERE goods_status = 'Collected' AND DAYNAME(date_goods_collected) = 'Sunday'";
    // $result15 = $conn->query($monarr);
    // $result16 = $conn->query($moncol);
    // $result17 = $conn->query($tuearr);
    // $result18 = $conn->query($tuecol);
    // $result19 = $conn->query($wedarr);
    // $result20 = $conn->query($wedcol);
    // $result21 = $conn->query($thuarr);
    // $result22 = $conn->query($thucol);
    // $result23 = $conn->query($friarr);
    // $result24 = $conn->query($fricol);
    // $result25 = $conn->query($satarr);
    // $result26 = $conn->query($satcol);
    // $result27 = $conn->query($sunarr);
    // $result28 = $conn->query($suncol);

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
    <?php include "./ridernavigationBar.php" ?>
    
    <div class="ml-5">
    <div class="container pt-4">
    <h1>Delivery History</h1>
    <div class="ml-4">

    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Day'],
                
                ['Monday', <?php while ($row1 = $result1->fetch_assoc()) { echo "$row1[Order_ID]"; } ?>],
                ['Tuesday', <?php while ($row2 = $result2->fetch_assoc()) { echo "$row2[Order_ID]"; } ?>],
                ['Wednesday', <?php while ($row3 = $result3->fetch_assoc()) { echo "$row3[Order_ID]"; } ?>],
                ['Thursday', <?php while ($row4 = $result4->fetch_assoc()) { echo "$row4[Order_ID]"; } ?>],
                ['Friday', <?php while ($row5 = $result5->fetch_assoc()) { echo "$row5[Order_ID]"; } ?>],
                ['Saturday', <?php while ($row6 = $result6->fetch_assoc()) { echo "$row6[Order_ID]"; } ?>],
                ['Sunday', <?php while ($row7 = $result7->fetch_assoc()) { echo "$row7[Order_ID]"; } ?>]
            ]);

            var options = {
                chart: {
                    title: 'Parcel Arrival',
                    subtitle: 'Arrivals and address throughout a week',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
    <!-- <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Day', 'Arrived', 'Collected'],
                
                ['Monday', <?php //while ($row15 = $result15->fetch_assoc()) { echo "$row15[Order_ID]"; } ?>, <?php //while ($row16 = $result16->fetch_assoc()) { echo "$row16[Order_ID]"; } ?>],
                ['Tuesday', <?php //while ($row17 = $result17->fetch_assoc()) { echo "$row17[Order_ID]"; } ?>, <?php //while ($row18 = $result18->fetch_assoc()) { echo "$row18[Order_ID]"; } ?>],
                ['Wednesday', <?php //while ($row19 = $result19->fetch_assoc()) { echo "$row19[Order_ID]"; } ?>, <?php //while ($row20 = $result20->fetch_assoc()) { echo "$row20[Order_ID]"; } ?>],
                ['Thursday', <?php //while ($row21 = $result21->fetch_assoc()) { echo "$row21[Order_ID]"; } ?>, <?php //while ($row22 = $result22->fetch_assoc()) { echo "$row22[Order_ID]"; } ?>],
                ['Friday', <?php //while ($row23 = $result23->fetch_assoc()) { echo "$row23[Order_ID]"; } ?>, <?php //while ($row24 = $result24->fetch_assoc()) { echo "$row24[Order_ID]"; } ?>],
                ['Saturday', <?php //while ($row25 = $result25->fetch_assoc()) { echo "$row25[Order_ID]"; } ?>, <?php //while ($row26 = $result26->fetch_assoc()) { echo "$row26[Order_ID]"; } ?>],
                ['Sunday', <?php //while ($row27 = $result27->fetch_assoc()) { echo "$row27[Order_ID]"; } ?>, <?php //while ($row28 = $result28->fetch_assoc()) { echo "$row28[Order_ID]"; } ?>]
            ]);

            var options = {
                chart: {
                    title: 'Parcel Status',
                    subtitle: 'Arrived and Collected throughout a week',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material2'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        } -->
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