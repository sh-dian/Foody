<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Cust_login"])){
        header("Location: FrontUI.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Home</title>

    <link rel="stylesheet" href="Theme/userHome.css">

    <script src="JavaScript/function.js"></script>
    <script src="https://kit.fontawesome.com/bcdb11579f.js" crossorigin="anonymous"></script>

    <style>
        body{
            margin-left: 15%;
            padding: 5%;
        }
    </style>
    
</head>
<body> 

    <!-- Navigation Bar -->
    <?php include "./NavigationBar.php" ?>
    
    <section class="featured-restaurants">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="title-block pull-left">
                            <h1>Featured Restaurants</h1> </div>
                    </div>
                    
                </div>
    
                <div class="row">
                    <div class="restaurant-listing">
                        
						
						<?php  
						$query = "SELECT * FROM restaurant";
                        $ress = mysqli_query($con, $query);
                        
									      while($rows=mysqli_fetch_array($ress))
										  {
													
													$query= mysqli_query($con ,"select * from restaurant where Rest_ID='".$rows['Rest_ID']."' ");
													 $rowss=mysqli_fetch_array($query);
						
													 echo $rowss['Rest_Name'];
                                                     echo '<br>';
                                                     echo $rowss['Rest_Address'];
                                                     echo '<br>';
                                                     echo $rowss['Rest_PhoneNum'];
                                                     echo '<br>';
                                                     echo $rowss['Rest_OpeningHour'];
                                                     echo '<br>';
                                                     echo $rowss['Rest_ClosedHour'];

                                                     echo '<br><br>';
										  }
						
						
						?>
						
							
						
					
                    </div>
                </div>
     
               
            </div>
                                        </section>
</body>
</html>