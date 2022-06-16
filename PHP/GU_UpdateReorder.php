<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Cust_login"])){
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

                $query = "SELECT * FROM orderrecord WHERE Cust_ID = '$id' ";
                $result = mysqli_query($con, $query);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
        ?>
            <div class="display">
                
                <div class="inputBox">
                    <label>Order ID: </label>
                    <input type="text" id="orderID" name="orderID" value="<?php echo $row['Order_ID'] ?>" disabled required><br><br>
                </div>

                <div class="inputBox">
                    <label>Delivery Time: </label>
                    <input type="text" id="deliveryTime" name="deliveryTime" value="<?php echo $row['Order_DeliveryTime'] ?>" disabled required><br><br>
                </div>

                <div class="inputBox">
                    <label>Menu List: </label>
                    <input type="text" id="menuList" name="menuList" value="<?php echo $row['Order_MenuName'] ?>" disabled required><br><br>
                </div>

                <div class="inputBox">
                    <label>Quantity: </label>
                    <input type="text" id="quantity" name="quantity" value="<?php echo $row['Order_Quantity'] ?>"><br><br>
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