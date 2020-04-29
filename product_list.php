


<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>ThewayShop - Ecommerce Bootstrap 4 HTML Template</title>
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

<?php
include '../admin/functions.php';
handle_authorized('user', 'index.php');

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
 
?>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
           
        </div>
    </div>
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

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact Us</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Contact Us </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
       
    <h1 class="py-5 text-success" style="margin-left: 100px;">Products List</h1>

<div class="container">    
     <?php  
     include '../dbconn.php';
     if (session_status() == PHP_SESSION_NONE) {
         session_start();
     }
     $u_id = $_SESSION['u_id'];
     $q="SELECT * FROM crop WHERE is_deleted=0 AND u_id='$u_id'";
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
             <h5>Product Type : <?= ucfirst(strtolower($row['product_type'])); ?></h5>
             <div class="col-md-2">
             <!-- <a href="cart2.php?c_id=<?=$row['c_id']; ?>"> -->
             <a href="productForm.php?c_id=<?php echo $row['c_id']  ?>" class="font-weight-bold btn btn-info bg-info text-white">Edit</a>             
                        </div>
       </div>
     </div>
 </div>
</div>
</div>
</form>
</div>
    </div>

    <?php  
                     }  
                }  
                ?>  

    <script>
            function allow_alphabets(element) {
                let textInput = element.value;
                textInput = textInput.replace(/[^A-Za-z ]*$/gm, "");
                textInput = textInput.replace(/[0-9]/g, '');
                element.value = textInput;
            }
            </script>
    <!-- End Cart -->

    <!-- Start Instagram Feed  -->
   
    <!-- End Instagram Feed  -->


<script>

    function mobileNumber(){

var Number = document.getElementById('phoneme').value;
var IndNum = /^[0]?[789]\d{9}$/;

if(IndNum.test(Number)){
   return;
}

else{
   $('#errMessage').text('please enter valid mobile number');
   document.getElementById('profile_telephoneNumber').focus();
}

}
</script>






    <!-- Start Footer  -->
   <?php include 'footer.php'?>