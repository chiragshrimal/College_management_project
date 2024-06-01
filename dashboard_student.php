<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: http://localhost/CMS/login.php");
}

if (isset($_SESSION["id"])) {
  $id = $_SESSION["id"];
}

require_once "C:\\xampp\\htdocs\\CMS\\config.php";

$sql = "SELECT roll_no, room_no, sname, dob, branch, email_id, semester, s_pnumber, fname, f_pnumber, street_address, pin_code, city, state 
        FROM student 
        WHERE roll_no = ?";
$stmt = mysqli_prepare($conn, $sql); //  used to prepare the SQL statement for execution
mysqli_stmt_bind_param($stmt, "s", $param_id1);
$param_id1 = $id; // id : roll no

// Try to execute this statement
if (mysqli_stmt_execute($stmt)) {
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt, $roll_no, $room_no, $sname, $dob, $branch, $email_id, $semester, $s_pnumber, $fname, $f_pnumber, $street_address, $pin_code, $city, $state);
  mysqli_stmt_fetch($stmt);
}

$sql2 = "SELECT course.cname AS cname, course.c_id AS c_id
         FROM course,takes
         WHERE takes.c_id=course.c_id AND roll_no=?;";

$stmt2 = mysqli_prepare($conn, $sql2);
mysqli_stmt_bind_param($stmt2, "s", $param_id2);
$param_id2 = $id;

if (mysqli_stmt_execute($stmt2)) {
  mysqli_stmt_store_result($stmt2);
  mysqli_stmt_bind_result($stmt2, $cname, $cid);
  mysqli_stmt_fetch($stmt2);
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
                <i class="mdi mdi-home"></i>
              </span> Dashboard
            </h3>
          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h2 class="font-weight-normal mb-3">Complains Detail <i class="mdi mdi-book-open mdi-30px float-right"></i>
                  </h2>
                  <h3 class="mb-5">
                    <?php

                    $totalMessComplain = 0;
                    $totalMessComplainResolved = 0;
                    $totalMessComplainUnresolved = 0;

                    $totalHostelComplain = 0;
                    $totalHostelComplainResolved = 0;
                    $totalHostelComplainUnresolved = 0;

                    $sqla = "SELECT count(*)
                             FROM makes_mess
                             WHERE status='Resolved' AND roll_no = ?;";

                    $sqlb = "SELECT count(*)
                             FROM makes_mess
                             WHERE status='Unresolved' AND roll_no = ?;";

                    $sqlc = "SELECT count(*)
                             FROM makes_hostel
                             WHERE status='Resolved' AND roll_no = ?;";

                    $sqld = "SELECT count(*)
                             FROM makes_hostel
                             WHERE status='Unresolved' AND roll_no = ?;";

                    $stmt3 = mysqli_prepare($conn, $sqla);
                    mysqli_stmt_bind_param($stmt3, "s", $_SESSION["id"]);
                    mysqli_stmt_execute($stmt3);
                    if (mysqli_stmt_execute($stmt3)) {
                      $result = mysqli_stmt_get_result($stmt3);
                      if (mysqli_num_rows($result) > 0) {
                        $class_row = mysqli_fetch_assoc($result);
                        $totalMessComplainResolved = $class_row['count(*)'];
                      }
                    }

                    $stmt3 = mysqli_prepare($conn, $sqlb);
                    mysqli_stmt_bind_param($stmt3, "s", $_SESSION["id"]);
                    mysqli_stmt_execute($stmt3);
                    if (mysqli_stmt_execute($stmt3)) {
                      $result = mysqli_stmt_get_result($stmt3);
                      if (mysqli_num_rows($result) > 0) {
                        $class_row = mysqli_fetch_assoc($result);
                        $totalMessComplainUnresolved = $class_row['count(*)'];
                      }
                    }

                    $stmt3 = mysqli_prepare($conn, $sqlc);
                    mysqli_stmt_bind_param($stmt3, "s", $_SESSION["id"]);
                    mysqli_stmt_execute($stmt3);
                    if (mysqli_stmt_execute($stmt3)) {
                      $result = mysqli_stmt_get_result($stmt3);
                      if (mysqli_num_rows($result) > 0) {
                        $class_row = mysqli_fetch_assoc($result);
                        $totalHostelComplainResolved = $class_row['count(*)'];
                      }
                    }

                    $stmt3 = mysqli_prepare($conn, $sqld);
                    mysqli_stmt_bind_param($stmt3, "s", $_SESSION["id"]);
                    mysqli_stmt_execute($stmt3);
                    if (mysqli_stmt_execute($stmt3)) {
                      $result = mysqli_stmt_get_result($stmt3);
                      if (mysqli_num_rows($result) > 0) {
                        $class_row = mysqli_fetch_assoc($result);
                        $totalHostelComplainUnresolved = $class_row['count(*)'];
                      }
                    }

                    $totalComplain = $totalHostelComplainResolved + $totalMessComplainResolved + $totalMessComplainUnresolved + $totalHostelComplainUnresolved;
                    $totalResolved = $totalMessComplainResolved + $totalHostelComplainResolved;
                    $totalUnresolved = $totalMessComplainUnresolved + $totalHostelComplainUnresolved;

                    mysqli_stmt_close($stmt3);

                    echo "<div>" . "- Total Complains : $totalComplain" . "</div>";
                    echo "<div>" . "- Total Resolved : $totalResolved" . "</div>";
                    echo "<div>" . "- Total Unresolved : $totalUnresolved" . "</div>";
                    ?>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h2 class="font-weight-normal mb-3">Attendance <i class="mdi mdi-percent mdi-30px float-right"></i>
                  </h2>
                  <h3 class="mb-5">
                    <?php
                    if (mysqli_stmt_execute($stmt2)) {
                      $result = mysqli_stmt_get_result($stmt2);
                      if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                          $course = $row["c_id"];
                          $sql2 = "SELECT CLASS_COUNT as CLASS_COUNT
                                   FROM total_classes
                                   WHERE C_ID = ?;";

                          $stmt2 = mysqli_prepare($conn, $sql2);
                          mysqli_stmt_bind_param($stmt2, "s", $course);
                          mysqli_stmt_execute($stmt2);
                          $result2 = mysqli_stmt_get_result($stmt2);
                          $class_row = mysqli_fetch_assoc($result2);
                          $total_class_count = $class_row['CLASS_COUNT'];

                          $sql3 = "SELECT COUNT(*) AS total_attended
                                   FROM attendance
                                   WHERE roll_no = ? AND c_id = ?";

                          $stmt3 = mysqli_prepare($conn, $sql3);
                          mysqli_stmt_bind_param($stmt3, "ss", $_SESSION["id"], $course);
                          mysqli_stmt_execute($stmt3);
                          $result3 = mysqli_stmt_get_result($stmt3);
                          $attendance_row = mysqli_fetch_assoc($result3);
                          $total_attended = $attendance_row['total_attended'];

                          if ($total_class_count == 0) {
                            $percent = 100;
                          } else
                            $percent = ($total_attended / $total_class_count) * 100;

                          echo "<div>" . "- " . $row["c_id"] . " : " . $percent . "</div>";

                          mysqli_stmt_close($stmt2);
                          mysqli_stmt_close($stmt3);
                        }
                      } else {
                        echo "No course enrolled";
                      }
                    }
                    ?>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <?php

                  $totalFine = 0;
                  $totalFinePaid = 0;
                  $totalBookIssued = 0;

                  $sql3 = "SELECT issue_date, return_date, status, fine
                           FROM issue
                           WHERE ROLL_NO = ?;";

                  $stmt3 = mysqli_prepare($conn, $sql3);
                  mysqli_stmt_bind_param($stmt3, "s", $param_id3);
                  $param_id3 = $id;
                  if (mysqli_stmt_execute($stmt3)) {
                    $result = mysqli_stmt_get_result($stmt3);
                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        // Fine calculation
                        $date1 = date("Y-m-d"); // Current date in YYYY-MM-DD format (string)
                        $date2 = $row["return_date"];

                        // Create DateTime objects from the date strings
                        $dateTime1 = DateTime::createFromFormat('Y-m-d', $date1); // current date
                        $dateTime2 = DateTime::createFromFormat('Y-m-d', $date2); // return date

                        $interval = $dateTime1->diff($dateTime2, false);

                        // Check if the current date is after the return date
                        if ($dateTime1 > $dateTime2 && $row["status"] == "Not Returned") {
                          // Calculate the fine based on the difference in days
                          $fine = $interval->days * 5; // current fine for not returned books
                          $totalFine = $totalFine + $fine; // total paid and unpaid fine
                        }
                        if ($row["status"] == "Returned") {
                          $totalFinePaid = $totalFinePaid + $row["fine"]; // total fine paid for retuned books
                        } else {
                          // Return date is on or before the current date, no fine
                          $fine = 0;
                        }
                        $totalBookIssued = $totalBookIssued + 1;
                      }
                    }
                  }
                  mysqli_stmt_close($stmt3);
                  ?>
                  <h2 class="font-weight-normal mb-3">Library Details <i class="mdi mdi-library mdi-30px float-right"></i>
                  </h2>
                  <h3 class="mb-5">
                    <?php
                    echo "<div>" . "- Total book issed : $totalBookIssued" . "</div>";
                    echo "<div>" . "- Total fine : $totalFine" . "</div>";
                    echo "<div>" . "- Total fine paid : $totalFinePaid" . "</div>";
                    ?>
                  </h3>
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