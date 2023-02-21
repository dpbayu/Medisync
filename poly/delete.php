<?php
require '../function.php';
$chk = @$_POST['checked'];
if (!isset($chk)) {
    echo "<script>alert('Tidak ada data yang dipilih'); window.location='data.php';</script>";
} else {
    foreach ($chk as $id) {
        $sql = mysqli_query($db, "DELETE FROM tbl_poly WHERE id_poly = '$id'");
    }
    if ($sql) {
        echo "<script>alert('".count($chk)." data berhasil di hapus'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Data gagal di hapus, coba lagi');</script>";
    }
}
?>