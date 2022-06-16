<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Rider_login"])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html>
   <head>
        <meta http-equiv = "refresh" content = "2; url = login.php" />
        <style>
            .alert {
            padding: 20px;
            background-color: #ff9800;
            color: white;
            }

            .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
            }

            .closebtn:hover {
            color: black;
            }
        </style>
   </head>
   <body>
    <?php
        $sql = "DELETE FROM rider
        WHERE Rider_ID = '{$_SESSION["Rider_login"]}'
        ";
        // $query = $mysqli->query($sql);

        if ($conn->query($sql) === TRUE) {
            ?>
            <div class="alert">
                <strong>Success!</strong> Record DELETED!
            </div>
            <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        ?>
   </body>
</html>