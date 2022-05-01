<?php
    include_once 'db.php';

    if(isset($_POST['username'])){
    
        $uname=$_POST['username'];
        $password=$_POST['password'];
        
        $sql="SELECT * from adminlogin WHERE Admin_ID='".$uname."' AND Admin_Password='".$password."' limit 1";
        
        $result= mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result)==1){
            header ("location: adminHome.php");
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
    <title>Login Form Administrator</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="#" method="post">
        <input type="text" name="username" placeholder="Enter Admin ID"><br><br>
        <input type="password" name="password" placeholder="Enter Password"><br><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>