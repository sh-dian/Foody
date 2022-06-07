<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Cust_login"])){
        header("Location: Login.php");
    }
    else{
        if(isset($_POST["Update"])){

            $adminName = mysqli_real_escape_string($con, $_POST["Cust_Name"]);
            $adminEmail = mysqli_real_escape_string($con, $_POST["Cust_Email"]);
            $adminPass = mysqli_real_escape_string($con, $_POST["Cust_Password"]);
            $custPhone = mysqli_real_escape_string($con, $_POST["Cust_PhoneNum"]);

<<<<<<< HEAD
            $query = "UPDATE Admin SET Cust_Name='$Cust_Name' , Cust_Email ='$Cust_Email', Cust_Password='$Cust_Password' WHERE Cust_ID = '{$_SESSION["CustID"]}'";
=======
            $query = "UPDATE customer SET Cust_Name='$Cust_Name' , Cust_Email ='$Cust_Email', Cust_Password='$Cust_Password', Cust_PhoneNum = '$custPhone' , WHERE Cust_PhoneNum = '{$_SESSION["Cust_login"]}'";
>>>>>>> cd004c7de679f704ac24bf8ebc41f28cbed3a8d3
            $result = mysqli_query($con, $query);
            
            if($result){
                echo "
                <script>
                    alert('Updated Success!');
                    window.location = 'UserProfile.php';
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
    <title>Update Customer Profile</title>

    <link rel="stylesheet" href="CSS/updateCustProfile.css">
</head>
<body>

    <!-- Navigation Bar -->
    <?php include "./NavigationBar.php" ?>

    <h1>Update Customer Profile</h1>

    <form action="" method="post">
        <?php
            $query = "SELECT * FROM Customer WHERE Cust_ID = '{$_SESSION["Cust_login"]}' ";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>

            <div class="updateCustomer">
                <div class="inputBox">
                    <span class="details">Customer ID :</span>
                    <input type="tezt" id="Cust_ID" name="Cust_ID" value="<?php echo $row['Cust_ID'] ?>" disabled required><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Customer Name :</span>
                    <input type="text" id="Cust_Name" name="Cust_Name" value="<?php echo $row['Cust_Name'] ?>"><br><br>
                </div>
                
                <div class="inputBox">
                    <span class="details">Customer Email :</span>
                    <input type="email" id="Cust_Email" name="Cust_Email" value="<?php echo $row['Cust_Email'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Customer Password :</span>
                    <input type="text" id="Cust_Password" name="Cust_Password" value="<?php echo $row['Cust_Password'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Customer Phone Num :</span>
                    <input type="text" id="Cust_PhoneNum" name="Cust_PhoneNum" value="<?php echo $row['Cust_PhoneNum'] ?>"><br><br>
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