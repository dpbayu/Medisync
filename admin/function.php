<?php
// Set Default Timezone
date_default_timezone_set('Asia/Jakarta');
// Set Session
session_start();
// Create Connection
$servername = "localhost";
$database = "e-cure";
$username = "root";
$password = "";
$db = mysqli_connect($servername, $username, $password, $database);
if (mysqli_connect_error()) {
    echo mysqli_connect_error();
}

// Query Start
function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// Query End

// Update Profile Start
if (isset($_POST['update'])) {
    global $db;
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $user_profile = $_FILES['user_profile']['name'];
    $imgtemp = $_FILES['user_profile']['tmp_name'];
    if ($imgtemp=='') {
        $id = $_SESSION['id_user'];
        $q = "SELECT * FROM tbl_user WHERE id_user = '$id'";
        $r = mysqli_query($db,$q);
        $d = mysqli_fetch_array($r);
        $user_profile = $d['user_profile'];
    }
    move_uploaded_file($imgtemp,"assets/img/$user_profile");
    if (empty($username) OR empty($fullname)) {
        echo "Field still empty";
    } else {
            if (empty($password)) {
                $id = $_SESSION['id_user'];
                $sql = "UPDATE tbl_user SET fullname = '$fullname', username = '$username', user_profile = '$user_profile' WHERE id_user = '$id'";
                if (mysqli_query($db, $sql)) {
                    $_SESSION['fullname'] = $fullname;
                    $_SESSION['username'] = $username;
                    $_SESSION['user_profile'] = $user_profile;
                    echo "<script>document.location.href = 'profile.php?success=Data successfuly update!';</script>";
                } else {
                    echo "Error";
                }
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $id = $_SESSION['id_user'];
                $sql2 = "UPDATE tbl_user SET fullname = '$fullname', username = '$username', password = '$hash' WHERE id_user = '$id'";
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