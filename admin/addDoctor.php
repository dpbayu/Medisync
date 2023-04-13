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
                        <div class="d-flex gap-5">
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="name_doctor">Name Doctor</label>
                                <input class="form-control" type="text" id="name_doctor" name="name_doctor"
                                    placeholder="Input name doctor" required autofocus>
                            </div>
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="email_doctor">Email Doctor</label>
                                <input class="form-control" type="email" id="email_doctor" name="email_doctor"
                                    placeholder="Input email doctor" required>
                            </div>
                        </div>
                        <div class="d-flex gap-5">
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="specialist">Specialist</label>
                                <select class="form-control" name="id_specialist" id="specialist">
                                    <option value="">- Choose Specialist -</option>
                                    <?php
                                    $sql_specialist = mysqli_query($db, "SELECT * FROM tbl_specialist ORDER BY name_specialist ASC");
                                    while ($data_specialist = mysqli_fetch_array($sql_specialist)) { 
                                        echo '<option value="'.$data_specialist['id_specialist'].'">'.$data_specialist['name_specialist'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-3 col">
                                <label class="form-label" for="password_doctor">Password</label>
                                <input class="form-control" type="password" id="password_doctor" name="password_doctor"
                                    placeholder="Input password" required>
                            </div>
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