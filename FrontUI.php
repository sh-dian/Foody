<?php

    if(isset($_POST['send'])){
        $getType = $_POST['userType'];

        if($getType === 'User'){
            header ("location: GeneralUser\Login.php");
            exit();
        }
        else if($getType === 'Rider'){
            header ("location: Rider\Login.php");
            exit();
        }
        else if($getType === 'Restaurant Owner'){
            header ("location: RestaurantOwner\Login.php");
            exit();
        }
        else if($getType === 'Administrator'){
            header ("location: Administrator\HTML_PHP\Login.php");
            exit();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Foody</title>

    <link rel="stylesheet" href="FrontUI.css">
</head>
<body>
    <div class="flexbox">
        <div class="main">
            <div class="logo">
                <img src="Administrator/HTML_PHP/CSS/logo.png" alt="Foody Logo">
            </div>

            <form action="#" method="post">
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
    </div>

</body>
</html>