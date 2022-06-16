<?php

    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["RO_Login"])){
        header("Location: FrontUI.php");

    }else{

        if(isset($_GET['deleteid'])){
            $id = $_GET['deleteid'];

            $query = "DELETE FROM restaurantmenu WHERE RM_ID='{$_SESSION["RO_Login"]}' ";
            $result = mysqli_query($con,$query);
        
            if($result){
                echo "
                <script>
                    alert('Delete Success!');
                    window.location = 'HomePage.php';
                </script>";

            }else{
                echo "<script>alert('Delete FAILED');</script>";
                echo $con->error;
            }

        }
    }
?>