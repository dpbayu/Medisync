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
    $born_place = htmlspecialchars($data["born_place"]);
    $born_date = $data["born_date"];
    $password = htmlspecialchars($data["password"]);
    $address = htmlspecialchars($data["address"]);
    $city = htmlspecialchars($data["city"]);
    $phone = htmlspecialchars($data["phone"]);
    $blood_type = $data["blood_type"];
    $work = htmlspecialchars($data["work"]);
    $marital_status = $data["marital_status"];
    $query = "INSERT INTO user VALUES ('','$ktp','$fullname','$gender','$username','$born_place','$born_date','$password','$address','$city','$phone','$blood_type','$work','$marital_status')";
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

// Add Patient Start
function edit ($data) {
    global $db;
    $id = $data["id"];
    $ktp = htmlspecialchars($data["ktp"]);
    $fullname = htmlspecialchars($data["fullname"]);
    $gender = $data["gender"];
    $username = htmlspecialchars($data["username"]);
    $born_place = htmlspecialchars($data["born_place"]);
    $born_date = $data["born_date"];
    $password = htmlspecialchars($data["password"]);
    $address = htmlspecialchars($data["address"]);
    $city = htmlspecialchars($data["city"]);
    $phone = htmlspecialchars($data["phone"]);
    $blood_type = $data["blood_type"];
    $work = htmlspecialchars($data["work"]);
    $marital_status = $data["marital_status"];
    $query = "UPDATE user SET ktp='$ktp', fullname='$fullname', gender='$gender', username='$username', born_place='$born_place', born_date='$born_date', password='$password', address='$address', city='$city', phone='$phone', blood_type='$blood_type', work='$work', marital_status='$marital_status' WHERE id = $id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
// Add Patient End
?>