    <!-- Footer Start -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Dwi Putra Bayu</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">Dwi Putra Bayu</a>
        </div>
    </footer>
    <!-- Footer End -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- JS Start -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <!-- Datables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/main.js"></script>
    <script>
        $(document).ready(function () {
            $('#doctor').DataTable({
                columnDefs: [
                    {                    
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 6],
                    }
                ],
                "order": [1, "asc"]
            });
            $('#poly').DataTable({
                columnDefs: [
                    {                    
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 3],
                    }
                ],
                "order": [1, "asc"]
            });
            $('#medicine').DataTable({
                columnDefs: [
                    {                    
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 3],
                    }
                ],
                "order": [1, "asc"]
            });
        });
    </script>
    <!-- JS End -->