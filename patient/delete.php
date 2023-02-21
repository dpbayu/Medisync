<?php
require '../function.php';
mysqli_query($db, "DELETE FROM tbl_patient WHERE id_patient = '$_GET[id]'");
echo "<script>window.location='data.php';</script>";
?>