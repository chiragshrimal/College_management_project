<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: http://localhost/CMS/login.php");
}

require_once "C:\\xampp\\htdocs\\CMS\\config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $status = "Unresolved";
  $complainDate = date("Y-m-d");
  $rollno = $_SESSION["id"];
  $description = trim($_POST["complainDescription"]);
  $category = trim($_POST["category"]);
  if ($category = "Electrical appliances issue")
    $complainID = "H001";
  if ($category = "Clineaness")
    $complainID = "H002";
  if ($category = "Wi-Fi")
    $complainID = "H003";
  if ($category = "Furniture")
    $complainID = "H004";
  if ($category = "Medicine issue")
    $complainID = "H005";
  if ($category = "Other")
    $complainID = "H006";

  $sql = "insert into makes_hostel values(?,?,?,?,?)";
  $stmt = mysqli_prepare($conn, $sql);
  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssss", $param_complainID, $param_description,  $param_rollno, $param_complain_date, $param_status);
    $param_complainID = $complainID;
    $param_description = $description;
    $param_rollno = $rollno;
    $param_complain_date = $complainDate;
    $param_status = $status;

    if (mysqli_stmt_execute($stmt)) {
      header("location:http://localhost/Dashboard/hostel_complain.php");
    } else {
      echo "Submission failed !";
    }
  }
  mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Hostel Complain - <?php echo $_SESSION['name'] ?></title>
  <link rel="stylesheet" href="http://localhost/Dashboard/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="http://localhost/Dashboard/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="http://localhost/Dashboard/assets/css/style.css">
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
            <a class="nav-link" href="http://localhost/Dashboard/dashboard_student.php">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/Dashboard/library.php">
              <span class="menu-title">Library</span>
              <i class="mdi mdi-library menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages3" aria-expanded="false" aria-controls="general-pages3">
              <span class="menu-title">Academics</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages3">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/attendance.php"> Attendance </a></li>
                <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/calender.php"> Academic Calender </a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/curriculum.php"> Curriculum </a></li> -->
                <!-- <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/timetable.php"> Time Table </a></li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages1" aria-expanded="false" aria-controls="general-pages1">
              <span class="menu-title">Hostel</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-hospital-building menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/hostel_complain.php"> Hostel Complain </a></li>
                <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/hostel_complain_history.php"> Complain History </a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/contact_details.php"> Contact Details </a></li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages2" aria-expanded="false" aria-controls="general-pages2">
              <span class="menu-title">Mess</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-silverware-variant menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/mess_complain.php"> Mess Complain </a></li>
                <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/mess_menu.php"> Mess Menu </a></li>
                <li class="nav-item"> <a class="nav-link" href="http://localhost/Dashboard/mess_complain_history.php"> Complain History </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/Dashboard/gate_entry.php">
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
                <i class="mdi mdi-border-color"></i>
              </span> Hostel Complain
            </h3>
          </div>
          <div class="col-md-8 mx-auto grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Write Complain</h4>
                <form class="forms-sample" action="" method="post">
                  <div class="form-group row">
                    <label for="ComplainDescription" class="col-sm-3 col-form-label">Complain Description</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="ComplainDescription" name="complainDescription" placeholder="10-30 words" requiered>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Category" class="col-sm-3 col-form-label">Category</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="category" name="category" required>
                        <option value="" disabled selected>Select category</option>
                        <option value="Electrical appliances issue">Electrical appliances issue</option>
                        <option value="Clineaness">Clineaness</option>
                        <option value="Wi-Fi">Wi-Fi</option>
                        <option value="Furniture">Furniture</option>
                        <option value="Medicine issue">Medicine issue</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary me-2" name="submit" onclick="showPopup()">Submit</button>
                </form>
                <script>
                  function showPopup() {
                    alert("Complain Registered");
                  }
                </script>
              </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
</body>

</html>