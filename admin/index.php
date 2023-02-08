<!-- PHP -->
<?php
$page = "dashboard";
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require "partials/head.php" ?>
<!-- Head End -->

<body>
  <!-- Header Start -->
  <?php require "partials/header.php" ?>
  <!-- Header End -->
  <!-- Sidebar Start -->
  <?php require "partials/sidebar.php" ?>
  <!-- Sidebar End -->
  <!-- Content Start -->
  <main id="main" class="main">
    <!-- Title Start -->
    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div>
    <!-- Title End -->
    <section class="section dashboard">
      <div class="row">
        <!-- Left Side Start -->
        <div class="col-lg-8">
          <div class="row">
            <h1>Hello World!</h1>
          </div>
        </div>
        <!-- Left Side End -->
        <!-- Right Side Start -->
        <div class="col-lg-4">
          <h1>Hello World!</h1>
        </div>
        <!-- Right Side End -->
      </div>
    </section>
  </main>
  <!-- Content End -->
  <!-- Footer Start -->
  <?php require "partials/footer.php" ?>
  <!-- Footer End -->
</body>

</html>