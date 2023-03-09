<?php
require '../function.php';
$chk = @$_POST['checked'];
if (!isset($chk)) {
    echo "<script>window.location='dataPoly.php?failed=No data selected!';</script>";
} else {
    foreach ($chk as $id) {
        $sql = mysqli_query($db, "DELETE FROM tbl_poly WHERE id_poly = '$id'");
    }
    if ($sql) {
        echo "<script>window.location='dataPoly.php?failed=Data ".count($chk)." successfuly deleted!';</script>";
    } else {
        echo "<script>window.location='dataPoly.php?failed=Data failed deleted!';</script>";
    }
}
?>