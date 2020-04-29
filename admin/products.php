<?php include 'head.php'; handle_authorized('admin', 'login.php'); ?>

<?php echo format_flash_msg(); ?>

<table>
    <?php
    handle_authorized("admin");
    include 'dbconn.php'; 
 $qr = "SELECT * FROM crop WHERE is_deleted=0 ORDER BY c_id DESC";
 $result2 = mysqli_query($conn, $qr);

$i=0;

    while($row2 = mysqli_fetch_assoc($result2)){
        $image = '../images/'.$row2['image'];
        if(is_file('../images/products/'.$row2['image_path'])){
            $image = '../images/products/'.$row2['image_path'];
        }
    if($i % 3 == 0){
        echo"<tr>" ;
    }
    echo"<td class='space'>";
    ?>
    
    
    <div class="container pt-3">
        <div class="card mx-3 shadow" >
        <div class="card-header">
        <h5><?= $row2['product_name'] ?></h5>
        </div>
            <div class="card-body">
                <img src="<?php echo $image; ?>" alt="" style="width:200px; height:150px;">
            </div>
            <div class="card-footer">
                <h5>
                <?= $row2['price']; ?>
                <a href="edity.php?Edit=<?php echo $row2['c_id']; ?>" class="btn btn-md btn-danger" >Edit</a>
                <a href="routes.php?route=remove_product&c_id=<?php echo $row2['c_id']; ?>" class="btn btn-md btn-danger" >Remove</a>
                </h5>
                
            </div>
        </div>
    </div>

   

    <?php
   echo "</td>" ;
    if($i % 3 == 2){
    echo"</tr>" ;
}
$i ++;
}
?>
</table><br>



<?php include 'foot.php'; ?>