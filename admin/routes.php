<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
include("functions.php");

$route = (isset($_GET['route']) && !empty($_GET['route']))? $_GET['route'] : NULL;

if($route=="admin_logout"){
    
    unset_session('role');
    return redirect("login.php");
}

if($route=="create_product"){
    include 'dbconn.php';
    
    $crop = $_POST['crop'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $details = (!empty($_POST['details']))? $_POST['details'] : '';
    $c_id = (!empty($_POST['c_id']))? $_POST['c_id'] : NULL;

    $image_path = NULL;

    if(isset($_FILES['image_path']['name']) && !empty($_FILES['image_path']['name'])){
        //upload file
        // $_FILES['image_path']['name']
        $file_name = $_FILES['image_path']['name'];
        $target_dir = "../images/products/";
        $target_file = $target_dir . basename($file_name);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $result = move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file);
        // echo '<pre>';
        // var_dump($result);exit;
        if($result){
            $image_path = $file_name;
        }
    }


    if($c_id==NULL){
        //create
        $query = "INSERT INTO crop (crop, product_name, details, price, image_path) VALUES ('$crop', '$product_name', '$details', $price, '$image_path')";
        // var_dump($query);exit;
        if ($conn->query($query) === TRUE) {
            $id = $conn->insert_id;
            // dd($id);
            flash("Product added successfully.");
            return redirect("add_products.php?c_id=".$id);
        } else {
            flash("Failed to add product");
            return redirect("add_products.php");
        }
    }
}

if($route=="edit_product"){
    include 'dbconn.php';
    
    $crop = $_POST['crop'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $details = (!empty($_POST['details']))? $_POST['details'] : '';
    $c_id = (!empty($_POST['c_id']))? $_POST['c_id'] : NULL;

    $query = "SELECT * FROM crop WHERE c_id='$c_id' LIMIT 2";
    $arr = select_one($conn, $query);
    // dd([$_POST, $arr]);

    $Image     = $_FILES["Image"]["name"];
    $Target    = "../images/products/".basename($_FILES["Image"]["name"]);

 

    if($c_id!=NULL){
        //create
        $query = "UPDATE crop SET crop='$crop', product_name='$product_name', details='$details', price='$price', image_path='$image_path' WHERE c_id='$c_id'";
        // var_dump($query);exit;
        if ($conn->query($query) === TRUE) {
            move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
            flash("Product updated successfully.");
            return redirect("add_products.php?c_id=".$arr['c_id']);
        } else {
            flash("Failed to update product.");
            return redirect("add_products.php");
        }
    }
}

if($route=="remove_product"){

    include 'dbconn.php';
    $c_id = (!empty($_GET['c_id']))? $_GET['c_id'] : NULL;
    if($c_id!=NULL){
        //create
        $query = "UPDATE crop SET is_deleted=1 WHERE c_id='$c_id'";
        // var_dump($query);exit;
        if ($conn->query($query) === TRUE) {
            flash("Product removed successfully.");
            return redirect("products.php");
        } else {
            flash("Failed to removed product.");
            return redirect("products.php");
        }
    }
}

if($route=="change_order_status"){
    include 'dbconn.php';
    $order_id = (isset($_POST['order_id']) && !empty($_POST['order_id']))? $_POST['order_id'] : NULL;
    // dd($order_id);
    if($order_id!=NULL){
        $status = $_POST['status'];
        $query = "UPDATE orders SET status='$status' WHERE order_id='$order_id'";
        // dd($conn->query($query));
        if ($conn->query($query) === TRUE) {
            flash("Order status updated successfully.");
            return redirect("order_detail.php?order_id=$order_id");
        }else{
            flash("Failed to update Order status.");
            return redirect("order_detail.php?order_id=$order_id");
        }
    }else{
        flash("Invalid Order. Please try again");
        return redirect("dashboard.php");
    }
}
