<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["adminLogin"])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculation Menu</title>

    <link rel="stylesheet" href="CSS/report.css">

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./AdminBar.php" ?>

    <h1>Report</h1>

    <div class="flexbox">
        <div class="menu">

        <div class="button">
                <a href="Admin_UserReport.php"><input name="send" type="submit" value="User Report" class="button"></a>
            </div>

            <div class="button">
                <a href="Admin_Profit.php"><input name="send" type="submit" value="Profit Report" class="button"></a>
            </div>
        </div>
    </div>

</body>
</html>