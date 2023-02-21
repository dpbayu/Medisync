<?php
//set default timezone
date_default_timezone_set('Asia/Jakarta');
// set session
session_start();
require 'conn.php';
// create connection
$db = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
if(mysqli_connect_error()) {
    echo mysqli_connect_error();
}
// function base url
function base_url($url = null) {
    $base_url = "http://localhost/e-cure";
    if($url != null) {
        return $base_url."/".$url;
    } else {
        return $base_url;
    }
}

// SQL Start
function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// SQL End
?>