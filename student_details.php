<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: http://localhost/CMS/login.php");
}

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"]; // Retrieve the $id from session
}

require_once "C:\\xampp\\htdocs\\CMS\\config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard - <?php echo $_SESSION['name'] ?></title>
    <link rel="stylesheet" href="http://localhost/Dashboard/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="http://localhost/Dashboard/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="http://localhost/Dashboard/assets/css/style.css">
    <link rel="stylesheet" href="http://localhost/Dashboard/assets/css/myStyle.css">
    <link rel="shortcut icon" href="http://localhost/Dashboard/assets/images/favicon1.png" />
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="http://localhost/Dashboard/dashboard_student.php"><img src="images/cms.png" alt="logo" style="height: 50px; width:230px;"></a>
                <a class="navbar-brand brand-logo-mini" href="http://localhost/Dashboard/dashboard_student.php"><img src="images/cms-mini.png" alt="logo" style="width:55px; height:50px"></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="assets/images/faces/account.png" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black"><?php echo $_SESSION['name'] ?></p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="http://localhost/CMS/logout.php">
                                <i class="mdi mdi-logout me-2 text-success"></i> Logout </a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-arrow-up-bold-circle"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="http://localhost/Dashboard/dashboard_faculty.php" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="assets/images/faces/account.png" alt="profile">
                                <span class="login-status online"></span>
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2"><?php echo $_SESSION['name'] ?></span>
                                <span class="text-secondary text-small"><?php echo $_SESSION['user'] ?></span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Dashboard/dashboard_faculty.php">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Dashboard/student_details.php">
                            <span class="menu-title">Student Details</span>
                            <i class="mdi mdi-account menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Dashboard/take_attendance.php">
                            <span class="menu-title">Attendance</span>
                            <i class="mdi mdi-pen menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-account"></i>
                            </span> Get Student Details
                        </h3>
                    </div>
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form class="forms-sample" action="" method="get">
                                    <div class="form-group row">
                                        <label for="ComplainDescription" class="col-sm-5 col-form-label">Roll Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="rollno" placeholder="Enter roll number" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-gradient-primary me-2" name="submit">OK</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                if (isset($_GET['rollno'])) {
                                    $roll_no = $_GET["rollno"];

                                    $sql = "SELECT roll_no 
                                          FROM study_from
                                          WHERE f_id=? AND roll_no=?;";
                                    $stmt = mysqli_prepare($conn, $sql); //  used to prepare the SQL statement for execution
                                    mysqli_stmt_bind_param($stmt, "ss", $param_f_id, $param_roll_no);

                                    $param_f_id = $id; // id : f_id
                                    $param_roll_no = $roll_no;
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);
                                    if (mysqli_num_rows($result) > 0) {
                                        $sql = "SELECT roll_no, room_no, sname, dob, branch, email_id, semester, s_pnumber, fname, f_pnumber, street_address, pin_code, city, state 
                                                FROM student 
                                                WHERE roll_no = ?";

                                        $stmt2 = mysqli_prepare($conn, $sql); //  used to prepare the SQL statement for execution
                                        mysqli_stmt_bind_param($stmt2, "s", $param_id);
                                        $param_id = $roll_no; // id : roll no

                                        mysqli_stmt_execute($stmt2);
                                        mysqli_stmt_store_result($stmt2);
                                        mysqli_stmt_bind_result($stmt2, $roll_no, $room_no, $sname, $dob, $branch, $email_id, $semester, $s_pnumber, $fname, $f_pnumber, $street_address, $pin_code, $city, $state);
                                        mysqli_stmt_fetch($stmt2);
                                        mysqli_stmt_close($stmt2);
                                ?>
                                        <h3 class="card-description"> Student Information</h3>
                                        <form class="form-sample">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" fdprocessedid="n65sag" value="<?php echo $sname; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Father's Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $fname ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Roll Number</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $roll_no ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Date of Birth</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $dob ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Branch</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $branch ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Semester</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $semester ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Email ID</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $email_id ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Room Number</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $room_no ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Phone Number</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $s_pnumber ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Father's Phone Number</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $f_pnumber ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>
                                            <h4 class="card-description"> Address </h4>
                                            </p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $street_address ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Pin Code</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $pin_code ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">City</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $city ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">State</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $state ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                <?php
                                    } else {
                                        echo "Enter valid roll number.";
                                    }
                                    mysqli_stmt_close($stmt);
                                    mysqli_close($conn);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-center">
                        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © College Management System 2024</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
</body>

</html>