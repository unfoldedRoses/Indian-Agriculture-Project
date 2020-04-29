


<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>ThewayShop - States Soil Information Section</title>
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


    <style>

.highlight-word {
  position: relative;
  z-index: 0;
/* prevent the highlight from breaking since it is horizontal   */
  white-space: nowrap;
}
.highlight-word:before {
    content: '';
    background: url(https://cdn2.hubspot.net/hubfs/1951809/text-highlight.png?t=1542708765973) no-repeat center center;
    background-size: 100% auto;
    width: 108%;
    height: 100%;
    display: block;
    position: absolute;
    z-index: -1;
    transform: translate(-3%,0);
}
        </style>

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
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
							<option>¥ JPY</option>
							<option>$ USD</option>
							<option>€ EUR</option>
						</select>
                    </div>
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
                    <h2>Soil Information</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Contact Us </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->


 
    <!-- Start Instagram Feed  -->
 
    <!-- End Instagram Feed  -->



<!-- Design inspired from https://www.hotjar.com/ -->
<div class="jumbotron">
  <div class="container text-center text-lg-left">
    
    <div class="row">
      <div class="col-lg-8">
          <h3 class="display-4">Lack Of:
 <span class="highlight-word">Nitrogen and Phosphorous</span></h3>
  <p class="lead"><b style="color: black;">Mainly found in the plains of Gujarat,  Punjab, Haryana, UP, Bihar, Jharkhand etc..</b></p>
        <span class="text-center d-inline-block">
        
        <p class="text-muted" style="color: black;">Soil Type:Alluvial</p>
        </span>
        
      </div>
      <div class="col-lg-4 align-items-center d-flex">
        <img src="soils/alumni.jpg" alt="" class="img-fluid">
      </div>
    </div>

 
    </div>
</div>
<!-- Design inspired from https://www.hotjar.com/ -->
<div class="jumbotron">
  <div class="container text-center text-lg-left">
    
    <div class="row">
      <div class="col-lg-8">
          <h3 class="display-4">Lack Of:
 <span class="highlight-word">Phosphorous, Nitrogen and organic matter</span></h3>
  <p class="lead"><b style="color: black;">Deccan plateau- Maharashtra, Madhya Pradesh, Gujarat, Andhra Pradesh,Tamil Nadu, Valleys of Krishna and Godavari.</b></p>
        <span class="text-center d-inline-block">
        
        <p class="text-muted" style="color: black;">Soil Type: Black (Regur soil)</p>
        </span>
        
      </div>
      <div class="col-lg-4 align-items-center d-flex">
        <img src="soils/black.jpg" alt="" class="img-fluid">
      </div>
    </div>

 
    </div>
</div>


<div class="jumbotron">
  <div class="container text-center text-lg-left">
    
    <div class="row">
      <div class="col-lg-8">
          <h3 class="display-4">Lack Of:
 <span class="highlight-word">Nitrogen, Phosphorous and humus.</span></h3>
  <p class="lead"><b style="color: black;">Eastern and southern part of the deccan plateau, Orissa, Chattisgarh and southern parts of the middle Ganga plain.</b></p>
        <span class="text-center d-inline-block">
        
        <p class="text-muted" style="color: black;">Soil Type:Red</p>
        </span>
        
      </div>
      <div class="col-lg-4 align-items-center d-flex">
        <img src="soils/red.jpg" alt="" class="img-fluid">
      </div>
    </div>

 
    </div>
</div>

<div class="jumbotron">
  <div class="container text-center text-lg-left">
    
    <div class="row">
      <div class="col-lg-8">
          <h3 class="display-4">Lack Of:
 <span class="highlight-word">Organic matter, Nitrogen, Phosphate and Calcium</span></h3>
  <p class="lead"><b style="color: black;">Karnataka, Kerala, Tamilnadu, Madhya Pradesh, Assam and Orissa hills.</b></p>
        <span class="text-center d-inline-block">
        
        <p class="text-muted" style="color: black;">Soil Type:Laterite</p>
        </span>
        
      </div>
      <div class="col-lg-4 align-items-center d-flex">
        <img src="soils/Laterite soils.jpg" alt="" class="img-fluid">
      </div>
    </div>

 
    </div>
</div>

<div class="jumbotron">
  <div class="container text-center text-lg-left">
    
    <div class="row">
      <div class="col-lg-8">
          <h3 class="display-4">Lack Of: 
 <span class="highlight-word">Humus, Nitrogen  chemicals           ..</span></h3>
  <p class="lead"><b style="color: black;">Western Rajastan, north Gujarat and southern Punjab</b></p>
        <span class="text-center d-inline-block">
        
        <p class="text-muted" style="color: black;">Soil Type:Arid and Desert</p>
        </span>
        
      </div>
      <div class="col-lg-4 align-items-center d-flex">
        <img src="soils/Arid and desert soils.jpg" alt="" class="img-fluid">
      </div>
    </div>

 
    </div>
</div>

<div class="jumbotron">
  <div class="container text-center text-lg-left">
    
    <div class="row">
      <div class="col-lg-8">
          <h3 class="display-4">Lack Of:
 <span class="highlight-word">Nitrogen and Calcium insuffiency</span></h3>
  <p class="lead"><b style="color: black;">Western Gujarat, deltas of eastern coast, Sunderban areas of West Bengal, Punjab and Haryana</b></p>
        <span class="text-center d-inline-block">
        
        <p class="text-muted" style="color: black;">Soil Type:Saline and Alkaline</p>
        </span>
        
      </div>
      <div class="col-lg-4 align-items-center d-flex">
        <img src="soils/Saline and alkaline soils.jpg" alt="" class="img-fluid">
      </div>
    </div>

 
    </div>
</div>

<div class="jumbotron">
  <div class="container text-center text-lg-left">
    
    <div class="row">
      <div class="col-lg-8">
          <h3 class="display-4">Lack Of:
 <span class="highlight-word">Organic matter, Nitrogen, Phosphate and Calcium</span></h3>
  <p class="lead"><b style="color: black;">Found in coastal regions of Orissa, West Bengal and Tamil Nadu; central portion of north Bihar and in Almora district of Uttaranchal.</b></p>
        <span class="text-center d-inline-block">
        
        <p class="text-muted" style="color: black;">Soil Type:Peaty and marshy soils</p>
        </span>
        
      </div>
      <div class="col-lg-4 align-items-center d-flex">
        <img src="soils/Peaty and marshy soils.jpg" alt="" class="img-fluid">
      </div>
    </div>

 
    </div>
</div>

<div class="jumbotron">
  <div class="container text-center text-lg-left">
    
    <div class="row">
      <div class="col-lg-8">
          <h3 class="display-4">Lack Of:
 <span class="highlight-word">potash, phosphorous calcium</span></h3>
  <p class="lead"><b style="color: black;">cold districts like Ladakh, Lahaul and Spiti District, Kinnaur District etc.</b></p>
        <span class="text-center d-inline-block">
        
        <p class="text-muted" style="color: black;">Soil Type:Forest and mountain soils</p>
        </span>
        
      </div>
      <div class="col-lg-4 align-items-center d-flex">
        <img src="soils/Forest and mountain soils.jpg" alt="" class="img-fluid">
      </div>
    </div>

 
    </div>
</div>




   <?php include 'foot.php'?>