


<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Smart Farmer - Payment Form </title>
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
    .ary{
        background-image: url("farmer.jpg");
        background-position: center;
background-repeat: no-repeat;
background-size: cover;
    }
</style>




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
                    <h2>Smart Farmer - Payment Form</h2>
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
        <div class="container ary">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>PAYMENT fORM</h2>
                        <p></p>
                      <form class="font-weight-bold" action="../routes.php?route=save_order" method="post">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" oninput="allow_alphabets(this)" name="fullname" placeholder="Full Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="email" placeholder="Your Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="subject" oninput="mobileNumber()" name="phoneme" placeholder="Phone Number" required data-error="Please enter your Phone">
                                        <div class="help-block with-errors" id="profile_telephoneNumber"></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="address" placeholder="Address" required data-error="Please enter your Address">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" oninput="allow_alphabets(this)" name="city" placeholder="City" required data-error="Please enter your City">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" oninput="allow_alphabets(this)" name="state" placeholder="State" required data-error="Please enter your City">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="subject" name="pin" placeholder="pin" required data-error="Please enter your City">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Your Message" rows="4" data-error="Write your message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                         <div class="form-group">
                                    <input type="hidden" class="form-control" name="transaction_id"
                                    value="<?= $unique_id = time() . mt_rand(); ?>">
                                </div>



                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" type="submit" class="btn btn-success" value="Proceed">Proceed</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 pt-5">
                <h2 class="pt-5">Your cart</h2>
                <table class="cel font-weight-bold p-1" style="border: 1px solid black;">
                    <tr class="text-info">
                        <th class="w-50">Product name</th>
                        <th class="w-50">Price</th>
                        <th class="w-50">Total</th>
                    </tr>
                    <?php
            if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>
                    <tr>
                        <td style="color:red;"><?php echo $values["item_name"]; ?></td>

                        <td style="color:red;"> <?php echo $values["item_price"]; ?></td>
                        <td style="color:red;"> <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>

                    </tr>
                    <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                                    $_SESSION['total'] = $total;

                               }  
                          ?>
                    <tr class="text-success">
                        <td colspan="2" align="right">Total:&nbsp;&nbsp;</td>
                        <td align="right"> <?php echo number_format($total, 2); ?></td>
                        <td></td>
                    </tr>
                    <?php  
                          }  
                          ?>
                </table>
            </div>
                    </div>
                </div>
            </div>
        </div>
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
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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



<?php include 'foot.php'?>