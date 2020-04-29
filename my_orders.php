<?php
include '../dbconn.php';
include '../admin/functions.php';
handle_authorized('user', 'index.php');
$u_id = $_SESSION['u_id'];
$query = "SELECT * FROM orders WHERE u_id='$u_id' ORDER BY order_id DESC";
// dd($query);
$arr = select($conn, $query);
// dd($arr);
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
    <title>smart Farmer - my orders page</title>
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
.shop-cat-box {
  /* This is where magic happens */
  max-width: 100%;
  max-height: 100%;
  width: auto;

  display: block;
  margin: 0 auto;
  }
.psx{
  padding-top: 24px;
  
}



table {
  background: #f2ffff;
  border-collapse: collapse;
  border-spacing: 0;
  border-color: #9abad9;
  margin: 0px auto;
}

th {
  font: 400 1.125em Arial, sans-serif;
  padding: 0.75rem 1.5rem;
  border-style: solid;
  border-width: 1px;
  overflow: hidden;
  word-break: normal;
  border-color: #9abad9;
  text-align: left;
  color: #fff;
  background-color: #409cff;
}

td {
  font-size: 14px;
  padding: 10px 5px;
  border-style: solid;
  border-width: 1px;
  overflow: hidden;
  word-break: normal;
  border-color: #9abad9;
  color: #444;
}

td:last-child,
th:last-child {
  /* transition: width .7s linear, opacity .5s linear; */
  text-align: right;
  width: 130px;
}

tbody tr:nth-child(even) {
  background-color: #d2e4fc;
}

.table-wrap {
  margin: 1.5rem auto;
}

.sort-header::-moz-selection {
  background: 0 0;
}
.sort-header::selection {
  background: 0 0;
}
.sort-header {
  cursor: pointer;
}
.sort-header:after {
  content: "";
  float: right;
  margin: 7px 0.25rem 0 0.5rem;
  border-width: 0 5px 5px;
  border-style: solid;
  border-color: #fff transparent;
  opacity: 0.6;
  visibility: hidden;
}
.sort-header:hover:after {
  visibility: visible;
}
.sort-asc:after,
.sort-asc:hover:after,
.sort-desc:after {
  visibility: visible;
  opacity: 1;
}
.sort-desc:after {
  border-bottom: none;
  border-width: 5px 5px 0;
}

.btn-wrap {
  text-align: center;
}













    </style>

</head>

<body>
    <!-- Start Main Top -->
    <?php include 'headsup.php'?>

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
    <div class="container">
        <?php echo format_flash_msg(); ?>
        <div class="table-responsive">
        <h3 class="title text-center">My Orders</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Transaction ID</th>
                <th>Email</th>
                <th>City</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($arr)){ ?>
            <?php foreach($arr as $k=>$v){ ?>
            <tr>
                <td><?php echo $v['name']; ?></td>
                <td><?php echo $v['transaction_id']; ?></td>
                <td><?php echo $v['email']; ?></td>
                <td><?php echo $v['city_name']; ?></td>
                <td><?php echo ucfirst(strtolower(str_replace('_', ' ', $v['status']))); ?></td>
                <td>
                    <a href="my_order_detail.php?order_id=<?php echo $v['order_id']; ?>" target="_blank" class="btn btn-primary btn-md" >View Details</a>
                </td>
            </tr>
            <?php } }else{
            ?>
                <tr>
                    <td colspan="6" >No orders</td>
                </tr>
                <?php
            }?>
            </tbody>
    </table>
        </div>
    </div>

<?php include 'foot.php'?>