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
    <title>Admin Profile</title>

    <link rel="stylesheet" href="CSS/userProfile.css"/>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./GU_NavigationBar.php" ?>

    <h1>Admin Profile</h1>

    <form action="" method="post">
        <?php
            $query = "SELECT * FROM customer WHERE Cust_PhoneNum = '{$_SESSION["Cust_login"]}' ";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>

        <div class="UserProfile">

                <div class="inputBox">
                    <span class="details">User ID :</span>
                    <input type="tezt" id="cust_id" name="cust_id" value="<?php echo $row['Cust_ID'] ?>" disabled required><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">User Name :</span>
                    <input type="text" id="cust_Name" name="cust_Name" value="<?php echo $row['Cust_Name'] ?>" disabled required><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">User Email :</span>
                    <input type="email" id="cust_Email" name="cust_Email" value="<?php echo $row['Cust_Email'] ?>" disabled required><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">User Password :</span>
                    <input type="password" id="cust_pass" name="cust_pass" value="<?php echo $row['Cust_Password'] ?>" disabled required><br><br>
                </div>
        </div>

        <?php
                }
            }
        ?>    
    </form>

    <a href="GU_UpdateUserProfile.php"><button type="submit" name="send" value="Edit" class="button">Edit</button></a>

</body>
</html>