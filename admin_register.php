<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: http://localhost/CMS/login.php");
    exit; // Exit to prevent further execution
}
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"]; // Retrieve the $id from session
}

require_once "C:\\xampp\\htdocs\\CMS\\config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aname = $_POST["name"];
    $aid = $_POST["id"];
    $pass = $_POST["pass"];

    $sql11 = "SELECT IF(EXISTS(SELECT 1 FROM admin WHERE admin_id = '$aid'), 'true', 'false') AS result;";
    $stmt11 = mysqli_prepare($conn, $sql11);
    mysqli_stmt_execute($stmt11);
    $result11 = mysqli_stmt_get_result($stmt11);
    $row11 = mysqli_fetch_assoc($result11);

    if ($row11["result"] == "true") {
        echo "<script>
                alert('Admin ID is already taken, registration failed!!');
             </script>";
    } else {
        $sql = "INSERT INTO admin (admin_id, admin_pass, admin_name)
                VALUES ('$aid','$pass','$aname');";

        mysqli_query($conn, $sql);

        echo "<script>
                alert('Registration Completed');
             </script>";
    }
}
mysqli_close($conn)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Register - <?php echo $_SESSION['name'] ?></title>
    <link rel="stylesheet" href="http://localhost/Dashboard/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="http://localhost/Dashboard/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="http://localhost/Dashboard/assets/css/style.css">
    <link rel="stylesheet" href="http://localhost/Dashboard/assets/css/myStyle.css">
    <link rel="shortcut icon" href="http://localhost/Dashboard/assets/images/favicon1.png" />
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
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
                        <a href="#" class="nav-link">
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
                        <a class="nav-link" data-bs-toggle="collapse" href="#general-pages2" aria-expanded="false" aria-controls="general-pages2">
                            <span class="menu-title">Register</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-account-plus menu-icon"></i>
                        </a>
                        <div class="collapse" id="general-pages2">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/admin_student_register.php"> Student </a></li>
                                <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/admin_faculty_register.php"> Faculty </a></li>
                                <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/admin_register.php"> Admin </a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Dashboard/admin_library.php">
                            <span class="menu-title">Library</span>
                            <i class="mdi mdi-library menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Dashboard/admin_hostel_complain.php">
                            <span class="menu-title">Hostel Complain</span>
                            <i class="mdi mdi-hospital-building menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Dashboard/admin_mess_complain.php">
                            <span class="menu-title">Mess Complain</span>
                            <i class="mdi mdi-silverware-variant menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Dashboard/admin_gate_entry.php">
                            <span class="menu-title">Gate Entry</span>
                            <i class="mdi mdi-gate menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-account-plus"></i>
                            </span> Register
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-description"> Admin Information</h3>
                                    <form class="admin_register.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="id" class="col-sm-3 col-form-label">Admin ID</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="id" name="id" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="pass" class="col-sm-3 col-form-label">Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="pass" name="pass" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </form>
                                </div>
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