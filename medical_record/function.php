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
    $check_up = trim(mysqli_real_escape_string($db, $_POST['check_up']));
    mysqli_query($db, "INSERT INTO tbl_medical_record VALUES ('$uuid', '$id_patient', '$illness', '$id_doctor', '$diagnosis', '$id_poly', '$check_up')");
    $medicines = $_POST['id_medicine'];
    foreach ($medicines as $medicine) {
        mysqli_query($db, "INSERT INTO tbl_hospital_medicine VALUES ('$uuid', '$medicine')");
    }
    echo "<script>window.location='data.php?success=Data successfuly added!';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $id_patient = trim(mysqli_real_escape_string($db, $_POST['id_patient']));
    $illness = trim(mysqli_real_escape_string($db, $_POST['illness']));
    $id_doctor = trim(mysqli_real_escape_string($db, $_POST['id_doctor']));
    $diagnosis = trim(mysqli_real_escape_string($db, $_POST['diagnosis']));
    $id_poly = trim(mysqli_real_escape_string($db, $_POST['id_poly']));
    $check_up = trim(mysqli_real_escape_string($db, $_POST['check_up']));
    mysqli_query($db, "UPDATE tbl_medical_record SET id_patient = '$id_patient', illness = '$illness', id_doctor = '$id_doctor', diagnosis = '$diagnosis', id_poly = '$id_poly', check_up = '$check_up' WHERE id_hospital = '$id'");
    echo "<script>window.location='data.php?success=Data successfuly update!';</script>";
}