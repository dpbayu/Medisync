<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;

if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $id_patient = trim(mysqli_real_escape_string($db, $_POST['id_patient']));
    $illness = trim(mysqli_real_escape_string($db, $_POST['illness']));
    $id_doctor = trim(mysqli_real_escape_string($db, $_POST['id_doctor']));
    $diagnosis = trim(mysqli_real_escape_string($db, $_POST['diagnosis']));
    $id_poly = trim(mysqli_real_escape_string($db, $_POST['id_poly']));
    $medicines = $_POST['id_medicine'];
    $check_up = trim(mysqli_real_escape_string($db, $_POST['check_up']));
    mysqli_query($db, "INSERT INTO tbl_medical_record (id_hospital, id_patient, illness, id_doctor, diagnosis, id_poly, check_up) VALUES ('$uuid', '$id_patient', '$illness', '$id_doctor', '$diagnosis', '$id_poly', '$check_up')");
    $medicines = $_POST['id_medicine'];
    foreach ($medicines as $medicine) {
        mysqli_query($db, "INSERT INTO tbl_hospital_medicine (id_hospital, id_medicine) VALUES ('$uuid', '$medicine')");
    }
    echo "<script>window.location='data.php?success=Data successfuly added!';</script>";
} else if (isset($_POST['edit'])) {

}
?>