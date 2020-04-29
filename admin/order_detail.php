<?php include 'head.php'; handle_authorized('admin', 'login.php'); ?>
<?php 
include 'dbconn.php';

$order_id = (isset($_GET['order_id']) && !empty($_GET['order_id']))? $_GET['order_id'] : NULL;
$arr = [];
$items = [];
$query = "SELECT * FROM orders WHERE order_id='$order_id'";
$arr = select_one($conn, $query);
if(!empty($arr)){
    $query = "SELECT * FROM order_items INNER JOIN crop ON order_items.c_id=crop.c_id WHERE order_items.order_id='$order_id'";
    $items = select($conn, $query);
}else{
    return  redirect('dashboard.php');
}
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
<div class="container" style="background-color:#fff;">
        <div class="table-responsive">
        <?php echo format_flash_msg(); ?>
        <h3 class="title text-center">Order Details</h3>
        
        <div class="row">
            <div class="col-md-6">
                <p>Name : <?php echo $arr['name']; ?></p>
                <p>Email : <?php echo $arr['email']; ?></p>
                <p>Address : <?php echo $arr['add1']; ?></p>
                <p>Pincode : <?php echo $arr['pincode']; ?></p>
                <p>City : <?php echo $arr['city_name']; ?></p>
                <p>State : <?php echo $arr['state_name']; ?></p>
            </div>

            <div class="col-md-6">
                <p>Transaction ID : <?php echo $arr['transaction_id']; ?></p>
                <p>Payment Mode   : <?php echo $arr['payment_mode']; ?></p>
                <p>Payment Confirmed At : <?php echo date('d-m-Y', strtotime($arr['payment_confirmed_at'])); ?></p>
                <p>Status : <?php echo ucfirst(strtolower(str_replace('_', ' ', $arr['status']))); ?></p>
                <form  action="routes.php?route=change_order_status" method="post">
                    <input type="hidden" name="order_id" value="<?php echo $order_id ?>" >
                    <label for="">Change Status</label>
                    <select name="status" id="">
                        <option value="">Choose</option>
                        <option value="PENDING">Pending</option>
                        <option value="PROCESSING_FOR_DELIVERY">Processing For Delivery</option>
                        <option value="DELIVERED">Delivered</option>
                    </select>
                    <br>
                    <input type="submit" value="Change Status" class="btn btn-primary" >
                </form>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Crop</th>
                <th>Product Name</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total=0;
            if(!empty($items)){ ?>
            <?php foreach($items as $k=>$v){ ?>
            <tr>
                <td><?php echo $v['crop']; ?></td>
                <td><?php echo $v['product_name']; ?></td>
                <td><?php echo $v['price']; ?></td>
            </tr>
            <?php
                    $total+=$v['price'];
                }
             }else{
            ?>
                <tr>
                    <td colspan="3" >No items ordered</td>
                </tr>
                <?php
            }?>
            </tbody>

            <?php if(!empty($items)){ ?>
            <tfoot>
                <tr>
                    <td colspan="2" ></td>
                    <td><?php echo $total; ?></td>
                </tr>
            </tfoot>
            <?php } ?>
    </table>
        </div>
    </div>

<?php  include 'foot.php'; ?>