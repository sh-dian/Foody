<?php
    include_once 'C:\xampp\htdocs\Foody\db.php';

    $name = $_POST["name"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $phoneNum = $_POST["phoneNum"];
    $address = $_POST["address"];

    if($_POST['send']=='Add_Data'){

        $query= "INSERT INTO customer(Cust_Name,Cust_Password,Cust_Email,Cust_PhoneNum,Cust_Address) VALUES('$name','$pass','$email','$phoneNum','$address')";
        mysqli_query($con,$query);

        if(!$query){
            echo "Failed";
        }
        else{
            echo "Success";
        }

    }
?>