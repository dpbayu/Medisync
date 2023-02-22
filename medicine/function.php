<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;

if (isset($_POST['add'])) {
    $total = $_POST['total'];
    for ($i = 1; $i <= $total ; $i++) { 
        $uuid = Uuid::uuid4()->toString();
        $name_medicine = trim(mysqli_real_escape_string($db, $_POST['name_medicine-'.$i]));
        $description_medicine = trim(mysqli_real_escape_string($db, $_POST['description_medicine-'.$i]));        
        $sql = mysqli_query($db, "INSERT INTO tbl_medicine (id_medicine, name_medicine, description_medicine) VALUES ('$uuid', '$name_medicine', '$description_medicine')");
    }
    if ($sql) {
        echo "<script>window.location='data.php?success=".$total." Data successfully added!';</script>";
    } else {
        echo "<script>window.location='generate.php?failed=Data failed added! Try again';</script>";
    }
} else if (isset($_POST['edit'])) {
    for ($i = 0; $i < count($_POST['id']); $i++) { 
        $id = $_POST['id'][$i];
        $name_medicine = $_POST['name_medicine'][$i];
        $description_medicine = $_POST['description_medicine'][$i];        
        mysqli_query($db, "UPDATE tbl_medicine SET name_medicine = '$name_medicine', description_medicine = '$description_medicine' WHERE id_medicine = '$id'");
    }
    echo "<script>window.location='data.php?success=Data successfuly updated!';</script>";
}
?>