<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["adminLogin"])){
        header("Location: login.php");
    }else{

        $id = $_GET['viewid'];

        if(isset($_POST["Update"])){
            $custName = mysqli_real_escape_string($con, $_POST["custName"]);
            $query = "UPDATE customer SET Cust_Name='$custName' WHERE Cust_ID = '$id'";

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

                $query = "SELECT * FROM customer WHERE Cust_ID = '$id' ";
                $result = mysqli_query($con, $query);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
        ?>
            <div class="display">
                
                <div class="inputBox">
                    <label>ID: </label>
                    <input type="text" id="custID" name="custID" value="<?php echo $row['Cust_ID'] ?>" disabled required><br><br>
                </div>

                <div class="inputBox">
                    <label>Full Name: </label>
                    <input type="text" id="custName" name="custName" value="<?php echo $row['Cust_Name'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <label>Phone Number: </label>
                    <input type="text" id="custPhoneNum" name="custPhoneNum" value="<?php echo $row['Cust_PhoneNum'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <label>Address: </label>
                    <input type="text" id="custAddress" name="custAddress" value="<?php echo $row['Cust_Address'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <label>Email: </label>
                    <input type="text" id="custEmail" name="custEmail" value="<?php echo $row['Cust_Email'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <label>Password: </label>
                    <input type="text" id="custPassword" name="custPassword" value="<?php echo $row['Cust_Password'] ?>"><br><br>
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