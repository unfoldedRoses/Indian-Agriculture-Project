
<?php
    include 'dbconn.php';
    
if(isset($_POST["product_submit"])){
    $crop = $_POST['crop'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $details = (!empty($_POST['details']))? $_POST['details'] : '';
    $c_id = (!empty($_POST['c_id']))? $_POST['c_id'] : NULL;

    $query = "SELECT * FROM crop WHERE c_id='$c_id' LIMIT 2";
    $arr = mysqli_query($conn, $query);
    // dd([$_POST, $arr]);

    $Image     = $_FILES["Image"]["name"];
    $Target    = "../images/products/".basename($_FILES["Image"]["name"]);

 

        //create
        $query = "UPDATE crop SET crop='$crop', product_name='$product_name', details='$details', price='$price', image_path='$Target' WHERE c_id='$c_id'";
        // var_dump($query);exit;
        if ($conn->query($query) === TRUE) {
            move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
            flash("Product updated successfully.");
            return redirect("add_products.php");
        } else {
            flash("Failed to update product.");
            return redirect("add_products.php");
        }
    
}
?>





<?php 
include 'head.php';
?>
<?php
 include 'dbconn.php'; 
 $search=$_GET['Edit'];
//  $qr = "SELECT * FROM crop WHERE is_deleted=0 ORDER BY c_id DESC";
 $qr = "SELECT * FROM crop where c_id='$search'";
 $result2 = mysqli_query($conn, $qr);

$i=0;

    while($row2 = mysqli_fetch_assoc($result2)){
        $image = '../images/'.$row2['image'];
        if(is_file('../images/products/'.$row2['image_path'])){
            $image = '../images/products/'.$row2['image_path'];
            $product_name =$row2['crop'];
            $price=$row2['price'];
            $detail=$row2['details'];
            $product_name1=$row2['product_name'];
        }
    if($i % 3 == 0){
        echo"<tr>" ;
    }
}
$route="edit_route";
    echo"<td class='space'>";
    ?>
<form action="edity.php?Edit=<?php echo $search;?>" method="post" enctype="multipart/form-data">
            
    <div class="row " style="margin:0;">
        <div class="col-md-12">
            <?php echo format_flash_msg(); ?>
            <h2>

         Edit Update Products</h2>
        </div>

        <div class="col-md-3">
            <?php $field="crop"; ?>
            <label for="">Crop name</label>
            <input type="text" name="crop" value="<?php echo htmlentities($product_name); ?>" class="form-control" required>
        </div>

        <div class="col-md-3">
            <?php $field="product_name"; ?>
            <label for="">Product Name</label>
            <input type="text" name="product_name" value="<?php echo htmlentities($product_name1);?>" class="form-control" required>
        </div>

        <div class="col-md-3">
            <?php $field="price"; ?>
            <label for="">Product Price</label>
            <input type="number" name="price" value="<?php echo htmlentities($price); ?>" class="form-control" required>
        </div>

        <div class="col-md-3">
      
            <input type="file" name="Image" class="btn form-control" placeholder="image">
        </div>


        <div class="col-md-12">
            <?php $field="details"; ?>
            <label for="">Product details</label>
            <textarea  cols="30" rows="10" class="form-control" value="<?php echo htmlentities($detail);?>" name="post"></textarea>
        </div>
        <div class="col-md-6">
        <div class="card-body">
                <img src="<?php echo $image; ?>" alt="" style="width:200px; height:150px;">
            </div>
</div>
        <div class="col-md-12">
        <a  class="btn btn-md btn-danger" >Remove</a>
            <input type="submit" name="product_submit" class="btn btn-primary" value="Submit">
        </div>

    </div>

</form>

<?php  include 'foot.php'; ?>