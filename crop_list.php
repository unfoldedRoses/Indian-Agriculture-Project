<?php   
session_start();
if(!isset($_SESSION['aadhar_no'])){
	header('location:login ../form.php');
}

include('../admin/functions.php');
handle_authorized('user', 'index.php');

 include "../dbconn.php"; 
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cart22.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart22.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>ThewayShop - crop_list</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

  
<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +11 900 800 100</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#"><i class="fa fa-user s_color"></i> My Account</a></li>
                            <li><a href="#"><i class="fas fa-location-arrow"></i> Our location</a></li>
                            <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="login-box">
						<select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
							<option>Register Here</option>
							<option>Sign In</option>
						</select>
					</div>
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <?php include 'headsup.php'?>
    <!-- End Main Top -->
       
      <h1 class="py-5 text-success" style="margin-left: 100px;">Crops</h1>

           <div class="container">    
                <?php  
                include '../dbconn.php';
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $u_id = $_SESSION['u_id'];
                // dd($u_id);
                $q="SELECT * FROM crop WHERE is_deleted=0 AND product_type = 'CROP' AND u_id='$u_id'";
                // $result = mysqli_query($conn, $q);
                $result = select($conn, $q);
                // dd($result);
                // $crop = " ". $_GET['crop'] . "";
                if(!empty($result))  
                {  
                foreach($result as $k => $row){
                    $image = 'images/'.$row['image'];
                    if(is_file('images/products/'.$row['image_path'])){
                        $image = 'images/products/'.$row['image_path'];
                    }
                ?>


<form method="post" action="cart22.php?action=add&id=<?php echo $row["c_id"]; ?>">  

<div class="container pb-4 px-5">
        <div class="card h-100">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-2">

                        <img src="<?php echo $image; ?>" class="card-img-top" style="width: 200px; height:200px;"
                            alt="product image">
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-7">
                        <h5 class="card-title font-weight-bold"><?= $row['product_name'] ?></h5>
                        <p class="card-text"><?= $row['details'] ?></p>
                        <h5>Price: <?= $row['price'] ?>/-</h5>
                        <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" /> 

                        </div>
                        <div class="col-md-2">
                        <!-- <a href="cart2.php?c_id=<?=$row['c_id']; ?>"> -->
                        <button type="submit" class="font-weight-bold btn btn-info bg-info text-white" name="add_to_cart" value="Add to Cart">Add to cart</button>
                        <!-- </a> -->
                        <!-- <input type="submit" name="add_to_cart"  class="btn btn-info" value="Add to Cart" />   -->
                        <h5 class="pt-5">Quantity</h5>
                        <input type="number" name="quantity" class="form-control" value="1" />  

                        </div>
                  
                </div>
            </div>
        </div>
    </div>
        </form>

                <?php }}?>
           </div>
           
      <?php include 'foot.php';?>
