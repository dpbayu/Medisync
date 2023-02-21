<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;

if (isset($_POST['add'])) {
    $total = $_POST['total'];
    for ($i = 1; $i <= $total ; $i++) { 
        $uuid = Uuid::uuid4()->toString();
        $name_poly = trim(mysqli_real_escape_string($db, $_POST['name_poly-'.$i]));
        $place_poly = trim(mysqli_real_escape_string($db, $_POST['place_poly-'.$i]));        
        $sql = mysqli_query($db, "INSERT INTO tbl_poly (id_poly, name_poly, place_poly) VALUES ('$uuid', '$name_poly', '$place_poly')");
    }
    if ($sql) {
        echo "<script>alert('".$total." data berhasil di tambahkan'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Data gagal di tambahkan, coba lagi'); window.location='generate.php';</script>";
    }
} else if (isset($_POST['edit'])) {
    for ($i = 0; $i < count($_POST['id']); $i++) { 
        $id = $_POST['id'][$i];
        $name_poly = $_POST['name_poly'][$i];
        $place_poly = $_POST['place_poly'][$i];        
        mysqli_query($db, "UPDATE tbl_poly SET name_poly = '$name_poly', place_poly = '$place_poly' WHERE id_poly = '$id'");
    }
    echo "<script>alert('Data berhasil diubah'); window.location='data.php';</script>";
}
?>