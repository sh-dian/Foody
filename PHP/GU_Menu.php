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
    <title>Restaurant Menu</title>

    <link rel="stylesheet" href="CSS/menu.css"/>
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
        

        <h1><i class="fa-solid fa-chart-line"></i>Restaurant Menu</h1>
    </div>

    
    <?php 
                
                $query = "SELECT * FROM restaurantmenu WHERE Rest_ID = '{$_SESSION["Cust_login"]}' ";
                        $result = mysqli_query($con, $query);
            ?>

                        <table border="1px" style="width: 70%; line-height:30px;">
                            <tr>
                                <th colspan=6><h2>Restaurant Menu</h2></th>
                            </tr>

                            <t>
                                <th>Menu Name</th>
                                <th>Menu Description</th>
                                <th>Price</th>
                                
                            </t>

                            <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $ID = $row['Rest_ID'];
                                        $menuName = $row['RM_MenuName'];
                                        $menuDesc = $row['RM_Description'];
                                        $price = $row['RM_Price'];

                                        
                                        echo 
                                        '<tr>
                                            <td style="padding: 0 1rem">'.$menuName.'</td>
                                            <td style="padding: 0 1rem">'.$menuDesc.'</td>
                                            <td style="padding: 0 1rem">'.$price .'</td>

                                            <td style="padding: 0 1rem">
                                                <button><a href= "GU_Cart.php?viewid='.$ID.'">Add to Cart</a></button>
                                               
                                            </td>
                                        </tr>';
                                    }
                                }
                            ?>

                        </table><br><br>



</body>
</html>