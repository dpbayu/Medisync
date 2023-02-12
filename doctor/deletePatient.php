<?php
require("function.php");
$id = $_GET["id"];
if (delete_patient($id) > 0) {
    echo "<script>document.location.href = 'patient.php?success=Data success deleted!';</script>";
} else {
    echo "<script>document.location.href = 'patient.php?failed=Data failed deleted!';</script>";
}
?>