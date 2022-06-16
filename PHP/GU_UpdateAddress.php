<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Cust_login"])){
        header("Location: login.php");
    }else{

        $id = $_GET['viewid'];

        if(isset($_POST["Update"])){

            $custState = mysqli_real_escape_string($con, $_POST["custState"]);
            $custAddress = mysqli_real_escape_string($con, $_POST["custAddress"]);
            $postCode = mysqli_real_escape_string($con, $_POST["postCode"]);

            $query = "UPDATE customer SET Cust_Address='$custAddress' WHERE Cust_ID = '$id'";

            $result = mysqli_query($con, $query);
            
            if($result){
                echo "
                <script>
                    alert('Updated Success!');
                    window.location = 'GU_ManageAddress.php';
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
    <title>Update User Address</title>

    <link rel="stylesheet" href="CSS/updateAddress.css"/>

</head>
<body>

    <!-- Navigation Bar -->
    <?php include "./GU_NavigationBar.php" ?>

    <h1>Update User Address</h1>

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
                    <label>State: </label>
                    <input type="text" id="custState" name="custState" value="<?php echo $row['Cust_State'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <label>Address: </label>
                    <input type="text" id="custAddress" name="custAddress" value="<?php echo $row['Cust_Address'] ?>"><br><br>
                </div>

                <div class="inputBox">
                    <label>PostCode: </label>
                    <input type="text" id="postCode" name="postCode" value="<?php echo $row['Cust_Poscode'] ?>"><br><br>
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