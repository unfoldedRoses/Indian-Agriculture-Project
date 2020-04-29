<?php include 'head.php'; handle_authorized('admin', 'login.php'); ?>
<?php
    // session_start();
    // echo '<pre>';
    // print_r($_SESSION);exit;
?>

<style>
.dashboard_rows > div > p{
    margin: 0;
    color:#000;
}
.dashboard_rows > div > h2{
    color:#000;
}
.dashboard_rows > div{
    border: 3px solid #cfcbcb;
    background: #fff;
    box-shadow: 2px 2px 0px #a2a2ae;
    border-radius: 5px;
}
</style>

<h2>Dashboard</h2>

<?php 
include 'dbconn.php';

$query = "SELECT COUNT(*) as users_count FROM user_login ";
$users_count = select_one($conn, $query)["users_count"];

$query = "SELECT COUNT(*) as products_count FROM crop ";
$products_count = select_one($conn, $query)["products_count"];

$query = "SELECT COUNT(*) as orders_count FROM orders ";
$orders_count = select_one($conn, $query)["orders_count"];

// dd([$users_count, $products_count, $orders_count]);

$arr = [
    ["title" => "Total Number of Users","value" => "$users_count nos"],
    ["title" => "Total Products","value" => "$products_count nos"],
    ["title" => "Total Orders","value" => "$orders_count nos"],
];

$query = "SELECT * FROM orders ORDER BY order_id DESC";
$orders = select($conn, $query);
?>

<div class="row dashboard_rows" style="margin: 0 20px;" >
<?php
foreach($arr as $k => $v){
?>
    <div class="col-md-3" style="margin:0 5px;" >
        <p><?php echo $v['title']; ?></p>
        <h2 class="title"><?php echo $v['value']; ?></h2>
    </div>
<?php
}
?>
</div>
<br>

<div class="container-fluid" style="background-color:#fff;" >
    <?php echo format_flash_msg(); ?>

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
            <?php if(!empty($orders)){ ?>
            <?php foreach($orders as $k=>$v){ ?>
            <tr>
                <td><?php echo $v['name']; ?></td>
                <td><?php echo $v['transaction_id']; ?></td>
                <td><?php echo $v['email']; ?></td>
                <td><?php echo $v['city_name']; ?></td>
                <td><?php echo ucfirst(strtolower(str_replace('_', ' ', $v['status']))); ?></td>
                <td>
                    <a href="order_detail.php?order_id=<?php echo $v['order_id']; ?>" target="_blank" class="btn btn-primary btn-md" >View Details</a>
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

<?php  include 'foot.php'; ?>