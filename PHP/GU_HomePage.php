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
    <title>User Dashboard</title>

    <link rel="stylesheet" href="CSS/homepage.css"/>
    <style>
        body{
            margin-left: 5%;
            padding: 5%;
        }
    </style>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./GU_Navigationbar.php" ?>

    <div id="main-content">
            <div id="search-section">
                <form method="POST" action="#">
                    <input type="text" name="search-restaurant" id="search-bar" placeholder="Enter Restaurant Name Here"/>
                    <select id="categorize" class="btn" name="categorize">
                        <option value="none" class="btn" selected disable hidden>Categorized By<i class="fa-solid fa-circle-chevron-down"></i></option>
                        <option value="" class="btn"></option>
                        <option value="1" >Local Restaurant</option>
                        <option value="2" >Western Restaurant</option>
                        <option value="3" >Vegeterian Restaurant</option>
                    </select>
                    <button type="submit" class="btn" id="search-button" name="search">Search</button>
                </form>
            </div>

            <br/><br/>
            <h2>Top Restaurant</h2>
            <br/>

            <div class="bar">
        

        <h1><i class="fa-solid fa-chart-line"></i>Select Restaurant</h1>
    </div>

    <?php 
                
                $query = "SELECT * FROM restaurant";
                        $result = mysqli_query($con, $query);
            ?>

                        <table border="1px" style="width: 70%; line-height:30px;">
                            <tr>
                                <th colspan=6><h2>ADDRESS</h2></th>
                            </tr>

                            <t>
                                <th> Name </th>
                                <th> Address</th>
                                <th>State</th>
                                <th>Phone Number</th>
                                
                            </t>

                            <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $ID = $row['Rest_ID'];
                                        $restName = $row['Rest_Name'];
                                        $restAddress= $row['Rest_Address'];
                                        $restState = $row['Rest_State'];
                                        $phoneNum = $row['Rest_PhoneNum'];

                                        
                                        echo 
                                        '<tr>
                                            <td style="padding: 0 1rem">'.$restName.'</td>
                                            <td style="padding: 0 1rem">'.$restAddress.'</td>
                                            <td style="padding: 0 1rem">'.$restState.'</td>
                                            <td style="padding: 0 1rem">'.$phoneNum.'</td>

                                            <td style="padding: 0 1rem">
                                                <button><a href= "GU_Menu.php?viewid='.$ID.'">Explore</a></button>
                                                
                                            </td>
                                        </tr>';
                                    }
                                }
                            ?>

                        </table><br><br>


