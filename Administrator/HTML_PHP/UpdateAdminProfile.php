<?php
    include_once 'C:\xampp\htdocs\Foody\db.php';
    session_start();

    if(!isset($_SESSION["adminID"])){
        header("Location: Login.php");
    }
    else{
        if(isset($_POST["Update"])){
            $adminName = mysqli_real_escape_string($con, $_POST["admin_Name"]);

            $query = "UPDATE adminlogin SET Admin_Name='$adminName' WHERE Admin_ID = '{$_SESSION["adminID"]}'";
            $result = mysqli_query($con, $query);
            
            if($result){
                echo "
                <script>
                    alert('Updated Success!');
                    window.location = 'AdminProfile.php';
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
    <title>Update Admin Profile</title>

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

    <h1>Update Admin Profile</h1>

    <form action="" method="post">
        <?php
            $query = "SELECT * FROM adminlogin WHERE Admin_ID = '{$_SESSION["adminID"]}' ";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>

            <label>Name: </label>
            <input type="text" id="admin_Name" name="admin_Name" value="<?php echo $row['Admin_Name'] ?>"><br><br>

            <label>Email: </label>
            <input type="email" id="admin_Email" name="admin_Email" value="<?php echo $row['Admin_Email'] ?>" ><br><br>
        
        <?php
                }
            }
        ?>

            <button type="submit" class="btn" name="Update">Update Profile</button>
    </form>

</body>
</html>