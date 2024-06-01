<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: http://localhost/CMS/login.php");
}

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"]; // Retrieve the $id from session
}

require_once "C:\\xampp\\htdocs\\CMS\\config.php";

$sql = "SELECT teaches.c_id, cname
      FROM teaches, course
      WHERE teaches.c_id=course.c_id AND f_id=?;";

$stmt = mysqli_prepare($conn, $sql); //  used to prepare the SQL statement for execution
mysqli_stmt_bind_param($stmt, "s", $param_id);
$param_id = $id; // id : f_id

// Try to execute this statement
if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $cid, $cname);
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
                                <i class="mdi mdi-pen"></i>
                            </span> Take Attendance
                        </h3>
                    </div>
                    <div class="col-12 grid-margin">
                        <div class="card" style="height: 110px;">
                            <div class="card-body">
                                <form class="forms-sample" action="" method="get">
                                    <div class="form-group row">
                                        <label for="Category" class="col-sm-2 col-form-label ">Course</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" id="category" name="category" required>
                                                <option value="" disabled selected>Choose course</option>
                                                <?php
                                                if (mysqli_stmt_execute($stmt)) {
                                                    $result = mysqli_stmt_get_result($stmt);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<option value=" . $row["c_id"] . ">" . $row["c_id"] ." - ". $row["cname"] . "</option>";
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-gradient-primary me-2" name="submit">OK</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    $course = "";
                    // Check if form is submitted
                    if (isset($_GET['submit'])) {
                        // Check if category is selected
                        if (isset($_GET['category']) && !empty($_GET['category'])) {
                            $course = $_GET['category'];
                            $sql = " SELECT sname,student.roll_no AS roll_no
                                     FROM student,takes
                                     WHERE takes.roll_no=student.roll_no AND c_id=?;";
                            $stmt = mysqli_prepare($conn, $sql);
                            mysqli_stmt_bind_param($stmt, "s", $param_course_id);
                            $param_course_id = $course;

                            // Execute the statement with the new course ID value
                            if (mysqli_stmt_execute($stmt)) {
                                // Fetch student details based on the new course ID
                                mysqli_stmt_store_result($stmt);
                                mysqli_stmt_bind_result($stmt, $sname, $roll_no);
                            }
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                                            <i class="mdi mdi-account-outline icon-sm me-2"></i>
                                            <span><?php echo $course ?></span>
                                        </div>
                                        <div class="d-flex align-items-center text-muted font-weight-light">
                                            <i class="mdi mdi-clock icon-sm me-2"></i>
                                            <span><?php echo date('F jS, Y') ?></span>
                                        </div>
                                    </div>
                                    <form class="forms-sample" action="" method="post">
                                        <div class="row">
                                            <div class="col-lg-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.N.</th>
                                                                    <th>Name</th>
                                                                    <th>Roll No.</th>
                                                                    <!-- <th>Percent</th> -->
                                                                    <th>Status</th>
                                                                    <th>Mark Attendance</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (mysqli_stmt_execute($stmt) && isset($_GET['submit'])) {
                                                                    $result = mysqli_stmt_get_result($stmt);
                                                                    if (mysqli_num_rows($result) > 0) {
                                                                        $sno = 1;
                                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                                            $sql = "SELECT CLASS_COUNT as CLASS_COUNT
                                                                                    FROM total_classes 
                                                                                    WHERE C_ID = ?;";
                                                                            $stmt2 = mysqli_prepare($conn, $sql);
                                                                            mysqli_stmt_bind_param($stmt2, "s", $course);
                                                                            mysqli_stmt_execute($stmt2);
                                                                            $result2 = mysqli_stmt_get_result($stmt2);
                                                                            $class_row = mysqli_fetch_assoc($result2);
                                                                            $total_class_count = $class_row['CLASS_COUNT'];

                                                                            $sql = "SELECT COUNT(*) AS total_attended
                                                                                    FROM attendance
                                                                                    WHERE roll_no = ? AND c_id = ?";

                                                                            $stmt3 = mysqli_prepare($conn, $sql);
                                                                            mysqli_stmt_bind_param($stmt3, "ss", $row["roll_no"], $course);
                                                                            mysqli_stmt_execute($stmt3);
                                                                            $result3 = mysqli_stmt_get_result($stmt3);
                                                                            $attendance_row = mysqli_fetch_assoc($result3);
                                                                            $total_attended = $attendance_row['total_attended'];

                                                                            if ($total_class_count == 0) {
                                                                                $percent = 100;
                                                                            } else
                                                                                $percent = ($total_attended / $total_class_count) * 100;

                                                                            if ($percent >= 90)
                                                                                $color = "success";
                                                                            else if ($percent < 90 && $percent >= 75)
                                                                                $color = "info";
                                                                            else
                                                                                $color = "danger";

                                                                            echo "<tr>";
                                                                            echo "<td>" . $sno . "</td>";
                                                                            echo "<td>" . $row["sname"] . "</td>";
                                                                            echo "<td>" . $row["roll_no"] . "</td>";
                                                                            // echo "<td>" . $percent . "</td>";
                                                                            echo '<td style="padding: 0;"><div class="form-check form-check-' . $color . '">
                                                                                  <label class="form-check-label">
                                                                                  <input type="radio" class="form-check-input" name="' . $row["roll_no"] . '" id="' . $row["roll_no"] . '" checked>
                                                                                  <i class="input-helper"></i>
                                                                                  </label>
                                                                                  </div></td>';
                                                                            echo '<td style="padding: 0;"><div class="form-check form-check-primary">
                                                                                  <label class="form-check-label">
                                                                                  <input type="checkbox" class="form-check-input" name="attendance[]" value="' . $row['roll_no'] . '">
                                                                                  <i class="input-helper"></i>
                                                                                  </label>
                                                                                  </div></td>';
                                                                            echo "</tr>";
                                                                            $sno = $sno + 1;
                                                                        }
                                                                    }
                                                                }
                                                                // Close statement and connection
                                                                mysqli_stmt_close($stmt);
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-sm-2 d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-gradient-primary me-2" name="submit" onclick="showPopup()">Submit </button>
                                                    </div>
                                                    <?php
                                                    $sql = "INSERT INTO attendance (roll_no, c_id, time) 
                                                            VALUES (?, ?, NOW())";
                                                    $stmt = mysqli_prepare($conn, $sql);

                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                        if (isset($_POST['attendance']) && is_array($_POST['attendance'])) {
                                                            foreach ($_POST['attendance'] as $roll_no) {
                                                                // Code to update attendance in the database
                                                                // You can use $course and $roll_no to update the attendance
                                                                mysqli_stmt_bind_param($stmt, "ss", $roll_no, $course);
                                                                mysqli_stmt_execute($stmt);
                                                            }
                                                            $sql = "UPDATE total_classes
                                                                    SET CLASS_COUNT = CLASS_COUNT + 1
                                                                    WHERE C_ID = ?;";
                                                            $stmt = mysqli_prepare($conn, $sql);
                                                            mysqli_stmt_bind_param($stmt, "s", $course);
                                                            mysqli_stmt_execute($stmt);
                                                            mysqli_stmt_close($stmt);
                                                            mysqli_close($conn);
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <script>
                                        function showPopup() {
                                            alert("Attendance Submitted");
                                        }
                                    </script>
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