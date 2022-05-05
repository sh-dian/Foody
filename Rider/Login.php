<?php
    include_once 'C:\xampp\htdocs\Foody\db.php';

    if(isset($_POST['username'])){
    
        $uname=$_POST['username'];
        $password=$_POST['password'];
        
        $sql="SELECT * from rider WHERE Rider_PhoneNum='".$uname."' AND Rider_Password='".$password."' limit 1";
        
        $result= mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result)==1){
            header ("location: HomePage.php");
            exit();
        }
        else{
            echo " You Have Entered Incorrect Password";
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rider Login</title>

    <link rel="stylesheet" href="CSS/riderLogin.css">
    <script src="https://kit.fontawesome.com/bcdb11579f.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
        <div>
            <img src="CSS/rider.svg" alt="Restaurant Owner Illustrations" class="image">
        </div>

        <div class="form-container">
            <form action="#" method="post">
                <div>
                    <img src="CSS/logo.png" alt="Foody Logo" class="logo">
                </div>

                <div>
                    <h1 class="title">Rider</h1>
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
    
                <input type="submit" value="Login" class="button">
        </form>
        </div>
    </div>
    
</body>
</html>