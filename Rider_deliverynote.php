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
    <title>Delivery</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="delivery.css">
</head>
<body>
        <!-- Navigation Bar -->
        <?php include "./Rider_navigationBar.php" ?>
        <div style="padding-left: 50px;">
    <article>
        <h1>Delivery</h1>
        
    <table>
        <tr>
            <th>Order Menu</th>
            <th>Order Quantity</th>
            <th>Order Delivery Fee</th>
            <th>Order Delivery Time</th>
            <th>Order Total</th>
            <th>Update</th>
        </tr>
        <?php
             $query = "SELECT * FROM orderrecord";
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
                        <td><a href="Rider_updatedelivery.php?id=<?php echo $OrderStatus; ?>">Update</a></td>
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
</html> -->
