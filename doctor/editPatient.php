<!-- PHP -->
<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
require ("function.php");
$page = "patient";
$id = $_GET["id"];
$user = query("SELECT * FROM user WHERE id = $id")[0];
if (isset($_POST["submit"])) {
    if (edit_patient($_POST) > 0) {
        echo "<script>document.location.href='patient.php?success=Data success updated!';</script>";
    } else {
        echo "<script>document.location.href='patient.php?failed=Data failed updated!';</script>";    
    }
}
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
            <form action="" method="POST" class="row g-3">
                <input type="hidden" name="id" value="<?= $user["id"]; ?>">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="KTP" name="ktp" placeholder="KTP"
                            value="<?= $user["ktp"] ?>">
                        <label for="KTP">KTP</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname"
                            value="<?= $user["fullname"] ?>">
                        <label for="fullname">Fullname</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                            value="<?= $user["username"] ?>">
                        <label for="username">Username</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="birthPlace" name="birth_place"
                            placeholder="Birth Place" value="<?= $user["birth_place"] ?>">
                        <label for="birthPlace">Birth Place</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="date" class="form-control pb-4" id="birthDate" name="birth_date" value="<?= $user['birth_date'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="gender" name="gender">
                            <option value="Man" <?= $user['gender'] == 'Man' ? ' selected="selected"' : '';?>>Man
                            </option>
                            <option value="Woman" <?= $user['gender'] == 'Woman' ? ' selected="selected"' : '';?>>Woman
                            </option>
                        </select>
                        <label for="gender">Gender</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="bloodType" name="blood_type">
                            <option value="A" <?= $user['blood_type'] == 'A' ? ' selected="selected"' : '';?>>A</option>
                            <option value="B" <?= $user['blood_type'] == 'B' ? ' selected="selected"' : '';?>>B</option>
                            <option value="AB" <?= $user['blood_type'] == 'AB' ? ' selected="selected"' : '';?>>AB
                            </option>
                            <option value="O" <?= $user['blood_type'] == 'O' ? ' selected="selected"' : '';?>>O</option>
                        </select>
                        <label for="bloodType">Blood Type</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" id="address" name="address" placeholder="Address"
                            style="height: 100px;"><?= $user["address"] ?></textarea>
                        <label for="address">Address</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="city" name="city" placeholder="City"
                                value="<?= $user["city"] ?>">
                            <label for="city">City</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="religion" name="religion">
                            <option value="Islam" <?= $user['religion'] == 'Islam' ? ' selected="selected"' : '';?>>
                                Islam</option>
                            <option value="Protestant"
                                <?= $user['religion'] == 'Protestant' ? ' selected="selected"' : '';?>>Protestant
                            </option>
                            <option value="Hindu" <?= $user['religion'] == 'Hindu' ? ' selected="selected"' : '';?>>
                                Hindu</option>
                            <option value="Buddha" <?= $user['religion'] == 'Buddha' ? ' selected="selected"' : '';?>>
                                Buddha</option>
                            <option value="Kong Hu Cu"
                                <?= $user['religion'] == 'Kong Hu Cu' ? ' selected="selected"' : '';?>>Kong Hu Cu
                            </option>
                        </select>
                        <label for="religion">Religion</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="maritalStatus" name="marital_status">
                            <option value="Single"
                                <?= $user['marital_status'] == 'Single' ? ' selected="selected"' : '';?>>Single</option>
                            <option value="Married"
                                <?= $user['marital_status'] == 'Married' ? ' selected="selected"' : '';?>>Married
                            </option>
                            <option value="Widower"
                                <?= $user['marital_status'] == 'Widower' ? ' selected="selected"' : '';?>>Widower
                            </option>
                            <option value="Widow"
                                <?= $user['marital_status'] == 'Widow' ? ' selected="selected"' : '';?>>Widow</option>
                        </select>
                        <label for="maritalStatus">Marital Status</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="work" name="work" placeholder="Work"
                            value="<?= $user["work"] ?>">
                        <label for="work">Work</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone"
                            value="<?= $user["phone"] ?>">
                        <label for="phone">Phone</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="typeRoom" name="type_room">
                            <option value="A" <?= $user['type_room'] == 'A' ? ' selected="selected"' : '';?>>A</option>
                            <option value="B" <?= $user['type_room'] == 'B' ? ' selected="selected"' : '';?>>B</option>
                            <option value="C" <?= $user['type_room'] == 'C' ? ' selected="selected"' : '';?>>C</option>
                            <option value="D" <?= $user['type_room'] == 'D' ? ' selected="selected"' : '';?>>D</option>
                        </select>
                        <label for="typeRoom">Type Room</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="roomNumber" name="room_number">
                            <option value="01" <?= $user['room_number'] == '01' ? ' selected="selected"' : '';?>>01
                            </option>
                            <option value="02" <?= $user['room_number'] == '02' ? ' selected="selected"' : '';?>>02
                            </option>
                            <option value="03" <?= $user['room_number'] == '03' ? ' selected="selected"' : '';?>>03
                            </option>
                            <option value="04" <?= $user['room_number'] == '04' ? ' selected="selected"' : '';?>>04
                            </option>
                            <option value="05" <?= $user['room_number'] == '05' ? ' selected="selected"' : '';?>>05
                            </option>
                            <option value="06" <?= $user['room_number'] == '06' ? ' selected="selected"' : '';?>>06
                            </option>
                            <option value="07" <?= $user['room_number'] == '07' ? ' selected="selected"' : '';?>>07
                            </option>
                            <option value="08" <?= $user['room_number'] == '08' ? ' selected="selected"' : '';?>>08
                            </option>
                            <option value="09" <?= $user['room_number'] == '09' ? ' selected="selected"' : '';?>>09
                            </option>
                            <option value="10" <?= $user['room_number'] == '10' ? ' selected="selected"' : '';?>>10
                            </option>
                        </select>
                        <label for="roomNumber">Room Number</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="diagnosis" name="diagnosis" placeholder="Diagnosis"
                            value="<?= $user["diagnosis"] ?>">
                        <label for="diagnosis">Diagnosis</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="complication" name="complication"
                            placeholder="Complication" value="<?= $user["complication"] ?>">
                        <label for="complication">Complication</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="infection" name="infection" placeholder="Infection"
                            value="<?= $user["infection"] ?>">
                        <label for="infection">Infection</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="causeOfInfection" name="cause_of_infection"
                            placeholder="Cause Of Infection" value="<?= $user["cause_of_infection"] ?>">
                        <label for="causeOfInfection">Cause Of Infection</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="exitCondition" name="exit_condition">
                            <option value="Healed"
                                <?= $user['exit_condition'] == 'Healed' ? ' selected="selected"' : '';?>>Healed</option>
                            <option value="Not Healed Yet"
                                <?= $user['exit_condition'] == 'Not Healed Yet' ? ' selected="selected"' : '';?>>Not
                                Healed Yet</option>
                            <option value="Getting Better"
                                <?= $user['exit_condition'] == 'Getting Better' ? ' selected="selected"' : '';?>>Getting
                                Better</option>
                            <option value="Pass Away"
                                <?= $user['exit_condition'] == 'Pass Away' ? ' selected="selected"' : '';?>>Pass Away
                            </option>
                        </select>
                        <label for="exitCondition">Exit Condition</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="wayOut" name="way_out">
                            <option value="Allowed Home"
                                <?= $user['way_out'] == 'Allowed Home' ? ' selected="selected"' : '';?>>Allowed Home
                            </option>
                            <option value="Force Home"
                                <?= $user['way_out'] == 'Force Home' ? ' selected="selected"' : '';?>>Force Home
                            </option>
                            <option value="Run Away"
                                <?= $user['way_out'] == 'Run Away' ? ' selected="selected"' : '';?>>Run Away</option>
                        </select>
                        <label for="wayOut">Way Out</label>
                    </div>
                </div>
                <div class="text-left">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
        </section>
    </main>
    <!-- Content End -->
    <!-- Footer Start -->
    <?php require "partials/footer.php" ?>
    <!-- Footer End -->
</body>

</html>