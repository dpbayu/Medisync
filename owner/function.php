<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;

// Add Admin Start
if (isset($_POST['addAdmin'])) {
    $uuid = Uuid::uuid4()->toString();
    $name_admin = trim(mysqli_real_escape_string($db, $_POST['name_admin']));
    $email_admin = trim(mysqli_real_escape_string($db, $_POST['email_admin']));
    $password_admin = trim(mysqli_real_escape_string($db, $_POST['password_admin']));
    $sql_check = mysqli_query($db, "SELECT * FROM tbl_admin WHERE email_admin = '$email_admin'");
    if (mysqli_num_rows($sql_check) > 0) {
        echo "<script>window.location='dataAdmin.php?failed=Email already exist! Try again';</script>";
    } else {
        $password_admin = password_hash($password_admin, PASSWORD_DEFAULT);
        mysqli_query($db, "INSERT INTO tbl_user (id_user, email, role) VALUES ('$uuid', '$email_admin', 'Admin')");
        mysqli_query($db, "INSERT INTO tbl_admin (id_user, name_admin, email_admin, password_admin) VALUES ('$uuid', '$name_admin', '$email_admin', '$password_admin')");
        echo "<script>window.location='dataAdmin.php?success=Data successfuly added!';</script>";
    }
}
// Add Admin End

// Update Profile Start
if (isset($_POST['update'])) {
    global $db;
    $name_owner = mysqli_real_escape_string($db, $_POST['name_owner']);
    $email_owner = mysqli_real_escape_string($db, $_POST['email_owner']);
    $password_owner = mysqli_real_escape_string($db, $_POST['password_owner']);
    $old_profile = $_POST['old_profile'];
    $profile_owner = $_FILES['profile_owner']['name'];
    $imgtemp = $_FILES['profile_owner']['tmp_name'];
    if ($imgtemp=='') {
        $id = $_SESSION['id_user'];
        $q = "SELECT * FROM tbl_owner WHERE id_user = '$id'";
        $r = mysqli_query($db,$q);
        $d = mysqli_fetch_array($r);
        $profile_owner = $d['profile_owner'];
    }
    unlink('img/'.$old_profile);
    move_uploaded_file($imgtemp,"img/$profile_owner");
    if (empty($email_owner) OR empty($name_owner)) {
        echo "Field still empty";
    } else {
            if (empty($password_owner)) {
                $id = $_SESSION['id_user'];
                $sql = "UPDATE tbl_owner SET name_owner = '$name_owner', email_owner = '$email_owner', profile_owner = '$profile_owner' WHERE id_user = '$id'";
                if (mysqli_query($db, $sql)) {
                    $_SESSION['name_owner'] = $name_owner;
                    $_SESSION['email_owner'] = $email_owner;
                    $_SESSION['profile_owner'] = $profile_owner;
                    echo "<script>document.location.href = 'profile.php?success=Succesfully updated!';</script>";
                } else {
                    echo "Error";
                }
            } else {
                $hash = password_hash($password_owner, PASSWORD_DEFAULT);
                $id = $_SESSION['id_user'];
                $sql2 = "UPDATE tbl_owner SET name_owner = '$name_owner', email_owner = '$email_owner', profile_owner = '$profile_owner', password_owner = '$hash' WHERE id_user = '$id'";
                mysqli_query($db, "UPDATE tbl_user SET email = '$email_owner' WHERE id_user = '$id'");
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