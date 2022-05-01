<?php
    $sname = "localhost";
    $uname = "root";
    $password = "";
    $db_name ="test";

    $con = new mysqli($sname, $uname, $password, $db_name);
   
    if(!$con){
        echo "Connection Failed";
    }
    else{
        echo "Connection Success";
    }
?>