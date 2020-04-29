<?php include 'head.php';  include('dbconn.php');
$arr=[];

$query = "SELECT * FROM feedback ORDER BY f_id DESC";
$arr = select($conn, $query);
// dd($arr);

 ?>

<div class="container-fluid" style="background-color:#fff;" >
    <?php echo format_flash_msg(); ?>

        <h3 class="title text-center">Feedbacks</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Adhaar no</th>
                <th>Message</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($arr)){ ?>
            <?php foreach($arr as $k=>$v){ ?>
            <tr>
                <td><?php echo $v['adhaar_no']; ?></td>
                <td><?php echo $v['message']; ?></td>
            </tr>
            <?php } }else{
            ?>
                <tr>
                    <td colspan="6" >No Feedbacks</td>
                </tr>
                <?php
            }?>
            </tbody>
            </table>
        </div>



<?php include 'foot.php'; ?>