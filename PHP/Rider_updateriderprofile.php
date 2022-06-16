<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Rider_login"])){
        header("Location: login.php");
    }
    else{
        if(isset($_POST["Update"])){

            $RiderName = mysqli_real_escape_string($con, $_POST["Rider_Name"]);
            $RiderPass = mysqli_real_escape_string($con, $_POST["Rider_Password"]);

            $query = "UPDATE rider SET Rider_Name='$RiderName', Rider_Password='$RiderPass' WHERE Rider_ID = '{$_SESSION["Rider_login"]}'";
            $result = mysqli_query($con, $query);
            
            if($result){
                echo "
                <script>
                    alert('Updated Success!');
                    window.location = 'Rider_profile.php';
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
    <title>Rider Profile</title>
    
    <link rel="stylesheet" href="CSS/updateriderprofile.css"/>

</head>
<body>
    
    <!-- Navigation Bar -->
    <?php include "./Rider_navigationBar.php" ?>
<div>

    <h1>Rider Profile</h1>

    <form action="" method="post"  style="padding-left: 130px;">
        <?php
            $query = "SELECT * FROM rider WHERE Rider_ID = '{$_SESSION["Rider_login"]}' ";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>

        <div class="UpdateProfile">

        <div class="inputBox">

                    <span class="details">ID :</span>
                    <input type="text" id="Rider_ID" name="Rider_ID" value="<?php echo $row['Rider_ID'] ?>"><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Name :</span>
                    <input type="text" id="Rider_Name" name="Rider_Name" value="<?php echo $row['Rider_Name'] ?>" ><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Password :</span>
                    <input type="password" id="Rider_Password" name="Rider_Password" value="<?php echo $row['Rider_Password'] ?>" ><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Phone Number :</span>
                    <input type="text" id="Rider_PhoneNum" name="Rider_PhoneNum" value="<?php echo $row['Rider_PhoneNum'] ?>" disabled required><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Delivery Area :</span>
                    <input type="text" id="Rider_DeliveryArea" name="Rider_DeliveryArea" value="<?php echo $row['Rider_DeliveryArea'] ?>" ><br><br>
                </div>
        </div>

        <?php
                }
            }
        ?> 
        
        <button type="submit" class="btn" name="Update">Profile Updated</button>
    </form>
</div>
</body>
</html>