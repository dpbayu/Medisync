<?php
require '../function.php';
$id = $_GET['id'];
$sql = "DELETE FROM tbl_user WHERE id_user = '$id'";
if (mysqli_query($db, $sql)) {
    header("Location: dataDoctor.php?success=Data success deleted");
    exit();
} else {
    header("Location: dataDoctor.php?failed=Data failed delete");
    exit();    
}
?>