<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;

if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $name_doctor = trim(mysqli_real_escape_string($db, $_POST['name_doctor']));
    $spesialis = trim(mysqli_real_escape_string($db, $_POST['spesialis']));
    $address = trim(mysqli_real_escape_string($db, $_POST['address']));
    $phone = trim(mysqli_real_escape_string($db, $_POST['phone']));
    mysqli_query($db, "INSERT INTO tbl_doctor (id_doctor, name_doctor, spesialis, address, phone) VALUES ('$uuid', '$name_doctor', '$spesialis', '$address', '$phone')");
    echo "<script>window.location='data.php';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name_doctor = trim(mysqli_real_escape_string($db, $_POST['name_doctor']));
    $spesialis = trim(mysqli_real_escape_string($db, $_POST['spesialis']));
    $address = trim(mysqli_real_escape_string($db, $_POST['address']));
    $phone = trim(mysqli_real_escape_string($db, $_POST['phone']));
    mysqli_query($db, "UPDATE tbl_doctor SET name_doctor = '$name_doctor', spesialis = '$spesialis', address = '$address', phone = '$phone' WHERE id_doctor = '$id'");
    echo "<script>window.location='data.php';</script>";
}
?>