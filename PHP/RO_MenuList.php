<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["RO_login"])){
        header("Location: login.php");

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu List</title>

    <link rel="stylesheet" href="CSS/addUser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

</head>
<body>
    <div class="navbar">
    <ul>
        <li><a href="#logo"><img src="CSS/logo.png" alt="Foody Logo" class="image"></a></li>
        <li style="float:right"><a class="active" href="#profile"></a></li>
    </ul>
    </div>

    

</body>
</html>