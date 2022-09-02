<?php

    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Cust_login"])){
        header("Location: login.php");

    }else{

        if(isset($_GET['deleteid'])){
            $id = $_GET['deleteid'];

            $query = "DELETE FROM customer WHERE Cust_ID ='$id' ";
            $result = mysqli_query($con,$query);
        
            if($result){
                echo "
                <script>
                    alert('Delete Success!');
                    window.location = 'GU_UserList.php';
                </script>";

            }else{
                echo "<script>alert('Delete FAILED');</script>";
                echo $con->error;
            }

        }
    }
?>