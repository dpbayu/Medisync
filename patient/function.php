<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;

if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nik_patient = trim(mysqli_real_escape_string($db, $_POST['nik_patient']));
    $name_patient = trim(mysqli_real_escape_string($db, $_POST['name_patient']));
    $gender_patient = trim(mysqli_real_escape_string($db, $_POST['gender_patient']));
    $address_patient = trim(mysqli_real_escape_string($db, $_POST['address_patient']));
    $phone_patient = trim(mysqli_real_escape_string($db, $_POST['phone_patient']));
    $sql_check = mysqli_query($db, "SELECT * FROM tbl_patient WHERE nik_patient = '$nik_patient'");
    if (mysqli_num_rows($sql_check) > 0) {
        echo "<script>window.location='data.php?failed=NIK already exist! Try again';</script>";
    } else {
        mysqli_query($db, "INSERT INTO tbl_patient (id_patient, nik_patient, name_patient, gender_patient, address_patient, phone_patient) VALUES ('$uuid', '$nik_patient', '$name_patient', '$gender_patient', '$address_patient', '$phone_patient')");
        echo "<script>window.location='data.php?success=Data successfully added!';</script>";
    }
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nik_patient = trim(mysqli_real_escape_string($db, $_POST['nik_patient']));
    $name_patient = trim(mysqli_real_escape_string($db, $_POST['name_patient']));
    $gender_patient = trim(mysqli_real_escape_string($db, $_POST['gender_patient']));
    $address_patient = trim(mysqli_real_escape_string($db, $_POST['address_patient']));
    $phone_patient = trim(mysqli_real_escape_string($db, $_POST['phone_patient']));
    $sql_check = mysqli_query($db, "SELECT * FROM tbl_patient WHERE nik_patient = '$nik_patient' AND id_patient != '$id'");
    if (mysqli_num_rows($sql_check) > 0) {
        echo "<script>window.location='data.php?failed=NIK already exist!';</script>";
    } else {
        mysqli_query($db, "UPDATE tbl_patient SET nik_patient = '$nik_patient', name_patient = '$name_patient', gender_patient = '$gender_patient', address_patient = '$address_patient', phone_patient = '$phone_patient' WHERE id_patient = '$id'");
        echo "<script>window.location='data.php?success=Data successfully updated!';</script>";
    }
}
?>