<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: http://localhost/CMS/login.php");
}

if (isset($_SESSION["id"])) {
  $id = $_SESSION["id"]; // Retrieve the $id from session
}

require_once "C:\\xampp\\htdocs\\CMS\\config.php";

$sql = "SELECT f_id, fac_name, email_id, fac_room_no, dname
        FROM faculty,department
        WHERE faculty.did=department.did and f_id = ?";
$stmt = mysqli_prepare($conn, $sql); //  used to prepare the SQL statement for execution
mysqli_stmt_bind_param($stmt, "s", $param_id);
$param_id = $id; // id : f_id

// Try to execute this statement
if (mysqli_stmt_execute($stmt)) {
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt, $fid, $fname, $emailid, $fac_room_no, $dname);
  mysqli_stmt_fetch($stmt);
}
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
                <i class="mdi mdi-home"></i>
              </span> Dashboard
            </h3>
          </div>
          <div class="row">
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h2 class="font-weight-normal mb-3">Courses Teaching <i class="mdi mdi-book-minus mdi-30px float-right"></i>
                  </h2>
                  <h2 class="mb-5">
                    <?php
                    $sql2 = "SELECT c_id
                             FROM teaches
                             WHERE f_id=?";
                    $stmt2 = mysqli_prepare($conn, $sql2);
                    mysqli_stmt_bind_param($stmt2, "s", $param_id);
                    $param_id = $_SESSION["id"];

                    if (mysqli_stmt_execute($stmt2)) {
                      $result2 = mysqli_stmt_get_result($stmt2);
                      if (mysqli_num_rows($result2) > 0) {
                        while ($row = mysqli_fetch_assoc($result2)) {
                          echo "<div>" . " - " . $row["c_id"] . "</div>";
                        }
                      }
                    }
                    mysqli_stmt_close($stmt2);
                    ?>
                  </h2>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h2 class="font-weight-normal mb-3">Students below 75% attendance <i class="mdi mdi-trending-down mdi-30px float-right"></i>
                  </h2>
                  <h2 class="mb-5">
                    <?php

                    $sql2 = "SELECT c_id FROM teaches WHERE f_id=?";
                    $stmt2 = mysqli_prepare($conn, $sql2);
                    mysqli_stmt_bind_param($stmt2, "s", $param_id);
                    $param_id = $_SESSION["id"];

                    if (mysqli_stmt_execute($stmt2)) {
                      $result2 = mysqli_stmt_get_result($stmt2);
                      if (mysqli_num_rows($result2) > 0) {
                        while ($row = mysqli_fetch_assoc($result2)) {

                          $sql4 = "SELECT CLASS_COUNT as CLASS_COUNT FROM total_classes WHERE C_ID = ?";
                          $stmt4 = mysqli_prepare($conn, $sql4);
                          mysqli_stmt_bind_param($stmt4, "s", $row["c_id"]);
                          mysqli_stmt_execute($stmt4);
                          $result4 = mysqli_stmt_get_result($stmt4);
                          $class_row = mysqli_fetch_assoc($result4);
                          $total_class_count = $class_row['CLASS_COUNT'];

                          $sql3 = "SELECT roll_no FROM takes WHERE c_id=?";
                          $stmt3 = mysqli_prepare($conn, $sql3);
                          mysqli_stmt_bind_param($stmt3, "s", $param_c_id);
                          $param_c_id = $row["c_id"];
                          if (mysqli_stmt_execute($stmt3)) {
                            $result3 = mysqli_stmt_get_result($stmt3);
                            $count = 0;
                            if (mysqli_num_rows($result3) > 0) {
                              while ($row2 = mysqli_fetch_assoc($result3)) {

                                $sql6 = "SELECT COUNT(*) AS total_attended FROM attendance WHERE roll_no = ? AND c_id = ?";
                                $stmt6 = mysqli_prepare($conn, $sql6);
                                mysqli_stmt_bind_param($stmt6, "ss", $row2["roll_no"], $row["c_id"]);
                                mysqli_stmt_execute($stmt6);
                                $result6 = mysqli_stmt_get_result($stmt6);
                                $attendance_row = mysqli_fetch_assoc($result6);
                                $total_attended = $attendance_row['total_attended'];

                                $percent = ($total_class_count == 0) ? 100 : ($total_attended / $total_class_count) * 100;

                                if ($percent < 75) {
                                  $count++;
                                }
                              }
                            }
                          }
                          echo "<div>" . " - " . $row["c_id"] . " : " . $count ." students" ."</div>";
                        }
                      }
                    }
                    mysqli_stmt_close($stmt2);
                    mysqli_stmt_close($stmt3);
                    mysqli_stmt_close($stmt4);
                    mysqli_stmt_close($stmt6);
                    mysqli_close($conn);
                    ?>
                  </h2>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h3 class="card-description"> Personal Information</h3>
                <form class="form-sample">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" fdprocessedid="n65sag" value="<?php echo $_SESSION['name']; ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Faculty ID</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $fid ?>" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Department</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $dname ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email ID</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $emailid ?>" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Room Number</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" fdprocessedid="rgrhrc" value="<?php echo $fac_room_no ?>" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
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