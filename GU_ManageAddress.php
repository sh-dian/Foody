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
    <title>User Address</title>

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
        

        <h1><i class="fa-solid fa-chart-line"></i>Your Address</h1>
    </div>

    
    <?php 
                
                $query = "SELECT * FROM customer WHERE Cust_ID = '{$_SESSION["Cust_login"]}' ";
                        $result = mysqli_query($con, $query);
            ?>

                        <table border="1px" style="width: 70%; line-height:30px;">
                            <tr>
                                <th colspan=6><h2>ADDRESS</h2></th>
                            </tr>

                            <t>
                                <th>State </th>
                                <th>Address</th>
                                <th>PostCode</th>
                                
                            </t>

                            <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $ID = $row['Cust_ID'];
                                        $state = $row['Cust_State'];
                                        $address = $row['Cust_Address'];
                                        $postcode = $row['Cust_Poscode'];

                                        
                                        echo 
                                        '<tr>
                                            <td style="padding: 0 1rem">'.$state.'</td>
                                            <td style="padding: 0 1rem">'.$address.'</td>
                                            <td style="padding: 0 1rem">'.$postcode.'</td>

                                            <td style="padding: 0 1rem">
                                                <button><a href= "GU_UpdateAddress.php?viewid='.$ID.'">Update</a></button>
                                                <button><a href= "GU_DeleteAddress.php?deleteid='.$ID.'">Delete</a></button>
                                            </td>
                                        </tr>';
                                    }
                                }
                            ?>

                        </table><br><br>



</body>
</html>