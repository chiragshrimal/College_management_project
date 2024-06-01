<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: http://localhost/CMS/login.php");
}

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"]; // Retrieve the $id from session
}

require_once "C:\\xampp\\htdocs\\CMS\\config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['rollno'])) {
    $roll_no = $_POST["rollno"];
    
    $sql2 = "INSERT INTO gate_entry
            VALUES ($roll_no, NOW());";
    $stmt2 = mysqli_prepare($conn, $sql2);
    mysqli_stmt_execute($stmt2);
}

$sql = "SELECT sname, student.roll_no, entry_time, DATE(entry_time) AS date, TIME(entry_time) AS time
        FROM gate_entry, student
        WHERE student.roll_no=gate_entry.roll_no;";

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET["filter"])) {

    $filter = $_GET["filter"];

    if ($filter == "last7days") {
        $sql = " SELECT sname, student.roll_no, entry_time, DATE(entry_time) AS date, TIME(entry_time) AS time
                 FROM gate_entry, student
                 WHERE student.roll_no=gate_entry.roll_no AND entry_time >= DATE_SUB(CURDATE(), INTERVAL 7 DAY);";
    } else if ($filter == "last1month") {
        $sql = " SELECT sname, student.roll_no, entry_time, DATE(entry_time) AS date, TIME(entry_time) AS time
                 FROM gate_entry, student
                 WHERE student.roll_no=gate_entry.roll_no AND entry_time >= DATE_SUB(NOW(), INTERVAL 1 MONTH) AND entry_time <= NOW();";
    } else if ($filter == "newestFirst") {
        $sql = "SELECT sname, student.roll_no, entry_time, DATE(entry_time) AS date, TIME(entry_time) AS time
            FROM gate_entry, student
            WHERE student.roll_no=gate_entry.roll_no
            ORDER BY entry_time DESC;";
    } else if ($filter == "all") {
        $sql = "SELECT sname, student.roll_no, entry_time, DATE(entry_time) AS date, TIME(entry_time) AS time
                FROM gate_entry, student
                WHERE student.roll_no=gate_entry.roll_no;";
    } else if ($filter == "sortByName") {
        $sql = "SELECT sname, student.roll_no, entry_time, DATE(entry_time) AS date, TIME(entry_time) AS time
                FROM gate_entry, student
                WHERE student.roll_no=gate_entry.roll_no
                ORDER BY sname;";
    }
}

$stmt = mysqli_prepare($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gate Entry - <?php echo $_SESSION['name'] ?></title>
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
                                <i class="mdi mdi-pen"></i>
                            </span> Late Entry
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample" action="admin_gate_entry.php" method="post">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="margin-bottom:20px;">Entry History</h4>
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
                                                    <button type="submit" class="button" name="filter" value="last1month">Last 1 Month</button>
                                                    <button type="submit" class="button" name="filter" value="newestFirst">Newest First</button>
                                                    <button type="submit" class="button" name="filter" value="sortByName">Sort by Name</button>
                                                </form>
                                            </div>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Name</th>
                                                <th>Roll No.</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Late Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (mysqli_stmt_execute($stmt)) {
                                                $result = mysqli_stmt_get_result($stmt);
                                                if (mysqli_num_rows($result) > 0) {
                                                    $flag = 0;
                                                    $sno = 0;
                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                        // Create a DateTime object from the datetime string
                                                        $date = new DateTime($row["entry_time"]);
                                                        // Extract date and time components
                                                        $timeComponent = $date->format('H:i:s'); // Extracts time component (in 'H:i:s' format)

                                                        $referenceTime = "21:30:00";
                                                        // Create DateTime objects for reference time and $timeComponent
                                                        $dateTime1 = DateTime::createFromFormat('H:i:s', $referenceTime);
                                                        $dateTime2 = DateTime::createFromFormat('H:i:s', $timeComponent);

                                                        // Calculate the difference in seconds
                                                        $diffSeconds = $dateTime2->getTimestamp() - $dateTime1->getTimestamp();
                                                        
                                                        $lateDuration = gmdate('H:i:s', $diffSeconds);

                                                        $sno = $sno + 1;
                                                        echo "<tr>";
                                                        echo "<td>" . $sno . "</td>";
                                                        echo "<td>" . $row["sname"] . "</td>";
                                                        echo "<td>" . $row["roll_no"] . "</td>";
                                                        echo "<td>" . $row["date"] . "</td>";
                                                        echo "<td>" . $row["time"] . "</td>";
                                                        echo "<td>" . $lateDuration . "</td>";
                                                        echo "</tr>";
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
                                                echo "No entry registered";
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