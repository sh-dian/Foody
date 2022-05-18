<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>

    <link rel="stylesheet" href="CSS/addUser.css">

</head>
<body>
    
    <div class="container">
        <div class="title"><h1>Add New User</h1></div>

        <form action="#">
            <div class="newUser">
                <div class="inputBox">
                    <span class="details">Full Name</span>
                    <input type="text" name="fullname">
                </div>

                <div class="inputBox">
                    <span class="details">Account Password</span>
                    <input type="password" name="password">
                </div>

                <div class="inputBox">
                    <span class="details">Email</span>
                    <input type="text" name="email">
                </div>

                <div class="inputBox">
                    <span class="details">Phone Number</span>
                    <input type="text" name="phoneNum">
                </div>

                <div class="inputBox">
                    <span class="details">Address</span>
                    <input type="text" name="address">
                </div>

            </div>

            <div class="button">
                <input type="submit" value="Add Data">
            </div>

        </form>
    </div>

</body>
</html>