<?php ob_start();  include('../admin/functions.php'); ?>
<script src="plugins/toastr/toastr.min.js"></script>
    <script>
    function allow_alphabets(element){
        let textInput = element.value;
        textInput = textInput.replace(/[^A-Za-z ]*$/gm, ""); 
        textInput = textInput.replace(/[0-9]/g, '');
        element.value = textInput;
    }

    function getRandomInt(min = 0, max = 1000) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    let verification_code = document.getElementById('verification_code');
    let phone_no = document.getElementById('phone_no');
    let register = document.getElementsByName('register')[0];

    function sendVerificationCode(element) {
        verification_code.value = getRandomInt();
        let code = verification_code.value;

        $.ajax({
            type: 'GET',
            url: "routes.php?route=send_verification_code_for_adhaar_verification",
            data: {
                'code': code,
                "phone_no": phone_no.value
            },
            async: false,
            beforeSend: function() {
                toastr.info("sending verification code...");
            },
            success: function(data) {
                data = JSON.parse(data);
                // console.log(data);
                if (data["success"]) {
                    // toastr.success(data["msg"]);
                    alert(data["msg"]);
                    register.setAttribute("id", "");
                } else {
                    alert(data["msg"]);
                    // toastr.error(data["msg"]);
                }
            }
        });
    }


    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    </script>



    <?php
        if (isset($_POST['register'])) {
            include("../dbconn.php");







            $name = $_POST['name'];
            $phone_no = $_POST['phone_no'];
            $aadhar_no = $_POST['aadhar_no'];


            // $details = $_POST['details'];
            // $price = $_POST['price'];
            echo  '<script Type="javascript">alert("Your name:".$name."\nYour number:".$phone_no."\nYour aadhar number:".$aadhar_no.)</script>';
            // echo "<br>".$crop."/".$image."/".$product_name."/".$details."/".$price;

            $q = "INSERT INTO `user_login` (`u_id`, `phone_no`, `aadhar_no`, `name`) VALUES (NULL, '".$phone_no."', '".$aadhar_no."', '".$name."');";

            if ($conn->query($q) === TRUE) {
                echo '<script language="javascript">';
                echo 'alert("Data Saved Successfully")';
                echo '</script>';
                
            }else{
                echo "Something went wrong!";
            }
            // echo "<br>".$q;
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
    height: 900px;
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
                    <h2>Rgister</h2>
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
        <form action="" class="col-md-9 font-weight-bold" name="login" method="post">
                <div class="AppForm shadow-lg">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <div class="AppFormLeft">

                            <?php echo format_flash_msg(); ?>

                                <h1>Register</h1>
                                <div class="form-group position-relative mb-4">
                                   
                                <label> username</label> 
                                   <i class="fa fa-user"></i>
                                   <input type="text" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none" id="name"  oninput="allow_alphabets(this)" name="name"" required 
                                class="form-control" required="required"  placeholder="name">
                                  
                             </div>

                                <div class="form-group position-relative mb-4">
                                   
                          
                              <i class="fas fa-phone"></i>

                              <label> phone Number</label> 
                                        <input type="number" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none" id="phone_no" name="phone_no" required pattern="/^-?\d+\.?\d*$/"
                                     class="form-control" required="required"  placeholder="number">
                                       
                                  </div>
                                     <div class="form-group position-relative mb-4">
                                
                                     
                                     <label> Passowrd</label> 
                                         <input type="password" placeholder="password" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none" id="password" class="form-control" name="password" value="" required="required">                
                                         <i class="fa fa-key"></i>

                                </div>
                                <label>confirm Passowrd</label> 
                                <div class="form-group position-relative mb-4">
                                <input type="text" id="cfn_password" placeholder="confirm-password" name="cfn_password"   value="" required="required" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none">
                            
                                <i class="fa fa-key"></i>

                               </div>
                        
                           <div class="form-group position-relative mb-4">
                           <label>Adhaar Card No</label>    
                           <input type="number" name="aadhar_no" maxlength="12"  class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none"  placeholder="adhar-card no">
                            
                                <i class="fa fa-address-card"></i>

                        </div>
                        
                        <div class="form-group position-relative mb-4">
                        <div class="form-group">
                <label>Adhaar Mobile Verification Code</label>
                <input value=""  class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none" type="number" name="adhaar_mobile_verification_code"
                    id="adhaar_mobile_verification_code" maxlength="12" class="form-control" required>
                <input value="" type="hidden" name="verification_code" id="verification_code">
            </div>
                            
            <i class="fa fa-address-card"></i>

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

                                <button class="btn btn-success btn-block shadow border-0 py-2 text-uppercase "  name="register">
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





















        </div>
    </div>
      </div>
      </div>
      </div>











    </div>
</body>
</html>