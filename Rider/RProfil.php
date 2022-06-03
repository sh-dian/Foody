<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["adminID"])){
        header("Location: RLogin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rider Profile</title>

    <link rel="stylesheet" href="riderProfile.css"/>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./RNavigationBar.php" ?>

    <h1>Rider Profile</h1>

    <form action="" method="post">
        <?php
            $query = "SELECT * FROM Admin WHERE Rider_ID = '{$_SESSION["riderID"]}' ";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>

        <div class="riderProfile">

                <div class="inputBox">
                    <span class="details">Rider ID :</span>
                    <input type="text" id="rider_id" name="rider_id" value="<?php echo $row['Rider_ID'] ?>" disabled required><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Rider Name :</span>
                    <input type="text" id="rider_Name" name="rider_Name" value="<?php echo $row['Rider_Name'] ?>" disabled required><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Rider Password :</span>
                    <input type="password" id="rider_pass" name="rider_pass" value="<?php echo $row['Rider_Password'] ?>" disabled required><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Rider Phone Number :</span>
                    <input type="tel" id="rider_PhoneNum" name="rider_PhoneNum" value="<?php echo $row['Rider_PhoneNum'] ?>" disabled required><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Rider Delivery Area :</span>
                    <input type="text" id="rider_DeliveryArea" name="rider_DeliveryArea" value="<?php echo $row['Rider_DeliveryArea'] ?>" disabled required><br><br>
                </div>
        </div>

        <?php
                }
            }
        ?>    
    </form>

    <a href="UpdateRiderProfile.php"><button type="submit" name="send" value="Edit" class="button">Edit</button></a>

</body>
</html>