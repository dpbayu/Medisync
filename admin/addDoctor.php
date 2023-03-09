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
            <h1>Form Doctor</h1>
        </div>
        <div class="d-flex gap-1 mb-3">
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <form action="function.php" method="POST">
                        <div class="form-group mb-3">
                            <label class="form-label" for="name_doctor">Name Doctor</label>
                            <input class="form-control" type="text" id="name_doctor" name="name_doctor"
                                placeholder="Input name doctor" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="specialist_doctor">Specialist</label>
                            <input class="form-control" type="text" id="specialist_doctor" name="specialist_doctor"
                                placeholder="Input specialist doctor" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="phone_doctor">Phone</label>
                            <input class="form-control" type="number" id="phone_doctor" name="phone_doctor"
                                placeholder="Input phone doctor" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="address_doctor">Address</label>
                            <textarea class="form-control" id="address_doctor" name="address_doctor" rows="5"
                                placeholder="Input address doctor" required style="resize: none;"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success" type="submit" name="addDoctor">Add data</button>
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