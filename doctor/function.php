<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;

if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $fullname = trim(mysqli_real_escape_string($db, $_POST['fullname']));
    $spesialis = trim(mysqli_real_escape_string($db, $_POST['spesialis']));
    $address = trim(mysqli_real_escape_string($db, $_POST['address']));
    $phone = trim(mysqli_real_escape_string($db, $_POST['phone']));
    mysqli_query($db, "INSERT INTO tbl_doctor (id_doctor, fullname, spesialis, address, phone) VALUES ('$uuid', '$fullname', '$spesialis', '$address', '$phone')");
    echo "<script>window.location='data.php';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $fullname = trim(mysqli_real_escape_string($db, $_POST['fullname']));
    $spesialis = trim(mysqli_real_escape_string($db, $_POST['spesialis']));
    $address = trim(mysqli_real_escape_string($db, $_POST['address']));
    $phone = trim(mysqli_real_escape_string($db, $_POST['phone']));
    mysqli_query($db, "UPDATE tbl_doctor SET fullname = '$fullname', spesialis = '$spesialis', address = '$address', phone = '$phone' WHERE id_doctor = '$id'");
    echo "<script>window.location='data.php';</script>";
}
?>