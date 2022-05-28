<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["adminID"])){
        header("Location: Login.php");
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
                    window.location = 'UserList.php';
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

    <style>
        body{
            margin-left: 45%;
            margin-top: 15%;
            padding: 0;
        }
    </style>

</head>
<body>

    <!-- Navigation Bar -->
    <?php include "./NavigationBar.php" ?>

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

            <label>User ID: </label>
            <input type="text" id="custID" name="custID" value="<?php echo $row['Cust_ID'] ?>"><br><br>

            <label>User Name: </label>
            <input type="text" id="custName" name="custName" value="<?php echo $row['Cust_Name'] ?>"><br><br>
        
        <?php
                    }
                }
            }
        ?>   
        
        <button type="submit" class="btn" name="Update">Save</button>
    </form>
    
</body>
</html>