<?php session_start();
?>
<!DOCTYPE html>
<html>
   <head>
        <title>HTML Meta Tag</title>
        <meta http-equiv = "refresh" content = "2; url = riderlogin.php" />
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
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "foody";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

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