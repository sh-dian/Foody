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

        <form action="DatabasePHP/addUser.php" method="post">
            <div class="newUser">
                <div class="inputBox">
                    <span class="details">Full Name</span>
                    <input class="input1" type="text" name="name" placeholder="Enter full name">
                </div>

                <div class="inputBox">
                    <span class="details">Password</span>
                    <input class="input1" type="password" name="pass" placeholder="Enter Password">
                </div>

                <div class="inputBox">
                    <span class="details">Email</span>
                    <input class="input1" type="text" name="email" placeholder="Enter Email">
                </div>

                <div class="inputBox">
                    <span class="details">Phone Number</span>
                    <input class="input1" type="text" name="phoneNum" placeholder="Enter Phone Number">
                </div>

                <div class="inputBox">
                    <span class="details">Address</span>
                    <input class="input3" type="text" name="address" placeholder="Enter full address">
                </div>

            </div>

            <div class="button">
                <input name="send" type="submit" value="Add_Data" class="button">
            </div>

        </form>
    </div>

    <!--
    <div class="toast">
        <div class="content">
            <i class="fas fa-solid fa-check check"></i>

            <div class="message">
                <span class="text toast1">Success</span>
                <span class="text toast2">Data already add</span>
            </div>

            <i class="fa-solid fa-xmark close"></i>
            <div class="progress"></div>
        </div>
    </div>
    -->

</body>
</html>