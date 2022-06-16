<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Rider_login"])){
        header("Location: riderlogin.php");
    }
?>

<!DOCTYPE html>
<html lag="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="CSS/ridercommission.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script> -->
        <title>Rider Home</title>

        <link rel="stylesheet" href="riderhome.css">

        <script src="JavaScript/function.js"></script>
        <script src="https://kit.fontawesome.com/bcdb11579f.js" crossorigin="anonymous"></script>

    </head>
    <body>

        <!--ridernavigationBar-->
        <?php 
        include "./ridernavigationBar.php" 
        ?>
    <article>
        <h1>Delivery</h1>
        
    <table>
        <tr>
            <th scope="col">Order Menu</th>
            <th scope="col">Order Quantity</th>
            <th scope="col">Order Delivery Fee</th>
            <th scope="col">Order Delivery Time</th>
            <th scope="col">Order Total</th>
            <th scope="col">Update</th>
        </tr>
        <?php
             $query = "SELECT * FROM orderrecord WHERE Rider_ID = '{$_SESSION["Rider_login"]}' ";
             $result = mysqli_query($con,$query);

             if (mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $Menu = $row["Order_MenuName"];
                    $Quantity = $row["Order_Quantity"];
                    $DeliveryFee = $row["Order_DeliveryFee"];
                    $DeliveryTime = $row["Order_DeliveryTime"];
                    $OrderTotal = $row["Order_Total"];
        ?>

                    <tr>
                        <td><?php echo $Menu;?></td>
                        <td><?php echo $Quantity;?></td>
                        <td><?php echo $DeliveryFee;?></td>
                        <td><?php echo $DeliveryTime;?></td>
                        <td><?php echo $OrderTotal;?></td>
                        <td><a href="updatedelivery.php?id=<?php echo $OrderStatus; ?>">Update</a></td>
                    </tr>
        <?php
                }
             } else {
                  echo "0 results";
             }


        ?>
        </tr>
    </table>
    </article>

    </body>
    </html>
