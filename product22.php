<?php   
session_start();
if(!isset($_SESSION['aadhar_no'])){
	header('location:login form.php');
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


    <!-- Start Categories  -->
   

<div class="container">    
<h1 class="py-5 text-success" style="margin-left: 100px;">Available Products</h1>

<div class="container">    
     <?php  
     include '../dbconn.php';
     $q="SELECT * FROM crop WHERE crop = '".$_GET['crop']."' AND is_deleted=0  ";
     // $result = mysqli_query($conn, $q);
     $result = select($conn, $q);
     // dd($result);
     // $crop = " ". $_GET['crop'] . "";
     if(!empty($result))  
     {  
     foreach($result as $k => $row){
         $image = 'images/'.$row['image'];
         if(is_file('../images/products/'.$row['image_path'])){
             $image = '../images/products/'.$row['image_path'];
         }


     ?>


<form method="post" action="cart22.php?action=add&id=<?php echo $row["c_id"]; ?>">  

<div class="container pb-4 px-5">
<div class="card h-100">
 <div class="card-body" style="background-color: #b0b435;">
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
             <button type="submit" class="font-weight-bold btn-warning" name="add_to_cart" value="Add to Cart">Add to cart</button>
             <!-- </a> -->
             <!-- <input type="submit" name="add_to_cart"  class="btn btn-info" value="Add to Cart" />   -->
             <h5 class="pt-5">Quantity</h5>
               
             <input type="number"  name="quantity" size="4" value="1" min="0" step="1" class="c-input-text qty text"></td>
             </div>
       
     </div>
 </div>
</div>
</div>
</form>
     <!-- <div class="col-md-4">  
          <form method="post" action="cart22.php?action=add&id=<?php echo $row["c_id"]; ?>">  
               <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                    <img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />  
                    <h4 class="text-info"><?php echo $row["product_name"]; ?></h4>  
                    <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                    <input type="text" name="quantity" class="form-control" value="1" />  
                    <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>" />  
                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
               </div>  
          </form>  
     </div>   -->
     <?php  
          }  
     }  
     ?>  

     <!-- <div style="clear:both"></div>  
     <br />  
     <h3>Order Details</h3>  
     <div class="table-responsive">  
          <table class="table table-bordered">  
               <tr>  
                    <th width="40%">Item Name</th>  
                    <th width="10%">Quantity</th>  
                    <th width="20%">Price</th>  
                    <th width="15%">Total</th>  
                    <th width="5%">Action</th>  
               </tr>  
               <?php   
               if(!empty($_SESSION["shopping_cart"]))  
               {  
                    $total = 0;  
                    foreach($_SESSION["shopping_cart"] as $keys => $values)  
                    {  
               ?>  
               <tr>  
                    <td><?php echo $values["item_name"]; ?></td>  
                    <td><?php echo $values["item_quantity"]; ?></td>  
                    <td> <?php echo $values["item_price"]; ?></td>  
                    <td> <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                    <td><a href="products22.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
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
               <?php  
               }  
               ?>  
          </table>  
     </div>  
</div>  
<br />   -->
</div>
</div>

</div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    
    <?php include 'footer.php';?>
