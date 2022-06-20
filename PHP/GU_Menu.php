<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Cust_login"])){
        header("Location: login.php");
    }else{

        if(isset($_POST["add_to_cart"]))
        {
            if(isset($_SESSION["shopping_cart"]))
            {
                $item_array_id = array_column($_SESSION["shopping_cart"], "item_RM_ID");
                if(!in_array($_GET["add"], $item_array_id))
                {
                    $count = count($_SESSION["shopping_cart"]);
                    $item_array = array(
                        'item_Rest_ID'              =>         $_GET["id"],
                        'item_RM_ID'              =>           $_GET["add"],
                        'item_RM_MenuName'          =>           $_POST["hidden_name"],
                        'item_RM_Price'             =>           $_POST["hidden_price"],
                        'item_quantity'             =>           $_POST["quantity"],
                    );
                    $_SESSION["shopping_cart"][$count] = $item_array;
                }
            
            }
            else
            {
                $item_array = array(
                    'item_Rest_ID'              =>         $_GET["id"],
                    'item_RM_ID'              =>           $_GET["add"],
                    'item_RM_MenuName'          =>           $_POST["hidden_name"],
                    'item_RM_Price'             =>           $_POST["hidden_price"],
                    'item_quantity'             =>           $_POST["quantity"],
                );
                $_SESSION["shopping_cart"] [0] = $item_array;
            }
        }

        if(isset($_GET["action"]))
        {
                foreach($_SESSION["shopping_cart"] as $keys => $values)
                {
                    if($values["item_RM_ID"] == $_GET["action"])
                    {
                        unset($_SESSION["shopping_cart"][$keys]);
                    }
                }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>

    <link rel="stylesheet" href="CSS/menu.css"/>
    <style>
        body{
            margin-left: 5%;
            padding: 2%;
        }
    </style>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./GU_Navigationbar.php" ?>


    <div class="bar">
        

        <h1><i class="fa-solid fa-chart-line"></i>Restaurant Menu</h1>
    </div>

    
            <?php   
                $query = "SELECT * FROM restaurantmenu WHERE Rest_ID = '$_GET[id]' ";
                        $result = mysqli_query($con, $query);
                        if(mysqli_num_rows($result) > 0)
                        {
                        
                            while ($row = mysqli_fetch_array($result))
                            {
                            
                        ?>
                        <div class ="col-md-4">
                            <form method="post" action="GU_Menu.php?add=<?php echo $row["RM_ID"]; ?>&id=<?php echo $row["Rest_ID"]; ?>">
                                <div style="border : 1px solid #333; background-color : #f1f1f1; border-radius :5px; padding :16px; ">
                                    <h3 class="text-info"><?php echo $row["RM_MenuName"]; ?></h3>
                                    <h4 class="text-danger">$ <?php echo $row["RM_Description"]; ?></h4>
                                    <h4 class="text-danger">$ <?php echo $row["RM_Price"]; ?></h4>
                                    <input type="text" name="quantity" class="form-control" value="1" />
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["RM_MenuName"]; ?>" />
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["RM_Price"]; ?>" />
                                    <input type="submit" name="add to cart" style="margin-top :5px;" class="btn btn-success" value="Add to Cart" />
                                 </div>
                            </form>
                        </div>
                    <?php
                            }
                        }
                    ?>
                        <div style="clear:both"></div>
                        <br />
                        <h3>Order Details</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered" border=1>
                                <tr>
                                    <th width="40%">Item Name</th>
                                    <th width="10%">Quantity</th>
                                    <th width="20%">Price</th>
                                    <th width="15%">Total Price</th>
                                    <th width="5%">Action</th>
                            </tr>
                            <?php
                             $query = "SELECT * FROM restaurantmenu WHERE Rest_ID = '$_GET[id]' LIMIT 1";
                             $result = mysqli_query($con, $query);
                             if(mysqli_num_rows($result) > 0)
                             {
                             
                                 while ($row = mysqli_fetch_array($result))
                                 {

                                if(!empty($_SESSION["shopping_cart"]))
                                {
                                    $total = 0;
                                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                                    {
                                ?>
                            <tr>
                                <td style="text-align=center;"><?php echo $values["item_RM_MenuName"]; ?></td>
                                <td style="text-align=center;"><?php echo $values["item_quantity"]; ?></td>
                                <td style="text-align=center;">RM <?php echo $values["item_RM_Price"]; ?></td>
                                <td style="text-align=center;"><?php echo number_format($values["item_quantity"] * $values["item_RM_Price"], 2); ?></td>
                                <td style="text-align=center;"> <a href="GU_Menu.php?action=<?php echo $values["item_RM_ID"]; ?>&id=<?php echo $row["Rest_ID"]; ?>"><span class="text-danger">Delete</span></a></td>
                            </tr>
                            <?php
                                            $total = $total + ($values["item_quantity"] * $values["item_RM_Price"]);
                                        }
                                    }
                                }
                            }    
                            ?>
                        </table>
</body>
</html>