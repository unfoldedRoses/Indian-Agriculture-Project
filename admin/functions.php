<?php ob_start();
function dbConnection(){
    $username = "root";
    $password = "";
    $host_with_database = "localhost/labmaint";
    $conn = oci_connect($username, $password, $host_with_database);
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        exit;
    }
    return $conn;
}

function getNextIdFromTable($table, $pk){
    $conn = dbConnection();
    $query = oci_parse($conn, "SELECT * FROM $table ORDER BY $pk DESC");
    oci_execute($query);
    $row = make_row_lowercase(oci_fetch_array($query, OCI_ASSOC+OCI_RETURN_NULLS));
    $next_id = 1;
    if(!empty($row)){
        $next_id = (int)$row[$pk]+1;
    }
    // dd($next_id);
    return $next_id;
}

function make_row_lowercase($rows){
    $row=[];
    if(!empty($rows)){
        foreach($rows as $k=>$v){
            $key = strtolower($k);
            $row[$key] = $v;
        }
    }
    return $row;
}


function delete($table, $pk, $id){
    $conn = dbConnection();
    $query = "DELETE FROM $table WHERE $pk='$id'";
    $query = oci_parse($conn, $query);
    $result = oci_execute($query);    
    if($result){
        return TRUE;
    }else{
        echo oci_error($result);
        return FALSE;
    }
}

function update($query){
    $conn = dbConnection();
    $query = oci_parse($conn, $query);
    $result = oci_execute($query);
    if($result){
        return TRUE;
    }else{
        echo oci_error($result);
        return FALSE;
    }
}

function insert($query){
    try {
        $conn = dbConnection();
        $row=FALSE;
        // dd($query);
        $query = oci_parse($conn, $query);
        $result = oci_execute($query);
        if($result){
            $row = TRUE;
        }
    } catch (\Throwable $th) {
        
    }
    return $row;
}

function select($conn, $query){
    $results_set=[];
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while($rows = $result->fetch_assoc()){
            $results_set[]=$rows;
        }
    }
    return $results_set;
}

function select_one($conn, $query){
    $result=[];
    $rows = select($conn, $query);
    
    if(isset($rows[0]) && !empty($rows[0])){
        $result = $rows[0];
    }
    return $result;
}


function dd($info){
    echo '<pre>';
    print_r($info);
    exit;
}
function redirect($url, $permanent = false){
    // var_dump(headers_sent());exit;
    if (headers_sent() === false)
    {
        header('Location:'.$url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

function current_user(){
    // dd([session_status(), PHP_SESSION_NONE]);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // dd($_SESSION);
    $user=(isset($_SESSION["role"]) && !empty($_SESSION["role"]))? $_SESSION : [];
    return $user;
}

$authorizartion_identifier = [
    "ADMIN" => [
        "admin",
    ],
    "USER" => [
        "user"
    ],
];

function handle_authorized($identifier, $redirect=""){
    $user = current_user();
    // var_dump([$identifier, is_authorized($identifier)]);
    // dd($user);
    if(!empty($user) && is_authorized($identifier)["success"] == TRUE){
        return TRUE;
    }else{
        return redirect($redirect);
    }
}

function is_authorized($identifier){
    $user = current_user();
    // var_dump($user);
    $auth_list = (!empty($user))? $GLOBALS['authorizartion_identifier'][$user['role']] : [];

    $info=[
        "success" => FALSE,
    ];

    if(in_array($identifier, $auth_list)){
        $info['success'] = TRUE;
    }
    return $info;
}

function unset_session($session_key){
    if(!is_array($session_key)){
        $session_key = [$session_key];
    }
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!empty($session_key)){
        foreach($session_key as $k=>$v){
            unset($_SESSION[$v]);
        }
    }
}


$sms_api = [
   'auth_key' => 'D!~2044CrFlbluvQc',
   "sender_id" => "TSTSMS",
];

function sendSms($mob, $msg){
    // dd([$mob, $msg]);
    $sms_api = $GLOBALS['sms_api'];

    $sender = $sms_api["sender_id"];
    $auth= $sms_api['auth_key'];
    $msg = urlencode($msg); 

    $url = 'https://global.datagenit.com/API/sms-api.php?auth='.$auth.'&msisdn='.$mob.'&senderid='.$sender.'&message='.$msg.'';  // API URL
    // dd($url);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // change to 1 to verify cert
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    $result = curl_exec($ch);
    $json = json_decode($result, TRUE);
    // dd($json);
    $is_sent=FALSE;
    if(isset($json['status']) && $json['status']=="success"){
        $is_sent=TRUE;
    }
    return $is_sent;
}

function has_session(){
    $has_session = FALSE;
    if (session_status() == PHP_SESSION_NONE) {
        $has_session=TRUE;
    }
    return $has_session;
}

function flash($msg){
    if (has_session()) {
        session_start();
    }
    $_SESSION["msg"] = $msg;
}

function format_flash_msg(){
    $msg="";
    if (has_session()) {
        session_start();
    }
    $msg = (!empty($_SESSION['msg']))? $_SESSION['msg'] : NULL;
    // var_dump($_SESSION);exit;
    $context = "";
    if(!empty($msg)){
        if(strpos($msg, "success")){
            $context = "
                <div class='alert alert-success' >
                    $msg
                </div>";
        }else if(strpos($msg, "fail") || strpos($msg, "Fail") || strpos($msg, "something")){
            $context = "
                <div class='alert alert-danger' >
                    $msg
                </div>";
        }else{
            $context = "
                <div class='alert alert-info' >
                    $msg
                </div>";
        }
    }
    
    unset_session("msg");
    return $context;
}