<?php
require '../function.php';
mysqli_query($db, "DELETE FROM tbl_medicine WHERE id_medicine = '$_GET[id]'");
echo "<script>window.location='data.php';</script>";
?>