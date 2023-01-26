<?php
include_once ('api/env.php');
include_once ('api/constants.php');
include_once ('api/dbhelper/MysqliDb.php');

//@TODO Change variables
//@var host 
//@var username
$database = new MysqliDb(
    array(
        'host' => DB_HOST,
        'username' => DB_USER,
        'password' => DB_PASS,
        'db' => DB_NAME,
        'port' => 3306,
        'prefix' => ''
    )
);


//@var change table name
define("TABLE_NAME", "token");


if($_GET['t']) {
    $token = $_GET['t'];
    $destination = $_GET['destination'];

    if($_SERVER['SERVER_NAME'] === 'localhost') {
        $server_root = 'localhost/travel';
    } else {
        // $server_root = $_SERVER['DOCUMENT_ROOT']."/";
        $server_root = 'localhost/travel';
    }

    $database->where ('token', $token);
    $database->where ('status', 'used');
    $isUsed = $database->getOne ('token');

    $database->where ('token', $token);
    $database->where ('expired', 'yes');
    $isExpired = $database->getOne ('token');

    if($isExpired) {
        $expire_status = 'true';
        // $expire_status = "Your verification code is expired. Please book again your destination.";
    
    } elseif($isUsed) {
        $status = 'true';
        // $status = "Your verification code is already used. Please book again your destination.";
    }else {
        $expire_status = 'false';
        $status = 'false';
        
    }
    header("Location: pages/booking_form/?status=$status&isExpired=$expire_status&t=$token&destination=$destination");
}