<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../loginDoctor.php");
    exit;
}
$_SESSION = [];
session_unset();
session_destroy();
header("Location: ../loginDoctor.php");
exit;
?>