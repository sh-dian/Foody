<?php
    include_once 'C:\xampp\htdocs\Foody\Database\db.php';
    session_start();

    if(!isset($_SESSION["Cust_login"])){
        header("Location: login.php");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <link rel="stylesheet" href="CSS/homepage.css"/>
    <style>
        body{
            margin-left: 5%;
            padding: 5%;
        }
    </style>

</head>
<body>
    <!-- Navigation Bar -->
    <?php include "./GU_Navigationbar.php" ?>

    <div id="main-content">
            <div id="search-section">
                <form method="POST" action="#">
                    <input type="text" name="search-restaurant" id="search-bar" placeholder="Enter Restaurant Name Here"/>
                    <select id="categorize" class="btn" name="categorize">
                        <option value="none" class="btn" selected disable hidden>Categorized By<i class="fa-solid fa-circle-chevron-down"></i></option>
                        <option value="" class="btn"></option>
                        <option value="1" >Local Restaurant</option>
                        <option value="2" >Western Restaurant</option>
                        <option value="3" >Vegeterian Restaurant</option>
                    </select>
                    <button type="submit" class="btn" id="search-button" name="search">Search</button>
                </form>
            </div>

            <br/><br/>
            <h2>Top Restaurant</h2>
            <br/>

            <div id="popular-restaurant" class="restaurant-list">



            <div class="row">
                    <div class="restaurant-listing">
                        
						
						<?php  
						$ress= mysqli_query($con,"select * from restaurant");  
									      while($rows=mysqli_fetch_array($ress))
										  {
													
													$query= mysqli_query($con,"select * from restaurant where Rest_ID='".$rows['Rest_ID']."' ");
													 $rowss=mysqli_fetch_array($query);
						
													 echo ' <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant all '.$rowss['Rest_Name'].'">
														<div class="restaurant-wrap">
															<div class="row">
																<div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
																	<a class="restaurant-logo" href="dishes.php?res_id='.$rows['Rest_ID'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Restaurant logo"> </a>
																</div>
													
																<div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
																	<h5><a href="dishes.php?res_id='.$rows['Rest_ID'].'" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].'</span>
																</div>
													
															</div>
												
														</div>
												
													</div>';
										  }
						
						
						?>
						
							
						
					
                    </div>
                </div>

