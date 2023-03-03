<?php
require '../function.php';

// Update Profile Start
if (isset($_POST['update'])) {
    global $db;
    $name_admin = mysqli_real_escape_string($db, $_POST['name_admin']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $profile_admin = $_FILES['profile_admin']['name'];
    $imgtemp = $_FILES['profile_admin']['tmp_name'];
    if ($imgtemp=='') {
        $id = $_SESSION['id_admin'];
        $q = "SELECT * FROM tbl_admin WHERE id_admin = '$id'";
        $r = mysqli_query($db,$q);
        $d = mysqli_fetch_array($r);
        $profile_admin = $d['profile_admin'];
    }
    move_uploaded_file($imgtemp,"img/$profile_admin");
    if (empty($username) OR empty($name_admin)) {
        echo "Field still empty";
    } else {
            if (empty($password)) {
                $id = $_SESSION['id_admin'];
                $sql = "UPDATE tbl_admin SET name_admin = '$name_admin', username = '$username', profile_admin = '$profile_admin' WHERE id_admin = '$id'";
                if (mysqli_query($db, $sql)) {
                    $_SESSION['name_admin'] = $name_admin;
                    $_SESSION['username'] = $username;
                    $_SESSION['profile_admin'] = $profile_admin;
                    echo "<script>document.location.href = 'profile.php?success=Succesfully updated!';</script>";
                } else {
                    echo "Error";
                }
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $id = $_SESSION['id_admin'];
                $sql2 = "UPDATE tbl_admin SET name_admin = '$name_admin', username = '$username', password = '$hash' WHERE id_admin = '$id'";
                if (mysqli_query($db, $sql2)) {
                    session_unset();
                    session_destroy();
                    echo "<script>alert('Password success changed, please login again');
                    document.location.href = '../index.php';
                    </script>";
                } else {
                echo "error";
            }
        }
    }
}
// Update Profile End
?>