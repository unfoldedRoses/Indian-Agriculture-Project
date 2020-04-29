<?php
 ob_start();
 include 'head.php';
 error_reporting(E_ALL);
 ini_set('display_errors', TRUE);
 ?>
<?php
    if(isset($_POST['login_submit_btn'])){
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        include 'dbconn.php';
        $sql = "select * from admin where username='$username' AND password='$password'";
        
        $query = mysqli_query($conn,$sql);
        
        $row = mysqli_num_rows($query);
        // var_dump($row);exit;
		if($row == 1){
            session_start();
            $_SESSION['role'] = "ADMIN";            
            header('Location:dashboard.php');
		}else{
			echo '<script language="javascript">';
                echo 'alert("Admin Login Failed")';
                echo '</script>';
			// header('location:login form.php');
		}
    }
?>
<style>
#top-nav-menus, #accordionSidebar{
    display: none;
}
</style>


<div class="row">
    <div class="col-md-4 offset-4">
    <?php echo format_flash_msg(); ?>
        <h2 class="title text-center">Admin Login</h2>

        <form action="login.php" method="post">
            <div class="login-div">
                <div class="form-row">
                    <?php $field="username"; ?>
                    <label for="">Username *</label>
                    <input type="text" class="form-control" name="<?php echo $field; ?>" value="admin">
                </div>

                <div class="form-row">
                    <?php $field="password"; ?>
                    <label for="">Password *</label>
                    <input type="password" class="form-control" name="<?php echo $field; ?>" value="admin">
                </div>

                <div class="form-row" style="margin-top:10px;" >
                    <input type="submit" class="btn btn-primary btn-md" name="login_submit_btn" value="Login">
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
let top_nav_menus = document.getElementById('top-nav-menus');
console.log(top_nav_menus);

let accordion_sidebar = document.getElementById('accordionSidebar');
console.log(accordion_sidebar);
top_nav_menus.remove();
accordion_sidebar.remove();
</script>

<?php include 'foot.php'; ?>