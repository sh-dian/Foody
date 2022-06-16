<?php

    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["RO_Login"])){
        header("Location: login.php");

    }else{

        if(isset($_GET['RM_ID'])){
            $id = $_GET['RM_ID'];

            $query = "DELETE FROM restaurantmenu WHERE RM_ID= '$id' ";
            $result = mysqli_query($con,$query);
        
            if($result){
                echo "
                <script>
                    alert('Delete Success!');
                    window.location = 'RO_HomePage.php';
                </script>";

            }else{
                echo "<script>alert('Delete FAILED');</script>";
                echo $con->error;
            }

        }
    }
?>