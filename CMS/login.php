<?php
// This script will handle login
session_start();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

// check if the user is already logged in
if ($user == "student") {
  header("location: http://localhost/Dashboard/dashboard_student.php");
  exit;
} elseif ($user == "faculty") {
  header("location: http://localhost/Dashboard/dashboard_faculty.php");
  exit;
} elseif ($user == "admin") {
  header("location: http://localhost/Dashboard/admin_library.php");
  exit;
}

//making connection with database
require_once "config.php";

$id = $password = $user = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty(trim($_POST['id'])) && !empty(trim($_POST['password'])) && !empty(trim($_POST['user']))) {

  $id = trim($_POST['id']);
  $password = trim($_POST['password']);
  $user = $_POST['user'];

  if (empty($err) && $user == "student") {
    $sql = "SELECT sname, roll_no, password 
            FROM student 
            WHERE roll_no = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_id);
    $param_id = $id;

    if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_store_result($stmt);
      if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $sname, $id, $stored_password);
        if (mysqli_stmt_fetch($stmt)) {
          if ($password == $stored_password) {
            $_SESSION["user"] = $user;
            $_SESSION["id"] = $id;
            $_SESSION["name"] = $sname;
            $_SESSION["loggedin"] = true;
            header("location: http://localhost/Dashboard/dashboard_student.php");
          }
        }
      }
    }
  }
  if (empty($err) && $user == "faculty") {
    $sql = "SELECT fac_name, f_id, password 
            FROM faculty 
            WHERE f_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_id);
    $param_id = $id;

    if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_store_result($stmt);
      if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $fac_name, $id, $stored_password);
        if (mysqli_stmt_fetch($stmt)) {
          if ($password == $stored_password) {
            $_SESSION["user"] = $user;
            $_SESSION["id"] = $id;
            $_SESSION["name"] = $fac_name;
            $_SESSION["loggedin"] = true;
            header("location: http://localhost/Dashboard/dashboard_faculty.php");
          }
        }
      }
    }
  }
  if (empty($err) && $user == "admin") {
    $sql = "SELECT admin_name, admin_id, admin_pass 
            FROM admin
            WHERE admin_id = ?;";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_id);
    $param_id = $id;

    if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_store_result($stmt);
      if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $admin_name, $id, $stored_password);
        if (mysqli_stmt_fetch($stmt)) {
          if ($password == $stored_password) {
            $_SESSION["user"] = $user;
            $_SESSION["id"] = $id;
            $_SESSION["name"] = $admin_name;
            $_SESSION["loggedin"] = true;
            header("location: http://localhost/Dashboard/admin_library.php");
          }
        }
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - College Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="login.css" rel="stylesheet">
  <link rel="shortcut icon" href="http://localhost/Dashboard/assets/images/favicon1.png" />

</head>

<body>
  <div class="container-fluid">
    <form class="mx-auto" action="" method="post" onsubmit="return validateForm()">
      <h4 class="text-center">Login</h4>
      <div class="mb-3 mt-5">
        <label for="exampleInputEmail1" class="form-label">User ID</label>
        <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="idWarning" class="form-text warning"></small>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        <small id="passwordWarning" class="form-text warning"></small>
      </div>
      <!-- Hidden password field -->
      <input type="hidden" name="fakepassword" value="fakepassword">
      <div class="radio-container">
        <input type="radio" id="student" name="user" value="student">
        <label for="student">Student</label>

        <input type="radio" id="faculty" name="user" value="faculty">
        <label for="faculty">Faculty</label>

        <input type="radio" id="admin" name="user" value="admin">
        <label for="admin">Admin</label>
      </div>
      <small id="radioWarning" class="form-text warning"></small>
      <div class="text-center">
        <button type="submit" class="btn btn-primary mt-5">Login</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    function validateForm() {
      var idField = document.getElementById("exampleInputEmail1");
      var passwordField = document.getElementById("exampleInputPassword1");
      var idWarning = document.getElementById("idWarning");
      var passwordWarning = document.getElementById("passwordWarning");
      var radioWarning = document.getElementById("radioWarning");
      var radios = document.querySelectorAll('input[type="radio"]:checked');

      if (idField.value === "") {
        idWarning.style.display = "inline";
        idField.placeholder = "Enter ID";
      } else {
        idWarning.style.display = "none";
        idField.placeholder = "";
      }

      if (passwordField.value === "") {
        passwordWarning.style.display = "inline";
        passwordField.placeholder = "Enter Password";
      } else {
        passwordWarning.style.display = "none";
        passwordField.placeholder = "";
      }
      if (radios.length === 0) {
        radioWarning.textContent = "Please select a user type";
        radioWarning.style.display = "block";
      } else {
        radioWarning.style.display = "none";
      }

      if (idField.value === "" || passwordField.value === "" || radios.length === 0) {
        return false; // Prevent form submission
      }
      // If all fields are filled, allow form submission
      return true;
    }
  </script>
</body>

</html>