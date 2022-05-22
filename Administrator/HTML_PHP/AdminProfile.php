<?php
    include_once 'C:\xampp\htdocs\Foody\db.php';
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
    <title>Admin Profile</title>

    <link rel="stylesheet" href="CSS/adminProfile.css"/>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./NavigationBar.php" ?>

    <h1>Admin Profile</h1>

    <form action="" method="post">
        <?php
            $query = "SELECT * FROM adminlogin WHERE Admin_ID = '{$_SESSION["adminID"]}' ";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>

            <label>Name: </label>
            <input type="text" id="admin_Name" name="admin_Name" value="<?php echo $row['Admin_Name'] ?>" disabled required><br><br>

            <label>Email: </label>
            <input type="email" id="admin_Email" name="admin_Email" value="<?php echo $row['Admin_Email'] ?>" disabled required><br><br>
        
        <?php
                }
            }
        ?>    
    </form>

    <form action="UpdateAdminProfile.php">
        <button type="submit" name="send" value="Edit" class="button">Edit</button>
    </form>

</body>
</html>