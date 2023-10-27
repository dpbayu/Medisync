<?php
require '../function.php';
$id = $_GET['id'];
$sql = "DELETE tbl_medical_record, tbl_hospital_medicine FROM tbl_medical_record INNER JOIN tbl_hospital_medicine ON tbl_medical_record.id_hospital = tbl_hospital_medicine.id_hospital WHERE tbl_medical_record.id_hospital = '$id'";
if (mysqli_query($db, $sql)) {
    header("Location: dataMedicalRecord.php?success=Data success deleted");
    exit();
} else {
    header("Location: dataMedicalRecord.php?failed=Data failed delete");
    exit();    
}
?>