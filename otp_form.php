
<?php ob_start();  include('../admin/functions.php'); ?>
<?php require('textlocal.class.php');

if(isset($_POST["register2"])){  
$apiKey='zQdV7kAPF4U-GbaLEgHvak2P0o2zA43iTrnssaeavq';
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
      <title>Login Form</title>
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
         height: 450px;
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
                  <h2>Register Via Otp</h2>
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#">Otp Rgistrtation</a></li>
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
                  <form action="" class="col-md-9 font-weight-bold" name="login" method="post">
                     <div class="AppForm shadow-lg">
                        <div class="row">
                           <div class="col-md-6 d-flex justify-content-center align-items-center">
                              <div class="AppFormLeft">
                                 <?php echo format_flash_msg(); ?>
                                 <h1>Send Me An Otp</h1>
                                 <div class="form-group position-relative mb-4">
                                    <input type="text" id="name" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none" oninput="allow_alphabets(this)"  name="name" class="form-control" autocomplete="off" required="required" placeholder="name">
                                    <i class="fa fas-user-o"></i>
                                 </div>
                                 <div class="form-group position-relative mb-4">
                                    <input type="number" id="phone_no" name="phone_no" required pattern="/^-?\d+\.?\d*$/"
                                       class="form-control" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none" placeholder="phonenumber"required>
                                    <i class="fa fa-phone"></i>
                                 </div>
                                 <div class="form-group position-relative mb-4">
                                    <label>Enter Mobile Number We Send You  OTP</label>
                                    <input type="number" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none" name="mobile" maxlength="12" class="form-control" required>
                                    <i class="fa fa-phone"></i>
                                 </div>
                                 <div class="row  mt-4 mb-4">
                                    <div class="col-md-6">
                                       <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                          <label class="form-check-label" for="defaultCheck1">
                                          Remember me
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                       <a href="#">Forgot Password?</a>
                                    </div>
                                 </div>
                                 <button  type="submit" style="font-size:25px;"
                class="btn btn-success font-weight-bold" name="register2" class="btn btn-success btn-block shadow border-0 py-2 text-uppercase ">send OTP </button>
                                
                                 Login
                                 </button>
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
                                 <h2 class="position-relative px-4 pb-3 mb-4">Welcome To Smart Farmer</h2>
                                 <p>Agriculture is very much essential for the maintenance of our life. But regrettably it is largely unorganized, the assured quality seeds which is critical for attaining high 
                                    crop yields are out of reach due to high prices. Govt. programs proposed for the benefit of farming do not reach small farmer
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>





                  <form action="" method="post">
                <div class="form-group">
                <label>verify OTP</label>
                <input value="" type="text" name="otp"
                    id="" maxlength="5" class="form-control" required>
                  <button  type="submit" style="font-size:25px;"
                class="btn btn-success font-weight-bold" name="verify">send OTP </button>
                
            </div>


          


</form>












               </div>
            </div>
         </div>
      </div>
      </div>
      <!-- Start Footer  -->
      <?php include 'foot.php';?>
   </body>
</html>
