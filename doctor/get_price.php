<?php
require '../function.php';

if (isset($_POST['id_medicine'])) {
    $id_medicine = $_POST['id_medicine'];
    // Pastikan $id_medicine adalah UUID yang valid
    if (!isValidUUID($id_medicine)) {
        echo 'Invalid UUID';
        exit;
    }
    // Query untuk mendapatkan harga dari database
    $sql = "SELECT price_medicine FROM tbl_medicine WHERE id_medicine = '" . mysqli_real_escape_string($db, $id_medicine) . "'";
    $result = mysqli_query($db, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            echo $row['price_medicine'];
        } else {
            echo 'N/A';
        }
    } else {
        echo 'Query error: ' . mysqli_error($db);
    }
}
function isValidUUID($uuid) {
    return preg_match('/^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}$/', $uuid);
}
?>