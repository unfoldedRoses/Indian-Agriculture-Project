<?php include 'head.php'; handle_authorized('admin', 'login.php'); ?>
<?php
    // session_start();
    // echo '<pre>';
    // print_r($_SESSION);exit;
?>

<style>
</style>

<h2>Users</h2>

<?php 
include 'dbconn.php';
$query = "SELECT * FROM user_login ORDER BY name ASC";
$users = select($conn, $query);
// dd($users);
?>


<div class="container-fluid" style="background-color:#fff;" >
    <?php echo format_flash_msg(); ?>
        <table class="table table-bordered" style="width: 50%;" >
            <thead>
            <tr>
                <th>Name</th>
                <th>Adhaar Number</th>
                <th>Phone</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($users)){ ?>
            <?php foreach($users as $k=>$v){ ?>
            <tr>
                <td><?php echo $v['name']; ?></td>
                <td><?php echo $v['aadhar_no']; ?></td>
                <td><?php echo $v['phone_no']; ?></td>
                <td><?php echo $v['password']; ?></td>
            </tr>
            <?php } }else{
            ?>
                <tr>
                    <td colspan="6" >No users</td>
                </tr>
                <?php
            }?>
            </tbody>
            </table>
        </div>

<?php  include 'foot.php'; ?>