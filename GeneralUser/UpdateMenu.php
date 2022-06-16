<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Cust_login"])){
        header("Location: FrontUI.php");
    }else{

        $id = $_GET['viewid'];

        if(isset($_POST["Update"])){
            $custName = mysqli_real_escape_string($con, $_POST["custName"]);
            $query = "UPDATE restaurantmenu SET RM_MenuName='$menuName' WHERE RM_ID = '$id'";

            $result = mysqli_query($con, $query);
            
            if($result){
                echo "
                <script>
                    alert('Updated Success!');
                    window.location = 'Menu.php';
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
    <title>Update Menu</title>

    <link rel="stylesheet" href="CSS/updateMenu.css"/>

</head>
<body>

    <!-- Navigation Bar -->
    <?php include "./NavigationBar.php" ?>

    <h1>Update Menu</h1>

    <form action="" method="post">
        <?php
            if(isset($_GET['viewid'])){
                $id = $_GET['viewid'];

                $query = "SELECT * FROM restaurantmenu WHERE Rest_ID = '$id' ";
                $result = mysqli_query($con, $query);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
        ?>
            <div class="display">
                
                <div class="inputBox">
                    <label>Menu : </label>
                    <input type="text" id="menuName" name="menuName" value="<?php echo $row['RM_MenuName'] ?>" disabled required><br><br>
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