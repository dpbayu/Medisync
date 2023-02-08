<?php
$servername = "localhost";
$database = "e-cure";
$username = "root";
$password = "";
$db = mysqli_connect($servername, $username, $password, $database); // create connect
// Check connect
if (!$db) {
    die("Connect failed: ".mysqli_connect_error());
}
?>