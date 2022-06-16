<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Cust_login"])){
        header("Location: login.php");
    }
    else{
        if(isset($_POST["Update"])){

            $CustName = mysqli_real_escape_string($con, $_POST["Cust_Name"]);
            $CustEmail = mysqli_real_escape_string($con, $_POST["Cust_Email"]);
            $CustPass = mysqli_real_escape_string($con, $_POST["Cust_Password"]);

            $query = "UPDATE customer SET Cust_Name='$CustName' , Cust_Email ='$CustEmail', Cust_Password='$CustPass' WHERE Cust_ID = '{$_SESSION["Cust_login"]}'";
            $result = mysqli_query($con, $query);
            
            if($result){
                echo "
                <script>
                    alert('Updated Success!');
                    window.location = 'GU_UserProfile.php';
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
    <title>Restaurant Owner Profile</title>

    <link rel="stylesheet" href="CSS/updateCustProfile.css"/>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./GU_Navigationbar.php" ?>

    <h1>Customer Profile</h1>

    <form action="" method="post">
        <?php
            $query = "SELECT * FROM customer WHERE Cust_ID = '{$_SESSION["Cust_login"]}' ";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>

        <div class="updateProfile">

                <div class="inputBox">
                    <span class="details">Customer ID :</span>
                    <input type="tezt" id="Cust_ID" name="Cust_ID" value="<?php echo $row['Cust_ID'] ?>" ><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Customer Name :</span>
                    <input type="text" id="Cust_Name" name="Cust_Name" value="<?php echo $row['Cust_Name'] ?>" ><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Customer Email :</span>
                    <input type="email" id="Cust_Email" name="Cust_Email" value="<?php echo $row['Cust_Email'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Password :</span>
                    <input type="password" id="Cust_Password" name="Cust_Password" value="<?php echo $row['Cust_Password'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Phone Number :</span>
                    <input type="text" id="Cust_PhoneNum" name="Cust_PhoneNum" value="<?php echo $row['Cust_PhoneNum'] ?>" disabled required><br><br>
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