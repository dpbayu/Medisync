<?php
require "../include/db.php";

// Function Query Start
function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// Function Query End

// Add Patient Start
function add_patient ($data) {
    global $db;
    $ktp = htmlspecialchars($data["ktp"]);
    $fullname = htmlspecialchars($data["fullname"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $birth_place = htmlspecialchars($data["birth_place"]);
    $birth_date = $data["birth_date"];
    $gender = $data["gender"];
    $blood_type = $data["blood_type"];
    $address = htmlspecialchars($data["address"]);
    $city = htmlspecialchars($data["city"]);
    $religion = $data["religion"];
    $marital_status = $data["marital_status"];
    $work = htmlspecialchars($data["work"]);
    $phone = htmlspecialchars($data["phone"]);
    $type_room = $data["type_room"];
    $room_number = htmlspecialchars($data["room_number"]);
    $diagnosis = htmlspecialchars($data["diagnosis"]);
    $complication = htmlspecialchars($data["complication"]);
    $infection = htmlspecialchars($data["infection"]);
    $cause_of_infection = htmlspecialchars($data["cause_of_infection"]);
    $exit_condition = htmlspecialchars($data["exit_condition"]);
    $way_out = htmlspecialchars($data["way_out"]);
    $query = "INSERT INTO user VALUES ('','$ktp','$fullname','$username','$password','$birth_place','$birth_date','$gender','$blood_type','$address','$city','$religion','$marital_status','$work','$phone','$type_room','$room_number','$diagnosis','$complication','$infection','$cause_of_infection','$exit_condition','$way_out')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
// Add Patient End

// Delete Patient Start
function delete_patient($id) {
    global $db;
    mysqli_query($db, "DELETE FROM user WHERE id = $id");
    return mysqli_affected_rows($db);
}
// Delete Patient End

// Edit Patient Start
function edit_patient ($data) {
    global $db;
    $id = $data["id"];
    $ktp = htmlspecialchars($data["ktp"]);
    $fullname = htmlspecialchars($data["fullname"]);
    $username = htmlspecialchars($data["username"]);
    $birth_place = htmlspecialchars($data["birth_place"]);
    $birth_date = $data["birth_date"];
    $gender = $data["gender"];
    $blood_type = $data["blood_type"];
    $address = htmlspecialchars($data["address"]);
    $city = htmlspecialchars($data["city"]);
    $religion = $data["religion"];
    $marital_status = $data["marital_status"];
    $work = htmlspecialchars($data["work"]);
    $phone = htmlspecialchars($data["phone"]);
    $type_room = $data["type_room"];
    $room_number = $data["room_number"];
    $diagnosis = htmlspecialchars($data["diagnosis"]);
    $complication = htmlspecialchars($data["complication"]);
    $infection = htmlspecialchars($data["infection"]);
    $cause_of_infection = htmlspecialchars($data["cause_of_infection"]);
    $exit_condition = $data["exit_condition"];
    $way_out = $data["way_out"];
    $query = "UPDATE user SET ktp='$ktp', fullname='$fullname', username='$username', birth_place='$birth_place', birth_date='$birth_date', gender='$gender', blood_type='$blood_type', address='$address', city='$city', religion='$religion', marital_status='$marital_status', work='$work', phone='$phone', type_room='$type_room', room_number='$room_number', diagnosis='$diagnosis', complication='$complication', infection='$infection', cause_of_infection='$cause_of_infection', exit_condition='$exit_condition', way_out='$way_out' WHERE id = $id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
// Edit Patient End

// Update Profile Start
function update_admin($data) {
    global $db;
    $nik = mysqli_real_escape_string($db, $data['nik']);
    $fullname = mysqli_real_escape_string($db, $data['fullname']);
    $username = mysqli_real_escape_string($db, $data['username']);
    $password = mysqli_real_escape_string($db, $data['password']);
    $admin_profile = $_FILES['admin_profile']['name'];
    $imgtemp = $_FILES['admin_profile']['tmp_name'];
    if ($imgtemp=='') {
        $id = $_SESSION['id'];
        $q = "SELECT * FROM admin WHERE id = '$id'";
        $r = mysqli_query($db,$q);
        $d = mysqli_fetch_array($r);
        $admin_profile = $d['admin_profile'];
    }
    move_uploaded_file($imgtemp,"assets/img/$admin_profile");
    if (empty($nik) OR empty($fullname) OR empty($username)) {
        echo "Field still empty";
    } else {
            if (empty($password)) {
                $id = $_SESSION['id'];
                $sql = "UPDATE admin SET nik='$nik', fullname='$fullname', username='$username', admin_profile='$admin_profile' WHERE id = '$id'";
                if (mysqli_query($db, $sql)) {
                    $_SESSION['nik'] = $nik;    
                    $_SESSION['fullname'] = $fullname;
                    $_SESSION['username'] = $username;
                    $_SESSION['admin_profile'] = $admin_profile;
                } else {
                    echo "Error";
                }
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $id = $_SESSION['id'];
                $sql2 = "UPDATE admin SET nik='$nik', fullname='$fullname', username='$username', password='$hash' WHERE id = '$id'";
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

// Update Profile Start
function update_doctor($data) {
    global $db;
    $fullname = mysqli_real_escape_string($db, $data['fullname']);
    $phone = mysqli_real_escape_string($db, $data['phone']);
    $address = mysqli_real_escape_string($db, $data['address']);
    $password = mysqli_real_escape_string($db, $data['password']);
    $doctor_profile = $_FILES['doctor_profile']['name'];
    $imgtemp = $_FILES['doctor_profile']['tmp_name'];
    if ($imgtemp=='') {
        $id = $_SESSION['id'];
        $q = "SELECT * FROM doctor WHERE id = '$id'";
        $r = mysqli_query($db,$q);
        $d = mysqli_fetch_array($r);
        $doctor_profile = $d['doctor_profile'];
    }
    move_uploaded_file($imgtemp,"assets/img/$doctor_profile");
    if (empty($fullname)) {
        echo "Field still empty";
    } else {
            if (empty($password)) {
                $id = $_SESSION['id'];
                $sql = "UPDATE doctor SET fullname='$fullname', phone='$phone', address='$address', doctor_profile='$doctor_profile' WHERE id = '$id'";
                if (mysqli_query($db, $sql)) {
                    $_SESSION['fullname'] = $fullname;
                    $_SESSION['phone'] = $phone;
                    $_SESSION['address'] = $address;
                    $_SESSION['doctor_profile'] = $doctor_profile;
                } else {
                    echo "Error";
                }
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $id = $_SESSION['id'];
                $sql2 = "UPDATE doctor SET fullname='$fullname', phone='$phone', address='$address', password='$hash' WHERE id = '$id'";
                if (mysqli_query($db, $sql2)) {
                    session_unset();
                    session_destroy();
                    echo "<script>alert('Password success changed, please login again');
                    document.location.href = '../loginDoctor.php';
                    </script>";
                } else {
                echo "error";
            }
        }
    }
}
// Update Profile End
?>