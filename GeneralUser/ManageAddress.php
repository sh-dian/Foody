<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["adminID"])){
        header("Location: Login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Address</title>


</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./NavigationBar.php" ?>

    <h1>Manage Address</h1>

    <form action="" method="post">
        <?php
            $query = "SELECT * FROM customer WHERE Cust_PhoneNum = '{$_SESSION["Cust_PhoneNum"]}' ";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>

        <div class="userAddress">

                <div class="inputBox">
                    <span class="details">Customer Name :</span>
                    <input type="tezt" id="cust_name" name="cust_name" value="<?php echo $row['Cust_Name'] ?>" disabled required><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Customer Address :</span>
                    <input type="text" id="cust_Address" name="cust_Address" value="<?php echo $row['Cust_Address'] ?>" disabled required><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Customer Poscode :</span>
                    <input type="email" id="cust_Poscode" name="cust_Poscode" value="<?php echo $row['Cust_Poscode'] ?>" disabled required><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Customer State :</span>
                    <input type="password" id="cust_state" name="cust_state" value="<?php echo $row['Cust_State'] ?>" disabled required><br><br>
                </div>
        </div>

        <?php
                }
            }
        ?>    
    </form>

    <a href="UpdateAdminProfile.php"><button type="submit" name="send" value="Edit" class="button">Edit</button></a>

</body>
</html>