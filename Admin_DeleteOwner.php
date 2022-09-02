<?php

    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["adminLogin"])){
        header("Location: login.php");

    }else{

        if(isset($_GET['deleteid'])){
            $id = $_GET['deleteid'];

            $query = "DELETE FROM restaurantowner WHERE RO_ID ='$id' ";
            $result = mysqli_query($con,$query);
        
            if($result){
                echo "
                <script>
                    alert('Delete Success!');
                    window.location = 'Admin_UserList.php';
                </script>";

            }else{
                echo "<script>alert('Delete FAILED');</script>";
                echo $con->error;
            }

        }
    }
?>