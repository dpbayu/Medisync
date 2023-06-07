<?php
require '../function.php';
$id = $_GET['id'];
$sql = "DELETE FROM tbl_user WHERE id_user = '$id'";
if (mysqli_query($db, $sql)) {
    header("Location: dataPatient.php?success=Data success deleted");
    exit();
} else {
    header("Location: dataPatient.php?failed=Data failed delete");
    exit();    
}
?>