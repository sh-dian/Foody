<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Cust_login"])){
        header("Location: Login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>

    <link rel="stylesheet" href="CSS/userProfile.css"/>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./NavigationBar.php" ?>

    <h1>Customer Profile</h1>

    <form action="" method="post">
        <?php
            $query = "SELECT * FROM Customer WHERE Cust_PhoneNum = '{$_SESSION["Cust_login"]}' ";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>

        <div class="custProfile">

                <div class="inputBox">
                    <span class="details">Customer ID :</span>
                    <input type="text" id="Cust_ID" name="Cust_ID" value="<?php echo $row['Cust_ID'] ?>" disabled required><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Customer Name :</span>
                    <input type="text" id="Cust_Name" name="Cust_Name" value="<?php echo $row['Cust_Name'] ?>" disabled required><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Customer Email :</span>
                    <input type="email" id="Cust_Email" name="Cust_Email" value="<?php echo $row['Cust_Email'] ?>" disabled required><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Password :</span>
                    <input type="password" id="Cust_Password" name="Cust_Password" value="<?php echo $row['Cust_Password'] ?>" disabled required><br><br>
                </div>
        </div>

        <?php
                }
            }
        ?>    
    </form>

    <a href="UpdateUserProfile.php"><button type="submit" name="send" value="Edit" class="button">Edit</button></a>

</body>
</html>