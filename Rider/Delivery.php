<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Rider_login"])){
        header("Location: riderlogin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Rider Delivery</title>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./ridernavigationBar.php" ?>
    <div style="padding-left: 50px;">

    <h1>Rider Delivery</h1>

    <form action="" method="post">
        <?php
            $query = "SELECT * FROM rider WHERE Rider_PhoneNum = '{$_SESSION["Rider_login"]}' ";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>

<div class="RiderDelivery" style="padding-left: 130px;">

<div class="inputBox">
    <span class="details">Order_ID :</span>
    <input type="tezt" id="Order_ID" name="Order_ID" value="<?php echo $row['Order_ID'] ?>" disabled required><br><br>
</div>

<div class="inputBox">
    <span class="details">Cust_ID:</span>
    <input type="text" id="Cust_ID" name="Cust_ID" value="<?php echo $row['Cust_ID'] ?>" disabled required><br><br>
</div>

<div class="inputBox">
    <span class="details">Rest_ID :</span>
    <input type="text" id="Rest_ID" name="Rest_ID" value="<?php echo $row['Rest_ID'] ?>" disabled required><br><br>
</div>
<div class="inputBox">
    <span class="details">Order_MenuName :</span>
    <input type="text" id="Order_MenuName" name="Order_MenuName" value="<?php echo $row['Order_MenuName'] ?>" disabled required><br><br>
</div>
<div class="inputBox">
    <span class="details">Order_Quantity :</span>
    <input type="text" id="Order_Quantity" name="Order_Quantity" value="<?php echo $row['Order_Quantity'] ?>" disabled required><br><br>
</div>
<div class="inputBox">
    <span class="details">Order_DeliveryFee :</span>
    <input type="text" id="Order_DeliveryFee" name="Order_DeliveryFee" value="<?php echo $row['Order_DeliveryFee'] ?>" disabled required><br><br>
</div>
<div class="inputBox">
    <span class="details">Order_DeliveryTime :</span>
    <input type="text" id="Order_DeliveryTime" name="Order_DeliveryTime" value="<?php echo $row['Order_DeliveryTime'] ?>" disabled required><br><br>
</div>
<div class="inputBox">
    <span class="details">Order_Total :</span>
    <input type="text" id="Order_Total" name="Order_Total" value="<?php echo $row['Order_Total'] ?>" disabled required><br><br>
</div>

</div>


</body>
</html>