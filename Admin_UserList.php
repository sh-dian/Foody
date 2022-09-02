<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["adminLogin"])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="CSS/userList.css">

    <title>User List</title>

    <style>
        html { overflow-y: scroll; overflow-x:hidden; }
        body{
            margin-left: 10%;
            margin-top: 2%;
            padding: 0;
            position: absolute;
            font-size: 14px;
        }
    </style>

</head>
<body>

    <!-- Navigation Bar -->
    <?php include "./AdminBar.php" ?>

    <div class="flexbox1">
        <div class="title"><h1>User List</h1></div> <br>

        <form action="" method="post">
            <div class="dropdownMenu">    
                    <select name="userType" id="user">

                        <option disable selected value>Choose User Type</option>
                        <option value="User">General User</option>
                        <option value="Rider">Rider</option>
                        <option value="Restaurant Owner">Restaurant Owner</option>

                    </select>  
                    
                    <input name="Next" type="submit" value="Next" class="button"> <br><br>  
            </div>
        </form>
    </div>

    <div class="flexbox">
        <form action="AddUser.php">
            <button type="submit" name="send" value="Edit" class="button1">Add New User</button>
        </form>

        <form action="AddRider.php">
            <button type="submit" name="send" value="Edit" class="button1">Add New Rider</button>
        </form>

        <form action="AddRO.php">
            <button type="submit" name="send" value="Edit" class="button1">Add New Restaurant Owner</button> <br><br>
        </form>

    </div>

    <hr><br>

            <?php 
                if(isset($_POST['Next'])){
                    $getType = mysqli_real_escape_string($con, $_POST['userType']);
        
                    if($getType === "User"){
                        $query1 = "SELECT * FROM customer";
                        $result = mysqli_query($con, $query1);
            ?>

                        <table border="1px" style="width: 70%; line-height:30px;">
                            <tr>
                                <th colspan=8><h2>Customer Account</h2></th>
                            </tr>

                            <t>
                                <th>ID</th>
                                <th>Password</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Poscode</th>
                                <th>State</th>
                                <th>Menu</th>
                            </t>

                            <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $id = $row['Cust_ID'];
                                        $pass = $row['Cust_Password'];
                                        $name = $row['Cust_Name'];
                                        $phone = $row['Cust_PhoneNum'];
                                        $address = $row['Cust_Address'];
                                        $poscode = $row['Cust_Poscode'];
                                        $state = $row['Cust_State'];
                                        
                                        echo 
                                        '<tr>
                                            <td style="padding: 0 1rem">'.$id.'</td>
                                            <td style="padding: 0 1rem">'.$pass.'</td>
                                            <td style="padding: 0 1rem">'.$name.'</td>
                                            <td style="padding: 0 1rem">'.$phone.'</td>
                                            <td style="padding: 0 1rem">'.$address.'</td>
                                            <td style="padding: 0 1rem">'.$poscode.'</td>
                                            <td style="padding: 0 1rem">'.$state.'</td>
                                            <td style="padding: 0 1rem">
                                                <button><a href= "Admin_UpdateCustomer.php?viewid='.$id.'">Update</a></button>
                                                <button><a href= "Admin_DeleteCustomer.php?deleteid='.$id.'">Delete</a></button>
                                            </td>
                                        </tr>';
                                    }
                                }
                            ?>

                        </table><br><br>

            <?php
                    }else if($getType === "Rider"){
                        $query = "SELECT * FROM rider";
                        $result = mysqli_query($con, $query);
            ?>

                        <table border="1px" style="width: 70%; line-height:30px;">
                            <tr>
                                <th colspan=6><h2>Rider Account</h2></th>
                            </tr>

                            <t>
                                <th>ID</th>
                                <th>Password</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Delivery Area</th>
                                <th>Menu</th>
                            </t>

                            <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $id = $row['Rider_ID'];
                                        $pass = $row['Rider_Password'];
                                        $name = $row['Rider_Name'];
                                        $phone = $row['Rider_PhoneNum'];
                                        $deliveryArea = $row['Rider_DeliveryArea'];
                                        
                                        echo
                                        '<tr>
                                            <td style="padding: 0 1rem">'.$id.'</td>
                                            <td style="padding: 0 1rem">'.$pass.'</td>
                                            <td style="padding: 0 1rem">'.$name.'</td>
                                            <td style="padding: 0 1rem">'.$phone.'</td>
                                            <td style="padding: 0 1rem">'.$deliveryArea.'</td>
                                            <td style="padding: 0 1rem">
                                                <button><a href= "Admin_UpdateRider.php?viewid='.$id.'">Update</a></button>
                                                <button><a href= "Admin_DeleteRider.php?deleteid='.$id.'">Delete</a></button>
                                            </td>
                                        </tr>';
                                    }
                                }
                            ?>

                        </table><br><br>

            <?php
                    }else if($getType === "Restaurant Owner"){
                        $query = "SELECT * FROM restaurantowner";
                        $result = mysqli_query($con, $query);
            ?>
                        <table border="1px" style="width: 70%; line-height:30px;">
                            <tr>
                                <th colspan=9><h2>Restaurant Owner Account</h2></th>
                            </tr>

                            <t>
                                <th>ID</th>
                                <th>Password</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Poscode</th>
                                <th>State</th>
                                <th>Menu</th>
                            </t>

                            <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $id = $row['RO_ID'];
                                        $pass = $row['RO_Password'];
                                        $name = $row['RO_Name'];
                                        $phone = $row['RO_PhoneNum'];
                                        $email = $row['RO_Email'];
                                        $address = $row['RO_Address'];
                                        $poscode = $row['RO_Poscode'];
                                        $state = $row['RO_State'];
                                        
                                        echo
                                        '<tr>
                                            <td style="padding: 0 1rem">'.$id.'</td>
                                            <td style="padding: 0 1rem">'.$pass.'</td>
                                            <td style="padding: 0 1rem">'.$name.'</td>
                                            <td style="padding: 0 1rem">'.$phone.'</td>
                                            <td style="padding: 0 1rem">'.$email.'</td>
                                            <td style="padding: 0 1rem">'.$address.'</td>
                                            <td style="padding: 0 1rem">'.$poscode.'</td>
                                            <td style="padding: 0 1rem">'.$state.'</td>
                                            <td style="padding: 0 1rem">
                                                <button><a href= "Admin_UpdateOwner.php?viewid='.$id.'">Update</a></button>
                                                <button><a href= "Admin_DeleteOwner.php?deleteid='.$id.'">Delete</a></button>
                                            </td>
                                        </tr>';
                                    }
                                }
                            ?>

                        </table><br><br>
            <?php
                    }
                }
            ?>

</body>
</html>