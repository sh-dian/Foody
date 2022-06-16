<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["adminLogin"])){
        header("Location: login.php");
    }else{

        $id = $_GET['viewid'];

        if(isset($_POST["Update"])){
            $roName = mysqli_real_escape_string($con, $_POST["roName"]);
            $query = "UPDATE restaurantowner SET RO_Name='$roName' WHERE RO_ID = '$id'";

            $result = mysqli_query($con, $query);
            
            if($result){
                echo "
                <script>
                    alert('Updated Success!');
                    window.location = 'Admin_UserList.php';
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
    <title>Update User Profile</title>

    <link rel="stylesheet" href="CSS/updateUser.css"/>

</head>
<body>

    <!-- Navigation Bar -->
    <?php include "./AdminBar.php" ?>

    <h1>Update User Profile</h1>

    <form action="" method="post">
        <?php
            if(isset($_GET['viewid'])){
                $id = $_GET['viewid'];

                $query = "SELECT * FROM restaurantowner WHERE RO_ID = '$id' ";
                $result = mysqli_query($con, $query);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
        ?>
            <div class="display">
                
                <div class="inputBox">
                    <label>ID: </label>
                    <input type="text" id="roID" name="roID" value="<?php echo $row['RO_ID'] ?>" disabled required><br><br>
                </div>

                <div class="inputBox">
                    <label>Full Name: </label>
                    <input type="text" id="roName" name="roName" value="<?php echo $row['RO_Name'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <label>Phone Number: </label>
                    <input type="text" id="roPhoneNum" name="roPhoneNum" value="<?php echo $row['RO_PhoneNum'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <label>Email: </label>
                    <input type="text" id="roEmail" name="roEmail" value="<?php echo $row['RO_Email'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <label>Address: </label>
                    <input type="text" id="roAddress" name="roAddress" value="<?php echo $row['RO_Address'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <label>Password: </label>
                    <input type="text" id="roPass" name="roPass" value="<?php echo $row['RO_Password'] ?>"><br><br>
                </div>

            </div>
        <?php
                    }
                }
            }
        ?>   
        
        <button type="submit" class="btn" name="Update">Save</button>
    </form>
    
</body>
</html>