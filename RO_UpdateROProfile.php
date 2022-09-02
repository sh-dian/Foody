<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["RO_login"])){
        header("Location: login.php");
    }
    else{
        if(isset($_POST["Update"])){

            $ROName = mysqli_real_escape_string($con, $_POST["RO_Name"]);
            $ROEmail = mysqli_real_escape_string($con, $_POST["RO_Email"]);
            $ROPass = mysqli_real_escape_string($con, $_POST["RO_pass"]);
            $ROAddress = mysqli_real_escape_string($con, $_POST["RO_Address"]);
            $ROPoscode = mysqli_real_escape_string($con, $_POST["RO_Postcode"]);
            $ROState = mysqli_real_escape_string($con, $_POST["RO_State"]);

            $query = "UPDATE restaurantowner SET RO_Name='$ROName' , RO_Email ='$ROEmail', RO_Password= '$ROPass',  RO_Address='$ROAddress', RO_Poscode='$ROPoscode', RO_State='$ROState' WHERE RO_ID = '{$_SESSION["RO_login"]}'";
            $result = mysqli_query($con, $query);
            
            if($result){
                echo "
                <script>
                    alert('Updated Success!');
                    window.location = 'ROProfile.php';
                </script>";

            }else{
                echo "<script>alert('Updated FAILED');</script>";
                echo $con->error;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Owner Profile</title>

    <link rel="stylesheet" href="CSS/updateROProfile.css"/>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./RO_Navigationbar.php" ?>

    <h1>Restaurant Owner Profile</h1>

    <form action="" method="post">
        <?php
            $query = "SELECT * FROM restaurantowner WHERE RO_ID = '{$_SESSION["RO_login"]}' ";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>

        <div class="updateProfile">

                <div class="inputBox">
                    <span class="details">Restaurant Owner ID :</span>
                    <input type="text" id="RO_id" name="RO_id" value="<?php echo $row['RO_ID'] ?>" ><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Restaurant Owner Name :</span>
                    <input type="text" id="RO_Name" name="RO_Name" value="<?php echo $row['RO_Name'] ?>" ><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Restaurant Owner Email :</span>
                    <input type="email" id="RO_Email" name="RO_Email" value="<?php echo $row['RO_Email'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Password :</span>
                    <input type="password" id="RO_pass" name="RO_pass" value="<?php echo $row['RO_Password'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Phone Number :</span>
                    <input type="text" id="RO_Phonenum" name="RO_Phonenum" value="<?php echo $row['RO_PhoneNum'] ?>" disabled required><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Address :</span>
                    <input type="text" id="RO_Address" name="RO_Address" value="<?php echo $row['RO_Address'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Postcode :</span>
                    <input type="text" id="RO_Postcode" name="RO_Postcode" value="<?php echo $row['RO_Poscode'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">State :</span>
                    <input type="text" id="RO_State" name="RO_State" value="<?php echo $row['RO_State'] ?>" ><br><br>
                </div>
        </div>

        <?php
                }
            }
        ?>    

<button type="submit" class="btn" name="Update">Update Profile</button>
    </form>

    

</body>
</html>