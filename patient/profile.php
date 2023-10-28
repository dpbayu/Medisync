<!-- PHP -->
<?php
require '../function.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'profile';
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require '../partialsPatient/head.php' ?>
<style>
    img {
        object-fit: cover;
    }
</style>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require '../partialsPatient/header.php' ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require '../partialsPatient/sidebar.php' ?>
    <!-- Sidebar End-->
    <!-- Main Start -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profile</h1>
        </div>
        <section class="section dashboard">
            <div class="col-md-12">
                <div class="row">
                    <?php
                    if (isset($_GET['success'])) {
                        $msg = $_GET['success'];
                        echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>' . $msg . '</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    ?>
                    <div class="col-md-6">
                        <form class="forms-sample" action="function.php" method="POST" enctype="multipart/form-data">
                            <img src="img/<?php echo $_SESSION['profile_patient'] ?>" class="rounded-circle" height="200" width="200">
                            <div class="form-group mb-3">
                                <label class="form-label" for="profil">Profile</label>
                                <input class="form-control" type="file" id="profile" name="profile_patient">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="name_patient">Fullname</label>
                                <input class="form-control" type="text" id="name_patient" name="name_patient" value="<?php echo $_SESSION['name_patient'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="gender_patient">Gender</label>
                                <div class="d-flex gap-3">
                                    <label class="form-label" class="radio-inline">
                                        <input type="radio" name="gender_patient" value="Man" <?php echo $_SESSION['gender_patient'] == "Man" ? "checked" : null ?> required> Man
                                    </label>
                                    <label class="form-label" class="radio-inline">
                                        <input type="radio" name="gender_patient" value="Woman" <?php echo $_SESSION['gender_patient'] == "Woman" ? "checked" : null ?> required> Woman
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="BloodType">Blood Type</label>
                                <select class="form-control" id="BloodType" name="blood_patient">
                                    <option value="A" <?php echo $_SESSION['blood_patient'] == "A" ? "selected" : '' ?>>A
                                    </option>
                                    <option value="B" <?php echo $_SESSION['blood_patient'] == "B" ? "selected" : '' ?>>B
                                    </option>
                                    <option value="AB" <?php echo $_SESSION['blood_patient'] == "AB" ? "selected" : '' ?>>AB
                                    </option>
                                    <option value="O" <?php echo $_SESSION['blood_patient'] == "O" ? "selected" : '' ?>>O</option>
                                </select>
                            </div>
                            <div class="d-flex gap-5">
                                <div class="form-group mb-3 col">
                                    <label class="form-label" for="birth_place">Birth Place</label>
                                    <input class="form-control" type="text" id="birth_place" name="birth_place" value="<?php echo $_SESSION['birth_place'] ?>" required>
                                </div>
                                <div class="form-group mb-3 col">
                                    <label class="form-label" for="birth_date">Birth Date Patient</label>
                                    <input class="form-control" type="date" id="birth_date" name="birth_date" value="<?= date('Y-m-d', strtotime($_SESSION["birth_date"])) ?>">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" type="email" id="email" name="email_patient" value="<?php echo $_SESSION['email_patient'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="address">Address</label>
                                <input class="form-control" type="text" id="address" name="address_patient" value="<?php echo $_SESSION['address_patient'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="phone">Phone</label>
                                <input class="form-control" type="number" id="phone" name="phone_patient" value="<?php echo $_SESSION['phone_patient'] ?>">
                            </div>
                            <div class="d-flex gap-5">
                                <div class="form-group mb-3 col">
                                    <label class="form-label" for="Religion">Religion</label>
                                    <select class="form-control" id="Religion" name="religion_patient">
                                        <option value="Islam" <?php echo $_SESSION['religion_patient'] == "Islam" ? "selected" : '' ?>>
                                            Islam
                                        </option>
                                        <option value="Christian" <?php echo $_SESSION['religion_patient'] == "Christian" ? "selected" : '' ?>>Christian
                                        </option>
                                        <option value="Chatolic" <?php echo $_SESSION['religion_patient'] == "Chatolic" ? "selected" : '' ?>>Chatolic
                                        </option>
                                        <option value="Hindu" <?php echo $_SESSION['religion_patient'] == "Hindu" ? "selected" : '' ?>>
                                            Hindu</option>
                                        <option value="Budha" <?php echo $_SESSION['religion_patient'] == "Budha" ? "selected" : '' ?>>
                                            Budha</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3 col">
                                    <label class="form-label" for="MariaggePatient">Marital Status</label>
                                    <select class="form-control" id="MariaggePatient" name="marriage_patient">
                                        <option value="Married" <?php echo $_SESSION['marriage_patient'] == "Married" ? "selected" : '' ?>>Married
                                        </option>
                                        <option value="Not Married" <?php echo $_SESSION['marriage_patient'] == "Not Married" ? "selected" : '' ?>>Not Married
                                        </option>
                                        <option value="Widow" <?php echo $_SESSION['marriage_patient'] == "Widow" ? "selected" : '' ?>>
                                            Widow</option>
                                        <option value="Widower" <?php echo $_SESSION['marriage_patient'] == "Widower" ? "selected" : '' ?>>Widower</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" type="password" id="password" name="password_patient">
                            </div>
                            <button type="submit" name="update" class="btn btn-success me-2">Update</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="2" class="text-center fw-bold">My Detail</th>
                            </tr>
                            <tr>
                                <td class="w-50">Profile</td>
                                <td class="text-center"><img src="img/<?php echo $_SESSION['profile_patient'] ?>" class="rounded-circle" alt="profile patient" width="100" height="100">
                                </td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td><?php echo $_SESSION['nik_patient'] ?></td>
                            </tr>
                            <tr>
                                <td>Fullname</td>
                                <td><?php echo $_SESSION['name_patient'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $_SESSION['email_patient'] ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo $_SESSION['gender_patient'] ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?php echo $_SESSION['address_patient'] ?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><?php echo $_SESSION['phone_patient'] ?></td>
                            </tr>
                            <tr>
                                <td>Birth date, place</td>
                                <td><?php echo date("j F Y", strtotime($_SESSION['birth_date'])) ?>,
                                    <?php echo $_SESSION['birth_place'] ?></td>
                            </tr>
                            <tr>
                                <td>Blood</td>
                                <td><?php echo $_SESSION['blood_patient'] ?></td>
                            </tr>
                            <tr>
                                <td>Religion</td>
                                <td><?php echo $_SESSION['religion_patient'] ?></td>
                            </tr>
                            <tr>
                                <td>Marriage</td>
                                <td><?php echo $_SESSION['marriage_patient'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- Footer Start -->
    <?php require '../partialsPatient/footer.php' ?>
    <!-- Footer End -->
</body>

</html>