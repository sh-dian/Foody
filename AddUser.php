<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["adminLogin"])){
        header("Location: login.php");
    }
    else{
        
        if(isset($_POST["Add_Data"])){
            $name = mysqli_real_escape_string($con, $_POST["name"]);
            $pass = mysqli_real_escape_string($con, $_POST["pass"]);
            $email = mysqli_real_escape_string($con, $_POST["email"]);
            $phoneNum = mysqli_real_escape_string($con, $_POST["phoneNum"]);
            $address = mysqli_real_escape_string($con, $_POST["address"]);
            $poscode = mysqli_real_escape_string($con, $_POST["poscode"]);
            $state = mysqli_real_escape_string($con, $_POST["state"]);

            $query= "INSERT INTO customer(Cust_Name,Cust_Password,Cust_Email,Cust_PhoneNum,Cust_Address, Cust_Poscode, Cust_State) VALUES('$name','$pass','$email','$phoneNum','$address', '$poscode', '$state')";
            $result = mysqli_query($con,$query);

            if($result){
                echo "
                <script>
                    alert('Data Added Success!');
                    window.location = 'Admin_UserList.php';
                </script>";

            }else{
                echo "<script>alert('Data Added FAILED');</script>";
                echo $con->error;
            }
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>

    <link rel="stylesheet" href="CSS/addUser.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

</head>
<body>
    
    <div class="flexbox">
        <div class="title"><h1>Add New User</h1></div>

        <form action="" method="post">
            <div class="newUser">

                <div class="inputBox">
                    <span class="details">Full Name</span>
                    <input class="input1" type="text" name="name" placeholder="Enter full name" required>
                </div>

                <div class="inputBox">
                    <span class="details">Password</span>
                    <input class="input1" type="password" name="pass" placeholder="Enter Password" required>
                </div>

                <div class="inputBox">
                    <span class="details">Email</span>
                    <input class="input1" type="text" name="email" placeholder="Enter Email" required>
                </div>

                <div class="inputBox">
                    <span class="details">Phone Number</span>
                    <input class="input1" type="text" name="phoneNum" placeholder="Enter Phone Number" required>
                </div>

                <div class="inputBox">
                    <span class="details">Poscode</span>
                    <input class="input1" type="text" name="poscode" placeholder="Enter Poscode" required>
                </div>

                <div class="inputBox">
                    <span class="details">State</span>
                    <input class="input1" type="text" name="state" placeholder="Enter State" required>
                </div>

                <div class="inputBox">
                    <span class="details">Address</span>
                    <input class="input3" type="text" name="address" placeholder="Enter full address" required>
                </div>

            </div>

            <div class="button">
                <button name="Add_Data" type="submit" value="Add Data" class="button">Add Data</button>
            </div>

        </form>
    </div>

</body>
</html>