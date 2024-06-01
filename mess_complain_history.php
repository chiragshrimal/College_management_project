<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: http://localhost/CMS/login.php");
}
require_once "C:\\xampp\\htdocs\\CMS\\config.php";

if (isset($_SESSION["id"])) {
  $id = $_SESSION["id"]; // Retrieve the $id from session
}

$sql = "SELECT description, complain_date, status
      FROM makes_mess
      WHERE ROLL_NO = ?;";

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET["filter"])) {
  $filter = $_GET["filter"];

  if ($filter == "last7days") {
    $sql = "SELECT description, complain_date, status
        FROM makes_mess
        WHERE complain_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) and roll_no=?;";
  } else if ($filter == "newestFirst") {
    $sql = "SELECT description, complain_date, status
        FROM makes_mess
        WHERE roll_no=?
        ORDER BY complain_date DESC;";
  } else if ($filter == "resolved") {
    $sql = "SELECT description, complain_date, status
        FROM makes_mess
        WHERE status='resolved' and roll_no=?;";
  } else if ($filter == "unresolved") {
    $sql = "SELECT description, complain_date, status
        FROM makes_mess
        WHERE status='unresolved' and roll_no=?;";
  } else if ($filter == "all") {
    $sql = "SELECT description, complain_date, status
        FROM makes_mess
        WHERE ROLL_NO = ?;";
  }
}

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $param_id);
$param_id = $id;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mess Complain History - <?php echo $_SESSION['name'] ?></title>
  <link rel="stylesheet" href="http://localhost/Dashboard/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="http://localhost/Dashboard/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="http://localhost/Dashboard/assets/css/myStyle.css">
  <link rel="stylesheet" href="http://localhost/Dashboard/assets/css/style.css">
  <link rel="shortcut icon" href="http://localhost/Dashboard/assets/images/favicon1.png" />
  </style>
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
                <i class="mdi mdi-history"></i>
              </span> Complain History
            </h3>
          </div>
          <?php
          if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $total_complains = 0;
            $total_resolved_complains = 0;
            $total_unresolved_complains = 0;
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                if ($row["status"] == "Resolved")
                  $total_resolved_complains = $total_resolved_complains + 1;
                if ($row["status"] == "Unresolved")
                  $total_unresolved_complains = $total_unresolved_complains + 1;
                $total_complains = $total_complains + 1;
              }
            }
          }
          ?>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white" style="height: 200px;">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h2 class="font-weight-normal mb-3">Total Complains <i class="mdi mdi-pencil-box mdi-30px float-right"></i>
                  </h2>
                  <h2 class="mb-5"><?php echo $total_complains ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white" style="height: 200px;">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h2 class="font-weight-normal mb-3">Resolved <i class="mdi mdi-check-circle mdi-30px float-right"></i>
                  </h2>
                  <h2 class="mb-5"><?php echo $total_resolved_complains ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white" style="height: 200px;">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h2 class="font-weight-normal mb-3">Unresolved <i class="mdi mdi-close-circle mdi-30px float-right"></i>
                  </h2>
                  <h2 class="mb-5"><?php echo $total_unresolved_complains ?></h2>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <table class="table">
                    <div class="col-12 grid-margin">
                      <div class="template-demo">
                        <form action="" method="get">
                          <!-- default button-->
                          <!-- <button type="button" class="btn btn-gradient-primary btn-rounded btn-fw">Primary</button>
                          <button type="button" class="btn btn-gradient-success btn-rounded btn-fw">Success</button>
                          <button type="button" class="btn btn-gradient-danger btn-rounded btn-fw">Danger</button>
                          <button type="button" class="btn btn-gradient-warning btn-rounded btn-fw">Warning</button>
                          <button type="button" class="btn btn-gradient-info btn-rounded btn-fw">Info</button> -->
                          <button type="submit" class="button" name="filter" value="all">All</button>
                          <button type="submit" class="button" name="filter" value="last7days">Last 7 Days</button>
                          <button type="submit" class="button" name="filter" value="newestFirst">Newest First</button>
                          <button type="submit" class="button" name="filter" value="unresolved">Unresolved</button>
                          <button type="submit" class="button" name="filter" value="resolved">Resolved</button>
                        </form>
                      </div>
                    </div>
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th>Description</th>
                        <th>Complain Date</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (mysqli_stmt_execute($stmt)) {
                        $result = mysqli_stmt_get_result($stmt);
                        if (mysqli_num_rows($result) > 0) {
                          $sno = 1;
                          $flag = 0;
                          while ($row = mysqli_fetch_assoc($result)) {

                            echo "<tr>";
                            echo "<td>" . $sno . "</td>";
                            echo "<td>" . $row["description"] . "</td>";
                            echo "<td>" . $row["complain_date"] . "</td>";
                            echo "<td>" . $row["status"] . "</td>";
                            echo "</tr>";
                            $sno = $sno + 1;
                          }
                        } else {
                          $flag = 1;
                        }
                      }
                      // Close statement and connection
                      mysqli_stmt_close($stmt);
                      mysqli_close($conn);
                      ?>
                    </tbody>
                  </table>
                  <center style="margin-top:10px;">
                    <div>
                      <?php
                      if ($flag == 1)
                        echo "No complain registered";
                      ?>
                    </div>
                  </center>
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