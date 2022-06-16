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
    <title>Reorder Menu</title>

    <link rel="stylesheet" href="CSS/address.css"/>
    <style>
        body{
            margin-left: 2%;
            padding: 2%;
        }
    </style>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./GU_Navigationbar.php" ?>


    <div class="bar">

        <h1><i class="fa-solid fa-chart-line"></i>Order History</h1>
    </div>

    
    <?php 
                
                $query = "SELECT * FROM orderrecord WHERE Order_ID = '1' ";
                        $result = mysqli_query($con, $query);
            ?>

                        <table border="1px" style="width: 70%; line-height:30px;">
                            <tr>
                                <th colspan=6><h2>MENU HISTORY</h2></th>
                            </tr>

                            <t>
                                <th>Order ID</th>
                                <th>Delivery Time</th>
                                <th>Menu List</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                
                            </t>

                            <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $orderID = $row['Order_ID'];
                                        $deliverytime = $row['Order_DeliveryTime'];
                                        $menulist = $row['Order_MenuName'];
                                        $quantity = $row['Order_Quantity'];
                                        $totalprice = $row['Order_Total'];

                                        
                                        echo 
                                        '<tr>
                                            <td style="padding: 0 1rem">'.$orderID.'</td>
                                            <td style="padding: 0 1rem">'.$deliverytime.'</td>
                                            <td style="padding: 0 1rem">'.$menulist.'</td>
                                            <td style="padding: 0 1rem">'.$quantity.'</td>
                                            <td style="padding: 0 1rem">'.$totalprice.'</td>

                                            <td style="padding: 0 1rem">
                                                <button><a href= "GU_UpdateReorder.php?viewid='.$orderID.'">Update</a></button>
                                            </td>
                                        </tr>';
                                    }
                                }
                            ?>

                        </table><br><br>



</body>
</html>