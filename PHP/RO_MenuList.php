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
    <title>Menu List</title>

    <link rel="stylesheet" href="CSS/Menulist.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./RO_Navigationbar.php" ?>

    <h1>Order List</h1>

    <?php 
                
                        $query1 = "SELECT * FROM orderrecord WHERE Rest_ID = '{$_SESSION["RO_login"]}'";
                        $result = mysqli_query($con, $query1);
            ?>

                        <table border="1px" style="width: 70%; line-height:30px;">
                            <tr>
                                <th colspan=5><h2>ORDER LIST</h2></th>
                            </tr>

                            <t>
                                <th>Order ID</th>
                                <th>Menu</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Options</th>
                            </t>

                            <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $id = $row['Order_ID'];
                                        $menu = $row['Order_MenuName'];
                                        $quantity = $row['Order_Quantity'];
                                        $total = $row['Order_Total'];

                                        
                                        echo 
                                        '<tr>
                                            <td style="padding: 0 1rem">'.$id.'</td>
                                            <td style="padding: 0 1rem">'.$menu.'</td>
                                            <td style="padding: 0 1rem">'.$quantity.'</td>
                                            <td style="padding: 0 1rem">'.$total.'</td>

                                            <td style="padding: 0 1rem">
                                            <div class="dropdownMenu">
                    
                                            <select name="optionType" id="status">
                        
                                                <option value="Accept">Accept</option>
                                                <option value="Cookedr">Cooked</option>
                                                <option value="Prepared">Prepared</option>
                        
                                            </select>
                                            
                                            </td>
                                        </tr>';
                                    }
                                }
                            ?>

                        </table><br><br>

    

</body>
</html>