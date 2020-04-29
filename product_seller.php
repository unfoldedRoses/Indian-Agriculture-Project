


<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Smart Farmer Product seller</title>
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
       
      <div class="container font-weight-bold design">

<?php echo format_flash_msg(); handle_authorized('user', 'index.php');?>

<h1 class="py-5 text-center">Make your product out for sell...</h1> 
  <?php
  
  $c_id = (isset($_GET['c_id']) && !empty($_GET['c_id']))? $_GET['c_id'] : NULL;
  $route = ($c_id!=NULL)? "edit_product" : "create_product";
  $arr = [];
  if($c_id!=NULL){
      include '../dbconn.php';
      $query = "SELECT * FROM crop WHERE c_id='$c_id'";
      $arr = select_one($conn, $query);

  }
  ?>
<form action="../routes.php?route=<?php echo $route; ?>" class="w-50 mx-auto action" enctype="multipart/form-data" method="post">
<?php
  if($c_id!=NULL){
      ?>
      <input type="hidden" class="form-control" name="c_id" value="<?php echo $c_id; ?>">
      <?php
  }
?>

      <div class="form-group"> 
      <label>Name of the crop for which product is suitable</label>
      <input type="text" class="form-control" name="crop" value="<?php echo (!empty($arr["crop"]))? $arr["crop"] : ''; ?>" required >
      
      </div>

      <div class="form-group">
        <label>Product Type</label>
        <select name="product_type" required>
          <option value="" >Choose One</option>
          <option value="FERTILIZER" >Fertilizer</option>
          <option value="CROP" >Crop</option>
        </select>
      </div>

      <div class="form-group py-3">
      <!-- <table>
      <tr>
      <td> -->
      <label>Product Image:   </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
      <!-- <td> -->
      <input type="file" name="image_path"/> 
      <!-- </tr>
      </table> -->
      </div>
      <div class="form-group">
      <label>Product Name</label>
      <input type="text" class="form-control" name="product_name" value="<?php echo (!empty($arr["product_name"]))? $arr["product_name"] : ''; ?>" required >
      </div>
      <div class="form-group">
      <label>Product details</label>
      <textarea name="details" class="form-control"><?php echo (!empty($arr["details"]))? $arr["details"] : ''; ?></textarea>
      </div>
      <div class="form-group">
      <label>Price</label>
      <input type="text" class="form-control" name="price" value="<?php echo (!empty($arr["price"]))? $arr["price"] : ''; ?>" required>
    </div>
    <button type="submit"  style="font-size:25px;"class="btn btn-primary font-weight-bold colo" name="form"><?php echo ($c_id==NULL)? "Submit" : "update"; ?></button>
</form>


</div>


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
  gram Feed  -->


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






   <?php include 'foot.php'?>