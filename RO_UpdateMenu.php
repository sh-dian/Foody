<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["RO_login"])){
        header("Location: login.php");
    }
    else{
        $id = $_GET['viewid'];
        if(isset($_POST["Update"])){

            $RMMenu = mysqli_real_escape_string($con, $_POST["RM_MenuName"]);
            $RMDescription = mysqli_real_escape_string($con, $_POST["RM_Description"]);
            $RMPrice = mysqli_real_escape_string($con, $_POST["RM_Price"]);

            $query = "UPDATE restaurantmenu SET RM_MenuName='$RMMenu' , RM_Description ='$RMDescription', RM_Price='$RMPrice' WHERE RM_ID = '$id'";
            $result = mysqli_query($con, $query);
            
            if($result){
                echo "
                <script>
                    alert('Updated Success!');
                    window.location = 'RO_HomePage.php';
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
    <title>Update Menu</title>

    <link rel="stylesheet" href="CSS/updateMenu.css"/>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./RO_Navigationbar.php" ?>

    <h1>Update Menu</h1>

    <form action="" method="post">
        <?php
            $id = $_GET['viewid'];
            $query = "SELECT * FROM restaurantmenu WHERE RM_ID = '$id' ";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>

        <div class="Menu">

                <div class="inputBox">
                    <span class="details">Menu Name :</span>
                    <input type="text" id="RM_MenuName" name="RM_MenuName" value="<?php echo $row['RM_MenuName'] ?>" ><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Description :</span>
                    <input type="text" id="RM_Description" name="RM_Description" value="<?php echo $row['RM_Description'] ?>" ><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Price :</span>
                    <input type="text" id="RM_Price" name="RM_Price" value="<?php echo $row['RM_Price'] ?>"><br><br>
                </div>

        </div>

        <?php
                }
            }
        ?>    

<button type="submit" class="btn" name="Update">Update Menu</button>
    </form>
</body>
</html>