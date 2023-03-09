<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepedencyException;

// Add & Edit Patient Start
if (isset($_POST['addPatient'])) {
    $uuid = Uuid::uuid4()->toString();
    $nik_patient = trim(mysqli_real_escape_string($db, $_POST['nik_patient']));
    $name_patient = trim(mysqli_real_escape_string($db, $_POST['name_patient']));
    $gender_patient = trim(mysqli_real_escape_string($db, $_POST['gender_patient']));
    $address_patient = trim(mysqli_real_escape_string($db, $_POST['address_patient']));
    $phone_patient = trim(mysqli_real_escape_string($db, $_POST['phone_patient']));
    $sql_check = mysqli_query($db, "SELECT * FROM tbl_patient WHERE nik_patient = '$nik_patient'");
    if (mysqli_num_rows($sql_check) > 0) {
        echo "<script>window.location='dataPatient.php?failed=NIK already exist! Try again';</script>";
    } else {
        mysqli_query($db, "INSERT INTO tbl_patient (id_patient, nik_patient, name_patient, gender_patient, address_patient, phone_patient) VALUES ('$uuid', '$nik_patient', '$name_patient', '$gender_patient', '$address_patient', '$phone_patient')");
        echo "<script>window.location='dataPatient.php?success=Data successfully added!';</script>";
    }
} else if (isset($_POST['editPatient'])) {
    $id = $_POST['id'];
    $nik_patient = trim(mysqli_real_escape_string($db, $_POST['nik_patient']));
    $name_patient = trim(mysqli_real_escape_string($db, $_POST['name_patient']));
    $gender_patient = trim(mysqli_real_escape_string($db, $_POST['gender_patient']));
    $address_patient = trim(mysqli_real_escape_string($db, $_POST['address_patient']));
    $phone_patient = trim(mysqli_real_escape_string($db, $_POST['phone_patient']));
    $sql_check = mysqli_query($db, "SELECT * FROM tbl_patient WHERE nik_patient = '$nik_patient' AND id_patient != '$id'");
    if (mysqli_num_rows($sql_check) > 0) {
        echo "<script>window.location='dataPatient.php?failed=NIK already exist!';</script>";
    } else {
        mysqli_query($db, "UPDATE tbl_patient SET nik_patient = '$nik_patient', name_patient = '$name_patient', gender_patient = '$gender_patient', address_patient = '$address_patient', phone_patient = '$phone_patient' WHERE id_patient = '$id'");
        echo "<script>window.location='dataPatient.php?success=Data successfully updated!';</script>";
    }
}
// Add & Edit Patient End

// Add & Edit Doctor Start
if (isset($_POST['addDoctor'])) {
    $uuid = Uuid::uuid4()->toString();
    $name_doctor = trim(mysqli_real_escape_string($db, $_POST['name_doctor']));
    $specialist_doctor = trim(mysqli_real_escape_string($db, $_POST['specialist_doctor']));
    $address_doctor = trim(mysqli_real_escape_string($db, $_POST['address_doctor']));
    $phone_doctor = trim(mysqli_real_escape_string($db, $_POST['phone_doctor']));
    mysqli_query($db, "INSERT INTO tbl_doctor (id_doctor, name_doctor, specialist_doctor, address_doctor, phone_doctor) VALUES ('$uuid', '$name_doctor', '$specialist_doctor', '$address_doctor', '$phone_doctor')");
    echo "<script>window.location='dataDoctor.php?success=Data successfuly added!';</script>";
} else if (isset($_POST['editDoctor'])) {
    $id = $_POST['id'];
    $name_doctor = trim(mysqli_real_escape_string($db, $_POST['name_doctor']));
    $specialist_doctor = trim(mysqli_real_escape_string($db, $_POST['specialist_doctor']));
    $address_doctor = trim(mysqli_real_escape_string($db, $_POST['address_doctor']));
    $phone_doctor = trim(mysqli_real_escape_string($db, $_POST['phone_doctor']));
    mysqli_query($db, "UPDATE tbl_doctor SET name_doctor = '$name_doctor', specialist_doctor = '$specialist_doctor', address_doctor = '$address_doctor', phone_doctor = '$phone_doctor' WHERE id_doctor = '$id'");
    echo "<script>window.location='dataDoctor.php?success=Date successfuly updated!';</script>";
}
// Add & Edit Doctor End

// Add & Edit Medicine Start
if (isset($_POST['addMedicine'])) {
    $total = $_POST['total'];
    for ($i = 1; $i <= $total ; $i++) { 
        $uuid = Uuid::uuid4()->toString();
        $name_medicine = trim(mysqli_real_escape_string($db, $_POST['name_medicine-'.$i]));
        $description_medicine = trim(mysqli_real_escape_string($db, $_POST['description_medicine-'.$i]));        
        $sql = mysqli_query($db, "INSERT INTO tbl_medicine (id_medicine, name_medicine, description_medicine) VALUES ('$uuid', '$name_medicine', '$description_medicine')");
    }
    if ($sql) {
        echo "<script>window.location='dataMedicine.php?success=".$total." Data successfully added!';</script>";
    } else {
        echo "<script>window.location='generate.php?failed=Data failed added! Try again';</script>";
    }
} else if (isset($_POST['editMedicine'])) {
    for ($i = 0; $i < count($_POST['id']); $i++) { 
        $id = $_POST['id'][$i];
        $name_medicine = $_POST['name_medicine'][$i];
        $description_medicine = $_POST['description_medicine'][$i];        
        mysqli_query($db, "UPDATE tbl_medicine SET name_medicine = '$name_medicine', description_medicine = '$description_medicine' WHERE id_medicine = '$id'");
    }
    echo "<script>window.location='dataMedicine.php?success=Data successfuly updated!';</script>";
}
// Add & Edit Medicine End

// Add & Edit Poly Start
if (isset($_POST['addPoly'])) {
    $total = $_POST['total'];
    for ($i = 1; $i <= $total ; $i++) { 
        $uuid = Uuid::uuid4()->toString();
        $name_poly = trim(mysqli_real_escape_string($db, $_POST['name_poly-'.$i]));
        $place_poly = trim(mysqli_real_escape_string($db, $_POST['place_poly-'.$i]));        
        $sql = mysqli_query($db, "INSERT INTO tbl_poly (id_poly, name_poly, place_poly) VALUES ('$uuid', '$name_poly', '$place_poly')");
    }
    if ($sql) {
        echo "<script>window.location='dataPoly.php?success=".$total." Data successfully added!';</script>";
    } else {
        echo "<script>window.location='generate.php?failed=Data failed added! Try again';</script>";
    }
} else if (isset($_POST['editPoly'])) {
    for ($i = 0; $i < count($_POST['id']); $i++) { 
        $id = $_POST['id'][$i];
        $name_poly = $_POST['name_poly'][$i];
        $place_poly = $_POST['place_poly'][$i];        
        mysqli_query($db, "UPDATE tbl_poly SET name_poly = '$name_poly', place_poly = '$place_poly' WHERE id_poly = '$id'");
    }
    echo "<script>window.location='dataPoly.php?success=Data successfuly updated!';</script>";
}
// Add & Edit Poly End

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