<?php
require '../function.php';
$chk = @$_POST['checked'];
if (!isset($chk)) {
    echo "<script>window.location='dataMedicine.php?failed=No data selected!';</script>";
} else {
    foreach ($chk as $id) {
        $sql = mysqli_query($db, "DELETE FROM tbl_medicine WHERE id_medicine = '$id'");
    }
    if ($sql) {
        echo "<script>window.location='dataMedicine.php?failed=Data ".count($chk)." successfuly deleted!';</script>";
    } else {
        echo "<script>window.location='dataMedicine.php?failed=Data failed deleted!';</script>";
    }
}
?>