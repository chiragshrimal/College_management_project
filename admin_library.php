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

if (isset($_GET['delete'])) {
    $issueID = $_GET['delete'];
    echo $issueID;
    $sql = "DELETE FROM issue
            WHERE issue_id=$issueID;";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['issueIDEdit'])) {
        // Update the record
        $status = $_POST["statusEdit"];
        $fine = $_POST["fineEdit"];
        $issueID = $_POST["issueIDEdit"];

        $sql = "UPDATE issue 
              SET fine = $fine, status='$status'
              WHERE issue.issue_id=$issueID;";

        $result = mysqli_query($conn, $sql);
        if ($result) {
        } else {
            echo "We could not update the record successfully";
        }
    } else {
        $rollno = $_POST["rollno"];
        $status = "Not Returned";
        $bookID = $_POST["bookID"];
        $fine = 0;
        $issueDate = $_POST["issueDate"];
        $returnDate = $_POST["returnDate"];

        $sql = "INSERT INTO issue (roll_no, book_id, issue_date, return_date, status, fine)
                VALUES ('$rollno', '$bookID', '$issueDate', '$returnDate', '$status', '$fine');";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $insert = true;
        } else {
            echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
        }
    }
}

$totalFine = 0;
$totalFinePaid = 0;
$totalBookIssued = 0;

$sql = "SELECT roll_no, issue_id, title, author, issue_date, return_date, status, fine
        FROM book, issue
        WHERE book.BOOK_ID = issue.BOOK_ID;";

$stmt = mysqli_prepare($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Library - <?php echo $_SESSION['name'] ?></title>
    <link rel="stylesheet" href="http://localhost/Dashboard/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="http://localhost/Dashboard/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="http://localhost/Dashboard/assets/css/style.css">
    <link rel="stylesheet" href="http://localhost/Dashboard/assets/css/myStyle.css">
    <link rel="shortcut icon" href="http://localhost/Dashboard/assets/images/favicon1.png" />
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
</head>

<body>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit STATUS and FINE</h5>
                </div>
                <form action="admin_library.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="issueIDEdit" id="issueIDEdit">
                        <div class="form-group">
                            <label for="status">Staus</label>
                            <input type="text" class="form-control" id="statusEdit" name="statusEdit" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="fine">Fine</label>
                            <input type="text" class="form-control" id="fineEdit" name="fineEdit" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                                <i class="mdi mdi-library"></i>
                            </span> Library Details
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-danger card-img-holder text-white" style="height: 200px;">
                                <div class="card-body">
                                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                    <?php
                                    if (mysqli_stmt_execute($stmt)) {
                                        $result = mysqli_stmt_get_result($stmt);
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
                                    ?>
                                    <h2 class="font-weight-normal mb-3">Total Fine Pending<i class="mdi mdi-currency-inr mdi-30px float-right"></i>
                                    </h2>
                                    <h2 class="mb-3"><?php echo $totalFine ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-info card-img-holder text-white" style="height: 200px;">
                                <div class="card-body">
                                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                    <h2 class="font-weight-normal mb-3">Total Fine Paid <i class="mdi mdi-currency-inr mdi-30px float-right"></i>
                                    </h2>
                                    <h2 class="mb-5"><?php echo $totalFinePaid ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-success card-img-holder text-white" style="height: 200px;">
                                <div class="card-body">
                                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                    <h2 class="font-weight-normal mb-3">Total Book Issued <i class="mdi mdi-book-multiple mdi-30px float-right"></i>
                                    </h2>
                                    <h2 class="mb-5"><?php echo $totalBookIssued ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Issue new book</h4>
                                    <form action="admin_library.php" method="POST">
                                        <div class="form-group row">
                                            <label for="rollno" class="col-sm-2 col-form-label">Roll No.</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="rollno" name="rollno" aria-describedby="emailHelp">
                                            </div>
                                            <label for="bookID" class="col-sm-2 col-form-label">Book ID</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="bookID" name="bookID" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="issueDate" class="col-sm-2 col-form-label">Issue Date</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="issueDate" name="issueDate" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
                                            </div>
                                            <label for="returnDate" class="col-sm-2 col-form-label">Return Date</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="returnDate" name="returnDate" aria-describedby="emailHelp" placeholder="YYYY-MM-DD">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" onclick="showPopup()">Issue</button>
                                    </form>
                                    <script>
                                        function showPopup() {
                                            alert("Issue data added");
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="margin-bottom:20px;">Issue History</h4>
                                    <table class="table" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Title</th>
                                                <th>Roll No.</th>
                                                <th>Issue Date</th>
                                                <th>Return Date</th>
                                                <th>Status</th>
                                                <th>Fine</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (mysqli_stmt_execute($stmt)) {
                                                $result = mysqli_stmt_get_result($stmt);
                                                if (mysqli_num_rows($result) > 0) {
                                                    $totalFine = 0;
                                                    $flag = 0;
                                                    $sno = 0;
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
                                                            $fine = $interval->days * 5;
                                                            $totalFine = $totalFine + $fine; // paid and unpaid fine
                                                        } else {
                                                            // Return date is on or before the current date, no fine
                                                            $fine = 0;
                                                        }
                                                        $sno = $sno + 1;
                                                        echo "<tr>";
                                                        echo "<td>" . $sno . "</td>";
                                                        echo "<td>" . $row["title"] . "</td>";
                                                        echo "<td>" . $row["roll_no"] . "</td>";
                                                        echo "<td>" . $row["issue_date"] . "</td>";
                                                        echo "<td>" . $row["return_date"] . "</td>";
                                                        echo "<td>" . $row["status"] . "</td>";
                                                        echo "<td>" . $fine . "</td>"; // current fine to be paid
                                                        echo "<td> <button class='edit btn btn-sm btn-primary' id=" . $row['issue_id'] . ">Update</button>
                                                                   <button class='delete btn btn-sm btn-danger' id=" . $row['issue_id'] . ">Delete</button></td>";
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
                                                echo "No book issued";
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

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let table = new DataTable('#myTable');

            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('edit')) {
                    let tr = event.target.closest('tr');
                    let status = tr.querySelector('td:nth-child(6)').innerText;
                    let fine = tr.querySelector('td:nth-child(7)').innerText;
                    let issueID = tr.querySelector('.edit').getAttribute('id'); // Get issueID from the data attribute

                    document.getElementById('statusEdit').value = status;
                    document.getElementById('fineEdit').value = fine;
                    document.getElementById('issueIDEdit').value = issueID;

                    $('#editModal').modal('toggle');
                } else if (event.target.classList.contains('delete')) {
                    let tr = event.target.closest('tr');
                    let issueID = tr.querySelector('.delete').getAttribute('id'); // Get issueID from the data attribute

                    if (confirm("Are you sure you want to delete !")) {
                        window.location = `admin_library.php?delete=${issueID}`;
                    }
                }
            });
        });
    </script>

    <!-- <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                status = tr.getElementsByTagName("td")[5].innerText;
                fine = tr.getElementsByTagName("td")[6].innerText;
                console.log(fine, status);
                fineEdit.value = fine;
                statusEdit.value = status;
                issueIDEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        })

        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                issueID = e.target.id;
                if (confirm("Are you sure you want to delete this note!")) {
                    console.log("yes");
                    window.location = `admin_library.php?delete=${issueID}`;
                } else {
                    console.log("no");
                }
            })
        })
    </script> -->
</body>

</html>