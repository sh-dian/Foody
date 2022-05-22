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

    <?php
        include_once 'C:\xampp\htdocs\Foody\db.php';

        $query = "SELECT * FROM adminlogin WHERE Admin_ID= 'FA001'";
        $result = $con->query($query);

        $data = $result->fetch_assoc();
        echo "Admin ID: " . $data["Admin_ID"]. "<br>Name: " . $data["Admin_Name"]. "<br>Email: " . $data["Admin_Email"]; 
    ?>

    <form action="UpdateAdminProfile.php">
        <input type="submit" name="send" value="Edit" class="button">
    </form>

</body>
</html>