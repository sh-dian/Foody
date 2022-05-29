<?php

    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["adminID"])){
        header("Location: Login.php");

    }else{

        if(isset($_GET['deleteid'])){
            $id = $_GET['deleteid'];

            $query = "DELETE FROM rider WHERE Rider_ID ='$id' ";
            $result = mysqli_query($con,$query);
        
            if($result){
                echo "
                <script>
                    alert('Delete Success!');
                    window.location = 'UserList.php';
                </script>";

            }else{
                echo "<script>alert('Delete FAILED');</script>";
                echo $con->error;
            }

        }
    }
?>