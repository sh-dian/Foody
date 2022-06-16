<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';

    session_start();

    if(isset($_POST['send'])){
        $getType = $_POST['userType'];

        if($getType === 'User'){
            $uname= mysqli_real_escape_string($con, $_POST["username"]);
            $password= mysqli_real_escape_string($con, $_POST["password"]);

            $checkEmail = mysqli_query($con, "SELECT * from customer WHERE Cust_PhoneNum='".$uname."' limit 1");
            
            if (mysqli_num_rows($checkEmail) > 0) {

                $row = mysqli_fetch_assoc($checkEmail);

                $_SESSION["Cust_login"] = $row['Cust_ID'];

                header("Location: GU_HomePage.php");

            } else {
                echo "<script>alert('Login details is incorrect. Please try again.');</script>";
            }
        }
        else if($getType === 'Rider'){

            $uname= mysqli_real_escape_string($con, $_POST["username"]);
            $password= mysqli_real_escape_string($con, $_POST["password"]);

            $checkEmail = mysqli_query($con, "SELECT * from rider WHERE Rider_PhoneNum='".$uname."' limit 1");
            
            if (mysqli_num_rows($checkEmail) > 0) {

                $row = mysqli_fetch_assoc($checkEmail);

                $_SESSION["Rider_login"] = $row['Rider_ID'];

                header("Location: Rider_homepage.php");

            } else {
                echo "<script>alert('Login details is incorrect. Please try again.');</script>";
            }
        }
        else if($getType === 'Restaurant Owner'){

            $uname= mysqli_real_escape_string($con, $_POST["username"]);
            $password= mysqli_real_escape_string($con, $_POST["password"]);

            $checkEmail = mysqli_query($con, "SELECT * from restaurantowner WHERE RO_PhoneNum='".$uname."' limit 1");
            
            if (mysqli_num_rows($checkEmail) > 0) {

                $row = mysqli_fetch_assoc($checkEmail);

                $_SESSION["RO_login"] = $row['RO_ID'];

                header ("location: RO_HomePage.php");
                exit();

            } else {
                echo "<script>alert('Login details is incorrect. Please try again.');</script>";
            }

        }
        else if($getType === 'Administrator'){

            $username= mysqli_real_escape_string($con, $_POST["username"]);
            $password= mysqli_real_escape_string($con, $_POST["password"]);

            $checkID = mysqli_query($con, "SELECT Admin_ID, Admin_Email FROM admin WHERE Admin_Email='$username'limit 1");
            
            if (mysqli_num_rows($checkID) > 0) {

                $row = mysqli_fetch_assoc($checkID);

                $_SESSION["adminLogin"] = $row['Admin_ID'];

                header ("location: Admin_HomePage.php");
                exit();

            } else {
                echo "<script>alert('Login details is incorrect. Please try again.');</script>";
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
    <title>Login</title>

    <link rel="stylesheet" href="CSS/userLogin.css">
    <script src="https://kit.fontawesome.com/bcdb11579f.js" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container">
        <form action="#" method="post">
            <div>
                <img src="CSS/logo.png" alt="Foody Logo" class="image">
                <h1>WELCOME TO FOODY</h1>
            </div> <br>

            <div class="dropdownMenu">
                    
                    <select name="userType" id="user">

                        <option disable selected value>Choose User Type</option>
                        <option value="User">General User</option>
                        <option value="Rider">Rider</option>
                        <option value="Restaurant Owner">Restaurant Owner</option>
                        <option value="Administrator">Administrator</option>

                    </select>
                    
            </div>
            
            <div class="inputBox">
                <input type="text" name="username" placeholder="Enter Phone Number" >
                <div class="icon"><i class="fa-solid fa-user-large"></i></div>
            </div>

            <div class="inputBox">
                <input type="password" name="password" placeholder="Enter Password" >
                <div class="icon"><i class="fa-solid fa-user-lock"></i></div>
            </div>

            <div class="forgotLink">
                <a href="#" target="_blank">Forgot Password ?</a>
            </div>

            <input type="submit" value="Login" class="button" name="send">
    </form>
    </div>
    
</body>
</html>