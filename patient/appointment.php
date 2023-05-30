<!-- PHP -->
<?php
require '../function.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'appointment';
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require '../partialsPatient/head.php' ?>
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
            <h1>Book Appointment</h1>
        </div>
        <section class="section dashboard">
            <div class="col-md-12">
                <div class="row">
                    <?php
                        if (isset($_GET['success'])) {
                            $msg = $_GET['success'];
                            echo '
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>'.$msg.'</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        }
                    ?>
                    <div class="col-md-6">
                        <form class="forms-sample" action="function.php" method="POST">
                            <div class="form-group mb-3">
                                <label class="form-label" for="date_appointment">Book Appointment</label>
                                <input class="form-control" type="date" id="date_appointment" name="date_appointment">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="list_doctor">Name Doctor</label>
                                <select class="form-control" name="id_user" id="list_doctor">
                                    <option value="">- Choose Doctor -</option>
                                    <?php
                                    $sql_doctor = mysqli_query($db, "SELECT * FROM tbl_doctor");
                                    while ($data_doctor = mysqli_fetch_array($sql_doctor)) { 
                                        echo '<option value="'.$data_doctor['id_user'].'">'.$data_doctor['name_doctor'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="description">Description</label>
                                <input class="form-control" type="text" id="description" name="description" placeholder="Enter Description">
                            </div>
                            <button type="submit" name="update" class="btn btn-success me-2">Update</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-hover" id="doctor">
                            <thead>
                                <tr>
                                    <th class="fw-semibold">No</th>
                                    <th class="fw-semibold">Name Doctor</th>
                                    <th class="fw-semibold">Specialist</th>
                                    <th class="text-center fw-semibold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $id = @$_GET['id_doctor'];
                                        $query_doctor = "SELECT * FROM tbl_doctor 
                                        INNER JOIN tbl_specialist ON tbl_doctor.id_specialist = tbl_specialist.id_specialist ORDER BY name_doctor ASC";
                                        $run_doctor = mysqli_query($db,$query_doctor);
                                        $i = 1;
                                        while ($doctor = mysqli_fetch_array($run_doctor)) {
                                    ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $doctor['name_doctor'] ?></td>
                                    <td><?= $doctor['name_specialist'] ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#modal<?= $doctor['id_user'] ?>">
                                            View
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal Start -->
                                <div class="modal fade" id="modal<?= $doctor['id_user'] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Doctor <span
                                                        class="fw-bold"><?= $doctor['name_doctor'] ?></span></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex">
                                                    <label style="width: 150px;">Name</label>
                                                    <p class="mx-3">:</p>
                                                    <p><?= $doctor['name_doctor'] ?></p>
                                                </div>
                                                <div class="d-flex">
                                                    <label style="width: 150px;">Specialist</label>
                                                    <p class="mx-3">:</p>
                                                    <p><?= $doctor['name_specialist'] ?></p>
                                                </div>
                                                <div class="d-flex">
                                                    <label style="width: 150px;">Phone</label>
                                                    <p class="mx-3">:</p>
                                                    <p><?= $doctor['phone_doctor'] ?></p>
                                                </div>
                                                <div class="d-flex">
                                                    <label style="width: 150px;">Email</label>
                                                    <p class="mx-3">:</p>
                                                    <p><?= $doctor['email_doctor'] ?></p>
                                                </div>
                                                <div class="d-flex">
                                                    <label style="width: 150px;">Address</label>
                                                    <p class="mx-3">:</p>
                                                    <p><?= $doctor['address_doctor'] ?></p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal End -->
                                <?php
                                $i++; 
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- JS Start -->
    <script>
        // Data Tables
        $(document).ready(function () {
            $('#doctor').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 3,
                }]
            });
        });
    </script>
    <!-- JS End -->
    <!-- Footer Start -->
    <?php require '../partialsPatient/footer.php' ?>
    <!-- Footer End -->
</body>

</html>