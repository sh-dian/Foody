<?php 
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
};
?>
<!DOCTYPE html>
<html>
   <head>
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

    $Order_ID = $_GET['Order_ID'];

        $sql = "UPDATE orderrecord
        SET Order_DeliveryTime = NOW()
        WHERE Order_ID = '$Order_ID'
        ";
        // $query = $mysqli->query($sql);

        if ($conn->query($sql) === TRUE) {
            ?>
            <div class="alert">
                <strong>Success!</strong> Order Delivered!
            </div>
            <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        ?>
   </body>
</html>