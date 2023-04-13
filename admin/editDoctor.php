<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'doctor';
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require '../partialsAdmin/head.php' ?>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require '../partialsAdmin/header.php' ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require '../partialsAdmin/sidebar.php' ?>
    <!-- Sidebar End-->
    <!-- Main Start -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Data Doctor</h1>
        </div>
        <div class="d-flex gap-1 mb-3">
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <form action="function.php" method="POST">
                        <?php
                            $id = @$_GET['id'];
                            $sql = mysqli_query($db, "SELECT * FROM tbl_doctor 
                            INNER JOIN tbl_specialist ON tbl_doctor.id_specialist = tbl_specialist.id_specialist WHERE id_user = '$id'");
                            $data = mysqli_fetch_array($sql);
                        ?>
                        <div class="d-flex gap-5">
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="name_admin">Name Doctor</label>
                                <input class="form-control" type="hidden" name="id" value="<?= $data['id_user'] ?>">
                                <input class="form-control" type="hidden" name="old_email"
                                    value="<?= $data['email_doctor'] ?>">
                                <input class="form-control" type="text" id="name_admin" name="name_doctor"
                                    value="<?= $data['name_doctor'] ?>" require autofocus>
                            </div>
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="email_doctor">Email</label>
                                <input class="form-control" type="email" id="email_doctor" name="email_doctor"
                                    value="<?= $data['email_doctor'] ?>" require>
                            </div>
                        </div>
                        <div class="d-flex gap-5">
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="specialist">Name Specialist</label>
                                <select class="form-control" name="id_specialist" id="specialist">
                                    <?php
                                    $sql_specialist = mysqli_query($db, "SELECT * FROM tbl_specialist");
                                    while ($specialist = mysqli_fetch_assoc($sql_specialist)) {
                                    if ($specialist['id_specialist'] == $data['id_specialist']) {
                                        echo '<option selected value="'.$specialist['id_specialist'].'">'.$specialist['name_specialist'].'</option>';
                                    } else {
                                        echo '<option value="'.$specialist['id_specialist'].'">'.$specialist['name_specialist'].'</option>';
                                    }
                                }
                                ?>
                                </select>
                            </div>
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="password_doctor">Password</label>
                                <input class="form-control" type="password" id="password_doctor" name="password_doctor">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="phone_doctor">Phone</label>
                            <input class="form-control" type="number" id="phone_doctor" name="phone_doctor"
                                value="<?= $data['phone_doctor'] ?>" require>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="address_doctor">Address</label>
                            <textarea class="form-control" id="address_doctor" name="address_doctor" rows="5"
                                style="resize: none;" require><?= $data['address_doctor'] ?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success" type="submit" name="editDoctor">Edit data</button>
                            <a href="dataDoctor.php" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- Footer Start -->
    <?php require '../partialsAdmin/footer.php' ?>
    <!-- Footer End -->
</body>

</html>