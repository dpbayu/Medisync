<?php
$servername = "localhost";
$database = "e-cure";
$username = "root";
$password = "";
$db = mysqli_connect($servername, $username, $password, $database); // membuat koneksi
// mengecek koneksi
if (!$db) {
    die("Connect failed: ".mysqli_connect_error());
}
?>