<!-- PHP -->
<?php
require '../function.php';
require '../assets/libs/vendor/autoload.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
$page = 'patient';
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require '../partials/head.php' ?>
<!-- Head End -->

<body>
    <!-- Header Start -->
    <?php require '../partials/header.php' ?>
    <!-- Header End -->
    <!-- Sidebar Start -->
    <?php require '../partials/sidebar.php' ?>
    <!-- Sidebar End-->
    <!-- Main Start -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Patient</h1>
        </div>
        <div class="d-flex justify-content-end gap-1 mb-3">
            <a href="#" class="btn btn-outline-dark"><i class="ri-refresh-fill"></i></a>
            <a href="add.php" class="btn btn-primary">Add data</a>
            <a href="import.php" class="btn btn-info">Import</a>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="table">
                        <table class="table table-bordered table-hover" id="patient">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Fullname</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main End -->
    <!-- JS Start -->
    <script>
        $(document).ready(function () {
            $('#patient').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "data_patient.php",
                dom : 'Bfrtip',
                button : [{
                    extend : 'pdf',
                    oriented : 'potrait',
                    pageSize : 'Legal',
                    title : 'Data Patient',
                    download : 'open'
                },
                'csv', 'excel', 'print', 'copy'
            ],
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 5,
                    "render": function (data, type, row) {
                        var btn = "<center><a href=\"edit.php?id=" + data +
                            "\" class=\"btn btn-warning btn-xs\">Edit</a> <a href=\"delete.php?id=" +
                            data +
                            "\" onclick=\"return confirm('Are you sure')\" class=\"btn btn-danger btn-xs\">Delete</a></center>";
                        return btn;
                    }
                }]
            });
        });
    </script>
    <!-- JS End -->
    <!-- Footer Start -->
    <?php require '../partials/footer.php' ?>
    <!-- Footer End -->
</body>

</html>