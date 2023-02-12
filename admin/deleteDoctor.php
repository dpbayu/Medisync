<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
require("../function.php");
$id = $_GET["id"];
if (delete_doctor($id) > 0) {
    echo "<script>document.location.href = 'doctor.php?success=Data success deleted!';</script>";
} else {
    echo "<script>document.location.href = 'doctor.php?failed=Data failed deleted!';</script>";
}
?>