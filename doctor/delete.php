<?php
require '../function.php';
$chk = @$_POST['checked'];
if (!isset($chk)) {
    echo "<script>window.location='data.php?failed=No data selected!';</script>";
} else {
    foreach ($chk as $id) {
        $sql = mysqli_query($db, "DELETE FROM tbl_doctor WHERE id_doctor = '$id'");
    }
    if ($sql) {
        echo "<script>window.location='data.php?failed=Data ".count($chk)." successfuly deleted!';</script>";
    } else {
        echo "<script>window.location='data.php?failed=Data failed deleted!';</script>";
    }
}
?>