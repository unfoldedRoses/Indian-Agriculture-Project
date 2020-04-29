<?php
ob_start();
include '../admin/functions.php';
handle_authorized('user', 'index.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Crop</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <link rel="stylesheet" href="./assets/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="./assets/css/all.css">
    <link rel="stylesheet" href="./assets/css/colors.css">
</head>

<?php

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
 if(isset($_POST['update'])) {
	$val = $_POST['quantity'];

	// Check validate quantity
	$valid = 1;
	for($i=0; $i<count($val); $i++)
	if(!is_numeric($val[$i]) || $val[$i] < 1){
		$valid = 0;
		break;
	}
	if($valid==1){
		$values = unserialize ( serialize ( $_SESSION ['shopping_cart'] ) );
		for($i = 0; $i < count ( $values ); $i ++) {
			$values[$i]->quantity = $val[$i];
		}
		$_SESSION ['shopping_cart'] = $values;
	}
	else
		$error = 'Quantity is InValid';
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
    <title>smart Farmer - Ecommerce Bootstrap 4 HTML Template</title>
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

    <style>
        .offer-box-products{

/* This is where magic happens */
max-width: 100%;
max-height: 100%;
width: auto;

display: block;
margin: 0 auto;
}
</style>
</head>

<body>
    <!-- Start Main Top -->
  
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <?php include 'headsup.php'?>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="images/banner-01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> smart Farmer</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/banner-02.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> smart Farmer</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/banner-03.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> smart Farmer</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->
<br>


   



    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                <?php include "../dbconn.php";   
                        //   session_start(); 
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  ?>
                         



                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                        <th width="40%">Item Name</th>  
                                        <th width="10%">Quantity</th>  
                                        <th width="20%">Price</th>  
                                        <th width="15%">Total</th>  
                                        <th width="5%">Action</th>  
                                </tr>
                                <?php
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td> <?php echo $values["item_price"]; ?></td>  
                               <td> <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?>
                               </td>  
                               <td><a href="cart22.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right"> <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                           
                     </table>  
                </div> 
                <!-- <button class="btn btn-info bg-info text-white" name="update">Update Cart</button> -->

                <a href="paymentForm.php">
           <button type="submit" class="font-weight-bold btn-info">Place order</button></a> 
           <a href="../selectState.php"><button class="font-weight-bold btn-warning">Continue Shopping</button></a>
           </div>  
                              </div>
         
           <?php  
                          } else if(empty($item_array))
                          {
                               echo "<h1>Your cart is empty........</h1>";?>

                               <a href="selectState.php"><button class="btn btn-info bg-info text-white">Continue Shopping</button></a>
                      <?php
                          } 
                          ?> 
                    </div>
                </div>
            </div>

           

        

        </div>
    </div>














           <br />  
          
                              </div>
         
         


           <br />
           </div>
           <br> <br>
           <?php include 'footer.php';?>
           </body>  
 </html>