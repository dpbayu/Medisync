<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;

// Add & Edit Doctor Start
if (isset($_POST['addDoctor'])) {
    $uuid = Uuid::uuid4()->toString();
    $name_doctor = trim(mysqli_real_escape_string($db, $_POST['name_doctor']));
    $email_doctor = trim(mysqli_real_escape_string($db, $_POST['email_doctor']));
    $password_doctor = trim(mysqli_real_escape_string($db, $_POST['password_doctor']));
    $id_specialist = trim(mysqli_real_escape_string($db, $_POST['id_specialist']));
    $address_doctor = trim(mysqli_real_escape_string($db, $_POST['address_doctor']));
    $phone_doctor = trim(mysqli_real_escape_string($db, $_POST['phone_doctor']));
    $sql_check = mysqli_query($db, "SELECT * FROM tbl_doctor WHERE email_doctor = '$email_doctor'");
    if (mysqli_num_rows($sql_check) > 0) {
        echo "<script>window.location='dataDoctor.php?failed=Email already exist! Try again';</script>";
    } else {
        $password_doctor = password_hash($password_doctor, PASSWORD_DEFAULT);
        mysqli_query($db, "INSERT INTO tbl_doctor (id_doctor, name_doctor, email_doctor, password_doctor, id_specialist, address_doctor, phone_doctor) VALUES ('$uuid', '$name_doctor', '$email_doctor', '$password_doctor', '$id_specialist', '$address_doctor', '$phone_doctor')");
        mysqli_query($db, "INSERT INTO tbl_user VALUES ('$email_doctor', 'Doctor')");
        echo "<script>window.location='dataDoctor.php?success=Data successfuly added!';</script>";
    }
} else if (isset($_POST['editDoctor'])) {
    $id = $_POST['id'];
    $name_doctor = trim(mysqli_real_escape_string($db, $_POST['name_doctor']));
    $email_doctor = trim(mysqli_real_escape_string($db, $_POST['email_doctor']));
    $old_email = trim(mysqli_real_escape_string($db, $_POST['old_email']));
    $password_doctor = trim(mysqli_real_escape_string($db, $_POST['password_doctor']));
    $id_specialist = trim(mysqli_real_escape_string($db, $_POST['id_specialist']));
    $address_doctor = trim(mysqli_real_escape_string($db, $_POST['address_doctor']));
    $phone_doctor = trim(mysqli_real_escape_string($db, $_POST['phone_doctor']));
    mysqli_query($db, "SELECT tbl_doctor.id_doctor FROM tbl_doctor INNER JOIN tbl_user ON tbl_doctor.email_doctor = tbl_user.email WHERE tbl_user.email = '$email_doctor'");
        if (empty($password_doctor)) {
            mysqli_query($db, "UPDATE tbl_doctor SET name_doctor = '$name_doctor', email_doctor = '$email_doctor', id_specialist = '$id_specialist', address_doctor = '$address_doctor', phone_doctor = '$phone_doctor' WHERE id_doctor = '$id'");
            mysqli_query($db, "UPDATE tbl_user SET email = '$email_doctor' WHERE email = '$old_email'");
            echo "<script>window.location='dataDoctor.php?success=Data successfuly updated!';</script>";
        } else {
            $hash = password_hash($password_doctor, PASSWORD_DEFAULT);
            mysqli_query($db, "UPDATE tbl_doctor SET name_doctor = '$name_doctor', email_doctor = '$email_doctor', password_doctor = '$hash', id_specialist = '$id_specialist', address_doctor = '$address_doctor', phone_doctor = '$phone_doctor' WHERE id_doctor = '$id'");
            mysqli_query($db, "UPDATE tbl_user SET email = '$email_doctor' WHERE email = '$old_email'");
            echo "<script>window.location='dataDoctor.php?success=Data successfuly updated!';</script>";
    }
}
// Add & Edit Doctor End

// Update Profile Start
if (isset($_POST['update'])) {
    global $db;
    $name_owner = mysqli_real_escape_string($db, $_POST['name_owner']);
    $email_owner = mysqli_real_escape_string($db, $_POST['email_owner']);
    $password_owner = mysqli_real_escape_string($db, $_POST['password_owner']);
    $profile_owner = $_FILES['profile_owner']['name'];
    $imgtemp = $_FILES['profile_owner']['tmp_name'];
    if ($imgtemp=='') {
        $id = $_SESSION['id_owner'];
        $q = "SELECT * FROM tbl_owner WHERE id_owner = '$id'";
        $r = mysqli_query($db,$q);
        $d = mysqli_fetch_array($r);
        $profile_owner = $d['profile_owner'];
    }
    move_uploaded_file($imgtemp,"img/$profile_owner");
    if (empty($email_owner) OR empty($name_owner)) {
        echo "Field still empty";
    } else {
            if (empty($password_owner)) {
                $id = $_SESSION['id_owner'];
                $sql = "UPDATE tbl_owner SET name_owner = '$name_owner', email_owner = '$email_owner', profile_owner = '$profile_owner' WHERE id_owner = '$id'";
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
                $id = $_SESSION['id_owner'];
                $sql2 = "UPDATE tbl_owner SET name_owner = '$name_owner', email_owner = '$email_owner', password_owner = '$hash' WHERE id_owner = '$id'";
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