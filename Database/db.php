<?php
    $sname = "localhost";
    $uname = "root";
    $password = "";
    $db_name ="foody";
    /*
    $sname = "sql105.epizy.com";
    $uname = "epiz_31973551";
    $password = "ayCV1MqeuRhPy";
    $db_name ="epiz_31973551_foody";*/

    $con = mysqli_connect($sname, $uname, $password, $db_name);
   
    if(!$con){
        echo "Connection Failed";
    }
?>