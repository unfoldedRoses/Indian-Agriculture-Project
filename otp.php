<?php ob_start();  include('admin/functions.php'); ?>
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

<head>

    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/owl.carousel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="plugins/toastr/toastr.min.css" type="text/css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <style>
    body {
        background: url("images/register.jpg");
    }

    #register_btn {
        display: none !important;
    }
    </style>

</head>
<?php include 'header2.php';?>

<body>

    <!-- <?php 
    $nameError ="";
    if (empty($name)) 
    {
        $nameError = "Name is required";
    } else 
    {
        $name = test_input($_POST["name"]);
        // check name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
        {
            $nameError = "Only letters and white space allowed";
        }
    }
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?> -->

    <div class="w-50 mx-auto py-5 text-white">
        <?php echo format_flash_msg(); ?>
        <h2>Please Register</h2>
        <form action="" class="font-weight-bold" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" id="name"  oninput="allow_alphabets(this)"  name="name" class="form-control" autocomplete="off" required="required" >
                <p id="p1"></p>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="number" id="phone_no" name="phone_no" required pattern="/^-?\d+\.?\d*$/"
                    class="form-control" required>

            </div>

           
            <div class="form-group">
                <label>Enter Mobile Number We Send You  OTP</label>
                <input type="number" name="mobile" maxlength="12" class="form-control" required>
            </div>

            <div class="form-group">
            <!-- <a href="selectState.php"> -->
            <button  type="submit" style="font-size:25px;"
                class="btn btn-success font-weight-bold" name="register2">send OTP </button>
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





            <!-- <button type="button" class="btn btn-success font-weight-bold">Login</button></a><br><br> -->

        </form>
    </div>
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
            include("dbconn.php");
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

    </div>

    <!-- <script>
            
$(document).ready(function() {
$('#submit').click(function(e) {
// Initializing Variables With Form Element Values
var name = $('#name').val();
// Initializing Variables With Regular Expressions
var name_regex = /^[a-z,A-Z]+$/;
// To Check Empty Form Fields.
if (name.length == 0) {
$('#head').text("* All fields are mandatory *"); // This Segment Displays The Validation Rule For All Fields
$("#name").focus();
return false;
}
// Validating Name Field.
else if (!name.match(name_regex) || name.length == 0) {
$('#p1').text("* For your name please use alphabet only *"); // This Segment Displays The Validation Rule For Name
$("#name").focus();
return false;
}
});
});

        </script> -->

    <script>

    </script>
</body>

</html>