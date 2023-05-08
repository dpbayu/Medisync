<?php
// Set Default Timezone
date_default_timezone_set('Asia/Jakarta');
// Set Session
session_start();
// Create Connection
$servername = "localhost";
$database = "medisync";
$username = "root";
$password = "";
$db = mysqli_connect($servername, $username, $password, $database);
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
?>