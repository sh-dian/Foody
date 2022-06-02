<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';

    session_start();

    if(isset($_POST["login"])){
        $uname= mysqli_real_escape_string($con, $_POST["username"]);
        $password= mysqli_real_escape_string($con, $_POST["password"]);

        $checkEmail = mysqli_query($con, "SELECT * from restaurantowner WHERE RO_PhoneNum='".$uname."' AND RO_Password='".$password."' limit 1");
        
        if (mysqli_num_rows($checkEmail) > 0) {

            $row = mysqli_fetch_assoc($checkEmail);

            $_SESSION["RO_login"] = $row['RO_PhoneNum'];

            header("Location: HomePage.php");

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
    <title>Restaurant Owner Login</title>

    <link rel="stylesheet" href="CSS/ownerLogin.css">
    <script src="https://kit.fontawesome.com/bcdb11579f.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">

        <div class="form-container">
            <form action="#" method="post">
                <div>
                    <img src="CSS/logo.png" alt="Foody Logo" class="logo">
                </div>

                <div>
                    <h1 class="title">Restaurant Owner</h1>
                </div>
                
                <div class="inputBox">
                    <input type="text" name="username" placeholder="Enter Phone Number" required>
                    <div class="icon"><i class="fa-solid fa-user-large"></i></div>
                </div>
    
                <div class="inputBox">
                    <input type="password" name="password" placeholder="Enter Password" required>
                    <div class="icon"><i class="fa-solid fa-user-lock"></i></div>
                </div>
    
                <div class="forgotLink">
                    <a href="#" target="_blank">Forgot Password ?</a>
                </div>
    
                <input type="submit" value="Login" class="button" name="login">
        </form>
        </div>

        <div>
            <img src="CSS/restaurant.svg" alt="Restaurant Owner Illustrations" class="image">
        </div>
    </div>
    
</body>
</html>