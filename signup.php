<?php ob_start();  include('../admin/functions.php'); ?>
<?php require('textlocal.class.php');

if(isset($_POST["register2"])){  
$apiKey='4obBxQWDBMg-RZLR5xuxFPO2irpHdEgL8PItO6YLgY';
$textlocal=new Textlocal(false,false,$apiKey);
$name=$_POST["name"];
$mob=$_POST["mobile"];
$numbers=array($mob);
$sender='TXTLCL';
$otp=mt_rand(10000,99999);
$message='Hello this is youre OTP verification Code'.$otp;
echo $name;
try{
$result=$textlocal->sendSms($numbers,$message,$sender);
setcookie('otp',$otp);
echo "otp sent successfully";
print_r($result);
}
catch(Exception $e){
die('Error'.$e->getMessage());
}


}

if(isset($_POST["verify"])){
    $otp=$_POST["otp"];
    if($_COOKIE['otp']==$otp){
        echo "congratulations Otp Verfied Succeffully!";
        header("Location:selectState.php");
    }
    else{
        echo "please enter correct OTP!";
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
    <title>Register</title>
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


@import url('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap');

.AppForm .AppFormLeft h1{
    font-size: 35px;
}
.AppForm .AppFormLeft input:focus{
    border-color: #ced4da;
}
.AppForm .AppFormLeft input::placeholder{
   font-size: 15px;
}
.AppForm .AppFormLeft i{
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
}
.AppForm .AppFormLeft a{
    color: #3a3e42 ;
}
.AppForm .AppFormLeft button{
    background: linear-gradient(45deg,#8D334C,#CF6964);
    border-radius: 30px;
}
.AppForm .AppFormLeft p span{
  color: #007bff;
}
.AppForm .AppFormRight{
    background-image: url('https://i.ibb.co/tDLqQtj/bg.jpg');
    height: 600px;
    background-size: cover;
    background-position: center;
}
.AppForm .AppFormRight:after{
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg,#8D334C,#CF6964);
    opacity: 0.5;
}
.AppForm .AppFormRight h2{
    z-index: 1;
}
.AppForm .AppFormRight h2::after{
  content: "";
  position: absolute;
  width: 100%;
  height: 2px;
  background-color: #fff;
  bottom: 0;
  left:50%;
  transform: translateX(-50%);
}
.AppForm .AppFormRight p{
    z-index: 1;
}


</style>

</head>


<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
             
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
								<li><a href="shop.html">Sidebar Shop</a></li>
								<li><a href="shop-detail.html">Shop Detail</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.html">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge">3</span>
							<p>My Cart</p>
					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
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
                    <h2>Otp Verification Registration</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Login </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
       
      <div class="container font-weight-bold design">
      <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
        
        <form action="" class="font-weight-bold" method="post"  class="col-md-9 font-weight-bold">
                <div class="AppForm shadow-lg">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <div class="AppFormLeft">

                            <?php echo format_flash_msg(); ?>

                                <h1>Otp Verification Registration</h1>
                                <div class="form-group position-relative mb-4">
                                <input type="text" id="name" placeholder="Enter Name" oninput="allow_alphabets(this)"  name="name" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none" autocomplete="off" required="required" >
                <p id="p1"></p>
                                        <i class="fa fa-user-o"></i>
                                </div>
                                <div class="form-group position-relative mb-4">
                                <input type="number" placeholder="Phone NO" id="phone_no" name="phone_no" required pattern="/^-?\d+\.?\d*$/"
                    class="form-control" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none" required>
                                        <i class="fa fa-user-o"></i>
                                </div>
                                <div class="form-group position-relative mb-4">
                                <input value="" type="number" name="otp"
                    id="" maxlength="5" class="form-control" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none" required>
                                        <i class="fa fa-user-o"></i>
                                </div>
                           

                          

                                <button  type="submit" style="font-size:25px;" class="btn btn-success btn-block shadow border-0 py-2 text-uppercase "
  name="verify">Send Me OTP </button>

                                <p class="text-center mt-5">
                                    Don't have an account?
                                    <span>
                                        Create your account
                                    </span>

                                </p>

                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="AppFormRight position-relative d-flex justify-content-center flex-column align-items-center text-center p-5 text-white">
                                <h2 class="position-relative px-5 pb-3 mb-4">Welcome To Smart Farmer</h2>
                                <p>Agriculture is very much essential for the maintenance of our life. But regrettably it is largely unorganized, the assured quality seeds which is critical for attaining high 
                                    crop yields are out of reach due to high prices. Govt. programs proposed for the benefit of farming do not reach small farmer</p>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
      </div>
      </div>
      </div>



    <!-- Start Footer  -->
  <?php include 'footer1.php';?>

</body>
</html>