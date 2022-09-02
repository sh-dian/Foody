<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["adminLogin"])){
        header("Location: login.php");
    }
    else{
        if(isset($_POST["Update"])){

            $adminName = mysqli_real_escape_string($con, $_POST["admin_Name"]);
            $adminEmail = mysqli_real_escape_string($con, $_POST["admin_Email"]);
            $adminPass = mysqli_real_escape_string($con, $_POST["admin_pass"]);

            $query = "UPDATE Admin SET Admin_Name='$adminName' , Admin_Email ='$adminEmail', Admin_Password='$adminPass' WHERE Admin_Email = '{$_SESSION["adminLogin"]}'";
            $result = mysqli_query($con, $query);
            
            if($result){
                echo "
                <script>
                    alert('Updated Success!');
                    window.location = 'AdminProfile.php';
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
    <title>Update Admin Profile</title>

    <link rel="stylesheet" href="CSS/updateAdminProfile.css">
</head>
<body>

    <!-- Navigation Bar -->
    <?php include "./AdminBar.php" ?>

    <h1>Update Admin Profile</h1>

    <form action="" method="post">
        <?php
            $query = "SELECT * FROM Admin WHERE Admin_ID = '{$_SESSION["adminLogin"]}' ";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>

            <div class="updateAdmin">
                <div class="inputBox">
                    <span class="details">Admin ID :</span>
                    <input type="tezt" id="admin_id" name="admin_id" value="<?php echo $row['Admin_ID'] ?>" disabled required><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Admin Name :</span>
                    <input type="text" id="admin_Name" name="admin_Name" value="<?php echo $row['Admin_Name'] ?>"><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Admin Email :</span>
                    <input type="email" id="admin_Email" name="admin_Email" value="<?php echo $row['Admin_Email'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Admin Password :</span>
                    <input type="text" id="admin_pass" name="admin_pass" value="<?php echo $row['Admin_Password'] ?>"><br><br>
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