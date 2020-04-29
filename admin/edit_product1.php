<?php 
include 'head.php';
$route = "create_product";
handle_authorized('admin', 'login.php');
$c_id = (isset($_GET['c_id']) && !empty($_GET['c_id']))? $_GET['c_id'] : NULL;

$arr=[];
if($c_id!=NULL){
    //edit
    include 'dbconn.php';
    $query = "SELECT * FROM crop WHERE c_id='$c_id'";
    $result = $conn->query($query);
    // var_dump($result);
    if ($result->num_rows > 0) {
        $route = "edit_product";
        $arr = $result->fetch_assoc();
    }
}
?>
<form action="routes.php?route=<?php echo $route; ?>" method="post" enctype="multipart/form-data" >

            
    <div class="row " style="margin:0;">
        <div class="col-md-12">
            <?php echo format_flash_msg(); ?>
            <h2><?php 

            if(isset($_GET['c_id']) && !empty($_GET['c_id'])){
                echo "Edit";
            ?>
                <input type="hidden" name="c_id" value="<?php echo $c_id; ?>" >
            <?php
            }else{
                echo "Create";
            }
    ?>  Products</h2>
        </div>

        <div class="col-md-3">
            <?php $field="crop"; ?>
            <label for="">Enter Crop</label>
            <input type="text" name="<?php echo $field; ?>" value="<?php echo (!empty($arr[$field]))? $arr[$field] : ''; ?>" class="form-control" required>
        </div>

        <div class="col-md-3">
            <?php $field="product_name"; ?>
            <label for="">Product Name</label>
            <input type="text" name="<?php echo $field; ?>" value="<?php echo (!empty($arr[$field]))? $arr[$field] : ''; ?>" class="form-control" required>
        </div>

        <div class="col-md-3">
            <?php $field="price"; ?>
            <label for="">Product Price</label>
            <input type="number" name="<?php echo $field; ?>" value="<?php echo (!empty($arr[$field]))? $arr[$field] : ''; ?>" class="form-control" required>
        </div>

        <div class="col-md-3">
            <?php $field="image_path"; ?>
            <label for="">Image</label>
            <input type="file" name="<?php echo $field; ?>" >
        </div>

        <div class="col-md-12">
            <?php $field="details"; ?>
            <label for="">Product details</label>
            <textarea name="<?php echo $field; ?>" cols="30" rows="10" class="form-control" ><?php echo (!empty($arr[$field]))? $arr[$field] : ''; ?></textarea>
        </div>

        <div class="col-md-12">
            <input type="submit" name="product_submit" class="btn btn-primary" value="Submit">
        </div>

    </div>

</form>

<?php  include 'foot.php'; ?>