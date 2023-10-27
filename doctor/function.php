<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;

// Send to Medical Record Start

// Send to Medical Record End

// Add & Edit Medical Record Start
if (isset($_POST['addMedicalRecord'])) {
    $uuid = Uuid::uuid4()->toString();
    $id_patient = trim(mysqli_real_escape_string($db, $_POST['id_patient']));
    $illness = trim(mysqli_real_escape_string($db, $_POST['illness']));
    $id_doctor = trim(mysqli_real_escape_string($db, $_POST['id_doctor']));
    $diagnosis = trim(mysqli_real_escape_string($db, $_POST['diagnosis']));
    $id_poly = trim(mysqli_real_escape_string($db, $_POST['id_poly']));
    $check_up = trim(mysqli_real_escape_string($db, $_POST['check_up']));
    mysqli_query($db, "INSERT INTO tbl_medical_record (id_hospital, id_patient, illness, id_doctor, diagnosis, id_poly, check_up) VALUES ('$uuid', '$id_patient', '$illness', '$id_doctor', '$diagnosis', '$id_poly', '$check_up')");
    echo "<script>window.location='dataMedicalRecord.php?success=Data successfuly added!';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $uuid = Uuid::uuid4()->toString();
    $id_patient = trim(mysqli_real_escape_string($db, $_POST['id_patient']));
    $illness = trim(mysqli_real_escape_string($db, $_POST['illness']));
    $id_doctor = trim(mysqli_real_escape_string($db, $_POST['id_doctor']));
    $diagnosis = trim(mysqli_real_escape_string($db, $_POST['diagnosis']));
    $id_poly = trim(mysqli_real_escape_string($db, $_POST['id_poly']));
    $check_up = trim(mysqli_real_escape_string($db, $_POST['check_up']));
    mysqli_query($db, "UPDATE tbl_medical_record SET id_patient = '$id_patient', illness = '$illness', id_doctor = '$id_doctor', diagnosis = '$diagnosis', id_poly = '$id_poly', check_up = '$check_up' WHERE id = '$id'");
    echo "<script>window.location='dataMedicalRecord.php?success=Data successfuly updated!';</script>";
}
// Add & Edit Medical Record End

// Add Medicine Start
if (isset($_POST['addMedicine'])) {
    $id_hospital = $_POST['id_hospital'];
    $id_medicine = $_POST['id_medicine'];
    $qty_medicine = $_POST['qty_medicine'];
    $total = count($id_medicine);
    //melakukan perulangan input
    for ($i = 0; $i < $total; $i++) {
        mysqli_query($db, "INSERT INTO tbl_hospital_medicine SET id_hospital = '$id_hospital', id_medicine = '$id_medicine[$i]', qty_medicine = '$qty_medicine[$i]'");
    }
    echo "<script>window.location='dataMedicalRecord.php?success=Medicine successfuly added!';</script>";
}
// Add Medicine End

// Update Profile Start
if (isset($_POST['update'])) {
    global $db;
    $name_doctor = mysqli_real_escape_string($db, $_POST['name_doctor']);
    $email_doctor = mysqli_real_escape_string($db, $_POST['email_doctor']);
    $password_doctor = mysqli_real_escape_string($db, $_POST['password_doctor']);
    $profile_doctor = $_FILES['profile_doctor']['name'];
    $imgtemp = $_FILES['profile_doctor']['tmp_name'];
    if ($imgtemp=='') {
        $id = $_SESSION['id_doctor'];
        $q = "SELECT * FROM tbl_doctor WHERE id_doctor = '$id'";
        $r = mysqli_query($db,$q);
        $d = mysqli_fetch_array($r);
        $profile_doctor = $d['profile_doctor'];
    }
    move_uploaded_file($imgtemp,"img/$profile_doctor");
    if (empty($email_doctor) OR empty($name_doctor)) {
        echo "Field still empty";
    } else {
            if (empty($password_doctor)) {
                $id = $_SESSION['id_doctor'];
                $sql = "UPDATE tbl_doctor SET name_doctor = '$name_doctor', email_doctor = '$email_doctor', profile_doctor = '$profile_doctor' WHERE id_doctor = '$id'";
                mysqli_query($db, "UPDATE tbl_user SET email = '$email_doctor' WHERE id_user = '$id'");
                if (mysqli_query($db, $sql)) {
                    $_SESSION['name_doctor'] = $name_doctor;
                    $_SESSION['email_doctor'] = $email_doctor;
                    $_SESSION['profile_doctor'] = $profile_doctor;
                    echo "<script>document.location.href = 'profile.php?success=Succesfully updated!';</script>";
                } else {
                    echo "Error";
                }
            } else {
                $hash = password_hash($password_doctor, PASSWORD_DEFAULT);
                $id = $_SESSION['id_doctor'];
                $sql2 = "UPDATE tbl_doctor SET name_doctor = '$name_doctor', email_doctor = '$email_doctor', password_doctor = '$hash' WHERE id_doctor = '$id'";
                mysqli_query($db, "UPDATE tbl_user SET email = '$email_doctor' WHERE id_user = '$id'");
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