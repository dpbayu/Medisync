<?php
require "include/db.php";

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
function add ($data) {
    global $db;
    $ktp = htmlspecialchars($data["ktp"]);
    $fullname = htmlspecialchars($data["fullname"]);
    $gender = $data["gender"];
    $username = htmlspecialchars($data["username"]);
    $birth_place = htmlspecialchars($data["birth_place"]);
    $birth_date = $data["birth_date"];
    $password = htmlspecialchars($data["password"]);
    $address = htmlspecialchars($data["address"]);
    $city = htmlspecialchars($data["city"]);
    $phone = htmlspecialchars($data["phone"]);
    $blood_type = $data["blood_type"];
    $work = htmlspecialchars($data["work"]);
    $marital_status = $data["marital_status"];
    $query = "INSERT INTO user VALUES ('','$ktp','$fullname','$gender','$username','$birth_place','$birth_date','$password','$address','$city','$phone','$blood_type','$work','$marital_status')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
// Add Patient End

// Delete Patient Start
function delete($id) {
    global $db;
    mysqli_query($db, "DELETE FROM user WHERE id = $id");
    return mysqli_affected_rows($db);
}
// Deelete Patient End

// Edit Patient Start
function edit ($data) {
    global $db;
    $id = $data["id"];
    $ktp = htmlspecialchars($data["ktp"]);
    $fullname = htmlspecialchars($data["fullname"]);
    $gender = $data["gender"];
    $username = htmlspecialchars($data["username"]);
    $birth_place = htmlspecialchars($data["birth_place"]);
    $birth_date = $data["birth_date"];
    $password = $data["password"];
    $address = htmlspecialchars($data["address"]);
    $city = htmlspecialchars($data["city"]);
    $phone = htmlspecialchars($data["phone"]);
    $blood_type = $data["blood_type"];
    $work = htmlspecialchars($data["work"]);
    $marital_status = $data["marital_status"];
    $query = "UPDATE user SET ktp='$ktp', fullname='$fullname', gender='$gender', username='$username', birth_place='$birth_place', birth_date='$birth_date', password='$password', address='$address', city='$city', phone='$phone', blood_type='$blood_type', work='$work', marital_status='$marital_status' WHERE id = $id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
// Edit Patient End

// Add Doctor Start
function add_doctor ($data) {
    global $db;
    $nip = htmlspecialchars($data["nip"]);
    $fullname = htmlspecialchars($data["fullname"]);
    $password = $data["password"];
    $address = htmlspecialchars($data["address"]);
    $birth_place = htmlspecialchars($data["birth_place"]);
    $birth_date = $data["birth_date"];
    $gender = htmlspecialchars($data["gender"]);
    $spesialis = htmlspecialchars($data["spesialis"]);
    $phone = htmlspecialchars($data["phone"]);
    $blood_type = $data["blood_type"];
    $marital_status = $data["marital_status"];
    $query = "INSERT INTO doctor VALUES ('','$nip','$fullname','$password','$address','$birth_place','$birth_date','$gender','$spesialis','$phone','$blood_type','$marital_status')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
// Add Doctor End

// Delete Doctor Start
function delete_doctor($id) {
    global $db;
    mysqli_query($db, "DELETE FROM doctor WHERE id = $id");
    return mysqli_affected_rows($db);
}
// Deelete Doctor End

// Edit Doctor Start
function edit_doctor ($data) {
    global $db;
    $id = $data["id"];
    $nip = htmlspecialchars($data["nip"]);
    $fullname = htmlspecialchars($data["fullname"]);
    $password = $data["password"];
    $address = htmlspecialchars($data["address"]);
    $birth_place = htmlspecialchars($data["birth_place"]);
    $birth_date = $data["birth_date"];
    $gender = htmlspecialchars($data["gender"]);
    $spesialis = htmlspecialchars($data["spesialis"]);
    $phone = htmlspecialchars($data["phone"]);
    $blood_type = $data["blood_type"];
    $marital_status = $data["marital_status"];
    $query = "UPDATE doctor SET nip='$nip', fullname='$fullname', password='$password', address='$address', birth_place='$birth_place', birth_date='$birth_date', gender='$gender', spesialis='$spesialis', phone='$phone', blood_type='$blood_type', marital_status='$marital_status' WHERE id = $id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
// Edit Doctor End
?>