<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Rider_login"])){
        header("Location: riderlogin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rider Commission</title>
    <link rel="stylesheet" href="CSS/ridercommission.css"/>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./ridernavigationBar.php" ?>
    <div style="padding-left: 50px;">

    <h1>Rider Commission</h1>

    <form action="" method="post">
        <?php
            $query = "SELECT * FROM rider WHERE Rider_PhoneNum = '{$_SESSION["Rider_login"]}' ";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>

<div class="RiderProfile" style="padding-left: 130px;">

<div class="inputBox">
    <span class="details">Commission ID :</span>
    <input type="tezt" id="C_ID" name="C_ID" value="<?php echo $row['C_ID'] ?>" disabled required><br><br>
</div>

<div class="inputBox">
    <span class="details">Total Deliveries :</span>
    <input type="text" id="C_TotalDeliveries" name="C_TotalDeliveries" value="<?php echo $row['C_TotalDeliveries'] ?>" disabled required><br><br>
</div>

<div class="inputBox">
    <span class="details">Total Commission :</span>
    <input type="password" id="C_TotalCommission" name="C_TotalCommission" value="<?php echo $row['C_TotalCommission'] ?>" disabled required><br><br>
</div>

</div>

<?php
                }
            }
            ?>    
    </form>
    <a href="updatecommission.php"><button type="submit" name="send" value="Add" class="button">Add</button></a>

</body>
</html>