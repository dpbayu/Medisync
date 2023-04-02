<?php
require '../function.php';
$id = $_GET['id'];
$sql = "DELETE FROM tbl_admin WHERE id_user = '$id'";
if (mysqli_query($db, $sql)) {
    header("Location: dataAdmin.php?success=Data success deleted");
    exit();
} else {
    header("Location: dataAdmin.php?failed=Data failed delete");
    exit();    
}
?>