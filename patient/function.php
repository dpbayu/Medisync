<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';

// Update Profile Start
if (isset($_POST['update'])) {
    global $db;
    $name_patient = mysqli_real_escape_string($db, $_POST['name_patient']);
    $email_patient = mysqli_real_escape_string($db, $_POST['email_patient']);
    $password_patient = mysqli_real_escape_string($db, $_POST['password_patient']);
    $profile_patient = $_FILES['profile_patient']['name'];
    $imgtemp = $_FILES['profile_patient']['tmp_name'];
    if ($imgtemp=='') {
        $id = $_SESSION['id_user'];
        $q = "SELECT * FROM tbl_patient WHERE id_user = '$id'";
        $r = mysqli_query($db,$q);
        $d = mysqli_fetch_array($r);
        $profile_patient = $d['profile_patient'];
    }
    move_uploaded_file($imgtemp,"img/$profile_patient");
    if (empty($email_patient) OR empty($name_patient)) {
        echo "Field still empty";
    } else {
            if (empty($password_patient)) {
                $id = $_SESSION['id_user'];
                $sql = "UPDATE tbl_patient SET name_patient = '$name_patient', email_patient = '$email_patient', profile_patient = '$profile_patient' WHERE id_user = '$id'";
                if (mysqli_query($db, $sql)) {
                    $_SESSION['name_patient'] = $name_patient;
                    $_SESSION['email_patient'] = $email_patient;
                    $_SESSION['profile_patient'] = $profile_patient;
                    echo "<script>document.location.href = 'profile.php?success=Succesfully updated!';</script>";
                } else {
                    echo "Error";
                }
            } else {
                $hash = password_hash($password_patient, PASSWORD_DEFAULT);
                $id = $_SESSION['id_user'];
                $sql2 = "UPDATE tbl_patient SET name_patient = '$name_patient', email_patient = '$email_patient', password_patient = '$hash' WHERE id_user = '$id'";
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