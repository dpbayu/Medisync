<?php
require '../function.php';
$id = $_GET['id'];
$sql = "DELETE FROM tbl_doctor WHERE id_doctor = '$id'";
if (mysqli_query($db, $sql)) {
    header("Location: data.php?success=Data success deleted");
    exit();
} else {
    header("Location: data.php?failed=Data failed delete");
    exit();    
}
?>