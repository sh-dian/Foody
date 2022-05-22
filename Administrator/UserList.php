<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="CSS/userList.css">

    <title>User List</title>
</head>
<body>

    <!-- Navigation Bar -->

    <div class="flexbox1">
        <div class="title"><h1>User List</h1></div>

        <form action="">
            <div class="dropdownMenu">    
                    <select name="userType" id="user">

                        <option disable selected value>Choose User Type</option>
                        <option value="User">General User</option>
                        <option value="Rider">Rider</option>
                        <option value="Restaurant Owner">Restaurant Owner</option>
                        <option value="Administrator">Administrator</option>

                    </select>       
                </div>

                <div class="button">
                    <input name="send" type="submit" value="Next" class="button">
                </div>
        </form>
    </div>

    <div class="flexbox2">

    </div>
    
</body>
</html>