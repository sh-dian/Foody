<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Rider_login"])){
        header("Location: riderlogin.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Report</title>
</head>
</html>