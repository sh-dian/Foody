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
    <title>Homepage</title>

    <link rel="stylesheet" href="CSS/HomePage.css"/>
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


    <div class="bar">
        <form action="" class="search-bar">
            <input type="text" placeholder="search" name="searchBar">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <h1><i class="fa-solid fa-chart-line"></i>Restaurant Menu</h1>
    </div>

    
    <?php 
                
                        $query1 = "SELECT * FROM restaurantmenu WHERE Rest_ID = '{$_SESSION["RO_login"]}'";
                        $result = mysqli_query($con, $query1);
            ?>

                        <table border="1px" style="width: 70%; line-height:30px;">
                            <tr>
                                <th colspan=4><h2>MENU</h2></th>
                            </tr>

                            <t>
                                <th>Menu </th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Options</th>
                            </t>

                            <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $id = $row['RM_ID'];
                                        $menu = $row['RM_MenuName'];
                                        $description = $row['RM_Description'];
                                        $price = $row['RM_Price'];

                                        
                                        echo 
                                        '<tr>
                                            <td style="padding: 0 1rem">'.$menu.'</td>
                                            <td style="padding: 0 1rem">'.$description.'</td>
                                            <td style="padding: 0 1rem">'.$price.'</td>

                                            <td style="padding: 0 1rem">
                                                <button><a href= "RO_UpdateMenu.php?viewid='.$id.'">Update</a></button>
                                                <button><a href= "RO_DeleteMenu.php?deleteid='.$id.'">Delete</a></button>
                                            </td>
                                        </tr>';
                                    }
                                }
                            ?>

                        </table><br><br>



</body>
</html>