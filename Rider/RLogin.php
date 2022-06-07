<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(isset($_POST["login"])){
        $uname= mysqli_real_escape_string($con, $_POST["username"]);
        $password= mysqli_real_escape_string($con, $_POST["password"]);

        $checkID = mysqli_query($con, "SELECT Rider_ID FROM rider WHERE Rider_PhoneNum='$uname' AND Rider_Password='$password' limit 1");
        
        if (mysqli_num_rows($checkID) > 0) {

            $row = mysqli_fetch_assoc($checkID);

            $_SESSION["riderID"] = $row['Rider_ID'];

            header("Location: RHomePage.php");

        } else {
            echo "<script>alert('Login details is incorrect. Please try again.');</script>";
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form Rider</title>
    
    <link rel="stylesheet" href="CSS/riderLogin.css">
    <script src="https://kit.fontawesome.com/bcdb11579f.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="form-container">

            <form action="#" method="post">
                    <div>
                        <img src="CSS/logo.png" alt="Foody Logo" class="image">
                        <h1>RIDER</h1>
                    </div>
                    
                    <div class="inputBox">
                        <input type="text" name="username" placeholder="Enter Rider ID" required>
                        <div class="icon"><i class="fa-solid fa-user-large"></i></div>
                    </div>

                    <div class="inputBox">
                        <input type="password" name="password" placeholder="Enter Rider Password" required>
                        <div class="icon"><i class="fa-solid fa-user-lock"></i></div>
                    </div>

                    <input type="submit" value="Login" class="button" name="login">
            </form>
        </div>
    </div>

</body>
</html>