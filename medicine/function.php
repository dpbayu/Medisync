<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;

if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $name_medicine = trim(mysqli_real_escape_string($db, $_POST['name_medicine']));
    $description_medicine = trim(mysqli_real_escape_string($db, $_POST['description_medicine']));
    mysqli_query($db, "INSERT INTO tbl_medicine (id_medicine, name_medicine, description_medicine) VALUES ('$uuid', '$medicine', '$description')");
    echo "<script>window.location='data.php';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name_medicine = trim(mysqli_real_escape_string($db, $_POST['name_medicine']));
    $description_medicine = trim(mysqli_real_escape_string($db, $_POST['description_medicine']));
    mysqli_query($db, "UPDATE tbl_medicine SET name_medicine='$name_medicine', description_medicine='$description_medicine' WHERE id_medicine = '$id'");
    echo "<script>window.location='data.php';</script>";
}
?>