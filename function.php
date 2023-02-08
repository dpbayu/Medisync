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
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $address = htmlspecialchars($data["address"]);
    $birth_date = htmlspecialchars($data["birth_date"]);
    $birth_place = htmlspecialchars($data["birth_place"]);
    $gender = htmlspecialchars($data["gender"]);
    $city = htmlspecialchars($data["city"]);
    $phone = htmlspecialchars($data["phone"]);
    $blood_type = htmlspecialchars($data["blood_type"]);
    $marital_status = htmlspecialchars($data["marital_status"]);
    $work = htmlspecialchars($data["work"]);
    $query = "INSERT INTO user VALUES ('','$ktp','$fullname','$username','$password','$address','$birth_date','$birth_place','$gender','$city','$phone','$blood_type','$marital_status','$work')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
// Add Patient End
?>