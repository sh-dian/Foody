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
    <title>Admin Profile</title>

    <link rel="stylesheet" href="CSS/adminProfile.css"/>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./AdminBar.php" ?>

    <h1>Admin Profile</h1>

    <form action="" method="post">
        <?php
            $query = "SELECT * FROM Admin WHERE Admin_ID = '{$_SESSION["adminLogin"]}' ";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>

        <div class="adminProfile">

                <div class="inputBox">
                    <span class="details">Admin ID :</span>
                    <input type="tezt" id="admin_id" name="admin_id" value="<?php echo $row['Admin_ID'] ?>" disabled required><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Admin Name :</span>
                    <input type="text" id="admin_Name" name="admin_Name" value="<?php echo $row['Admin_Name'] ?>" disabled required><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Admin Email :</span>
                    <input type="email" id="admin_Email" name="admin_Email" value="<?php echo $row['Admin_Email'] ?>" disabled required><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Admin Password :</span>
                    <input type="password" id="admin_pass" name="admin_pass" value="<?php echo $row['Admin_Password'] ?>" disabled required><br><br>
                </div>
        </div>

        <?php
                }
            }
        ?>    
    </form>

    <a href="Admin_UpdateAdminProfile.php"><button type="submit" name="send" value="Edit" class="button">Edit</button></a>

</body>
</html>