<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>smart Farmer - online payment Page </title>
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
   

      <!-- Compiled and minified CSS -->
   


<style>
  .row {
        display: -ms-flexbox;
        /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap;
        /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
    }

    .col-25 {
        -ms-flex: 25%;
        /* IE10 */
        flex: 25%;
    }

    .col-50 {
        -ms-flex: 50%;
        /* IE10 */
        flex: 50%;
    }

    .col-75 {
        -ms-flex: 75%;
        /* IE10 */
        flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
        padding: 0 16px;
    }

   

    input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        margin-bottom: 10px;
        display: block;
    }

    .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
    }

    .btn {
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
    }

    .btn:hover {
        background-color: #45a049;
    }

    a {
        color: #2196F3;
    }

    hr {
        border: 1px solid lightgrey;
    }

    span.price {
        float: right;
        color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */

    @media (max-width: 800px) {
        .row {
            flex-direction: column-reverse;
        }

        .col-25 {
            margin-bottom: 20px;
        }
    }

    .ary{
        background-image: url("farmer.jpg");
        background-position: center;
background-repeat: no-repeat;
background-size: cover;
    }
    </style>

</head>
<body>

<?php include 'headsup.php'?>

    <div class="container ary">
    
    <h2 style="color:red;">Online Payment Method</h2>
    <div class="row">
        <div class="col-100">
            <div class="container">
                <form action="message.php">
                    <div class="row">
                        <div class="col-50">
                            <div class="form-control">
                            <h3 style="color:red;">Billing Address</h3>
                            <label for="fname" style="color:red;"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" oninput="allow_alphabets(this)" name="fullname"
                                placeholder="example:ABC" required>
                                </div>
                            <label for="email" style="color:red;"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="abc123@example.com" required>
                            <label for="adr" style="color:red;"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="example:Address" required>
                            <label for="city" style="color:red;"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" oninput="allow_alphabets(this)" name="city"
                                placeholder="example:Belgaum" required>
                            <div class="row">
                                <div class="col-50">
                                    <label for="state" style="color:red;">State</label>
                                    <input type="text" id="state" oninput="allow_alphabets(this)" name="state"
                                        placeholder="example:India" required>
                                </div>
                                <div class="col-50">
                                <div class="form-group">
                                    <label for="zip" style="color:red;">Pin code</label>
                                    <input type="text" id="pincode" name="pin code" placeholder="example:590001"
                                        required>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-50">
                            <h3 style="color:red;">Payment</h3>
                            <label for="fname" style="color:red;">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fab fa-cc-visa" style="color:navy;"></i>
                                <i class="fab fa-amazon-pay" style="color:red;"></i>
                               
                                <i class="fab fa-cc-amex" style="color:blue;"></i>
                                <i class="fab fa-cc-mastercard" ></i>
                                <i class="fab fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname" style="color:red;">Name on Card</label>
                            <input type="text" id="cname" oninput="allow_alphabets(this)" name="cardname"
                                placeholder="example:Abc.." required>
                                <div class="form-group">
                            <label for="ccnum" style="color:red;">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="example:1111-2222-3333-4444"
                                required>
                                </div>
                            <label for="expmonth" style="color:red;">Exp Month</label>
                            <input type="text" id="expmonth" oninput="allow_alphabets(this)" name="expmonth"
                                placeholder="example:September" required>
                            <div class="row">
                                <div class="col-50">
                                <div class="form-group">
                                    <label for="expyear" style="color:red;">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="example:1234" required>
                                </div>
                                </div>
                                <div class="col-50">
                                <div class="form-group">
                                    <label for="cvv" style="color:red;">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="example:000" required>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="transaction_id"
                                value="<?= $unique_id = time() . mt_rand(); ?>">
                        </div>
                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="sameadr"><span style="color:red"><b> Shipping address same as billing</b></span>
                    </label>
                    <a href="#">
                        <input type="submit" value="Continue to checkout" class="btn">
                    </a>

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



        </div>

    </div>

    </body>

</html>