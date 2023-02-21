<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;

if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nik = trim(mysqli_real_escape_string($db, $_POST['nik']));
    $fullname = trim(mysqli_real_escape_string($db, $_POST['fullname']));
    $gender = trim(mysqli_real_escape_string($db, $_POST['gender']));
    $address = trim(mysqli_real_escape_string($db, $_POST['address']));
    $phone = trim(mysqli_real_escape_string($db, $_POST['phone']));
    $sql_cek_identitas = mysqli_query($db, "SELECT * FROM tbl_patient WHERE nik = '$nik'");
    if (mysqli_num_rows($sql_cek_identitas) > 0) {
        echo "<script>alert('Nik sudah ada'); window.location='data.php';</script>";
    } else {
        mysqli_query($db, "INSERT INTO tbl_patient (id_patient, nik, fullname, gender, address, phone) VALUES ('$uuid', '$nik', '$fullname', '$gender', '$address', '$phone')");
        echo "<script>window.location='data.php';</script>";
    }
} else if (isset($_POST['edit'])) {
    // $id = $_POST['id'];
    // $fullname = trim(mysqli_real_escape_string($db, $_POST['fullname']));
    // $spesialis = trim(mysqli_real_escape_string($db, $_POST['spesialis']));
    // $address = trim(mysqli_real_escape_string($db, $_POST['address']));
    // $phone = trim(mysqli_real_escape_string($db, $_POST['phone']));
    // mysqli_query($db, "UPDATE tbl_doctor SET fullname = '$fullname', spesialis = '$spesialis', address = '$address', phone = '$phone' WHERE id_doctor = '$id'");
    // echo "<script>window.location='data.php';</script>";
}
?>