<?php
    $sname = "localhost";
    $uname = "root";
    $password = "";
    $db_name ="test";

    try{
        $con = new PDO("mysql:host=$sname; dbname=$db_name", $uname, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Success";
    }
    catch (PDOException $e){
        echo "Error in connection" . $e->getMessage();
    }
?>