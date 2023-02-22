<?php
//set default timezone
date_default_timezone_set('Asia/Jakarta');
// set session
session_start();
require 'conn.php';
// create connection
$db = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
if (mysqli_connect_error()) {
    echo mysqli_connect_error();
}

// Query Start
function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// Query End

function tgl_indo($tgl) {
    $tanggal = substr($tgl, 8, 2);
    $bulan = substr($tgl, 5, 2);
    $tahun = substr($tgl, 0, 4);
    return $tanggal."/".$bulan."/".$tahun;
}
?>