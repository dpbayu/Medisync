<?php
require '../function.php';
$id = $_GET['id'];
$sql = "DELETE FROM tbl_medical_record WHERE id = '$id'";
if (mysqli_query($db, $sql)) {
    header("Location: dataMedicalRecord.php?success=Data success deleted");
    exit();
} else {
    header("Location: dataMedicalRecord.php?failed=Data failed delete");
    exit();    
}
?>