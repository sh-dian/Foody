<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["RO_login"])){
        header("Location: login.php");
    }
    else{

      if(isset($_POST["Add_Data"])){
          $name = mysqli_real_escape_string($con, $_POST["name"]);
          $price = mysqli_real_escape_string($con, $_POST["price"]);
          $description = mysqli_real_escape_string($con, $_POST["description"]);
    

          $query= "INSERT INTO restaurantmenu(RM_MenuName,RM_Price,RM_Description) VALUES('$name','$price','$description')";
          $result = mysqli_query($con,$query);

          if($result){
              echo "
              <script>
                  alert('Menu Added Success!');
                  window.location = 'RO_HomePage.php';
              </script>";

          }else{
              echo "<script>alert('Menu Added FAILED');</script>";
              echo $con->error;
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
    <title>Add New Menu</title>

    <link rel="stylesheet" href="CSS/AddMenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./RO_Navigationbar.php" ?>
    
    <div class="flexbox">
        <div class="title"><h1>Add New Menu</h1></div>

        <form action="" method="post">
            <div class="newMenu">

                <div class="inputBox">
                    <span class="details">Food Name</span>
                    <input class="input1" type="text" name="name" placeholder="Enter food name" required>
                </div>

                <div class="inputBox">
                    <span class="details">Price</span>
                    <input class="input1" type="text" name="price" placeholder="Enter Price" required>
                </div>

                <div class="inputBox">
                    <span class="details">Description</span>
                    <input class="input1" type="text" name="description" placeholder="Description" required>
                </div>


            </div>

            <button type="submit" class="btn" name="Add_Data">Add Menu</button>

        </form>
    </div>

</body>
</html>