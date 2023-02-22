<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;

if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $name_doctor = trim(mysqli_real_escape_string($db, $_POST['name_doctor']));
    $specialist_doctor = trim(mysqli_real_escape_string($db, $_POST['specialist_doctor']));
    $address_doctor = trim(mysqli_real_escape_string($db, $_POST['address_doctor']));
    $phone_doctor = trim(mysqli_real_escape_string($db, $_POST['phone_doctor']));
    mysqli_query($db, "INSERT INTO tbl_doctor (id_doctor, name_doctor, specialist_doctor, address_doctor, phone_doctor) VALUES ('$uuid', '$name_doctor', '$specialist_doctor', '$address_doctor', '$phone_doctor')");
    echo "<script>window.location='data.php?success=Data successfuly added!';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name_doctor = trim(mysqli_real_escape_string($db, $_POST['name_doctor']));
    $specialist_doctor = trim(mysqli_real_escape_string($db, $_POST['specialist_doctor']));
    $address_doctor = trim(mysqli_real_escape_string($db, $_POST['address_doctor']));
    $phone_doctor = trim(mysqli_real_escape_string($db, $_POST['phone_doctor']));
    mysqli_query($db, "UPDATE tbl_doctor SET name_doctor = '$name_doctor', specialist_doctor = '$specialist_doctor', address_doctor = '$address_doctor', phone_doctor = '$phone_doctor' WHERE id_doctor = '$id'");
    echo "<script>window.location='data.php?success=Date successfuly updated!';</script>";
}
?>