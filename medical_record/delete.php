<?php
require '../function.php';
mysqli_query($db, "DELETE FROM tbl_medical_record WHERE id_hospital = '$_GET[id]'");
echo "<script>window.location='data.php';</script>";
?>