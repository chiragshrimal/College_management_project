<?php
    // This file contains database configuration assuming you are running mysql using user "root" and password ""
    define('DB_SERVER', '127.0.0.1:3308');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'college_management_system');

    // Try connecting to the Database
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    //Check the connection
    if($conn == false){
        dir('Error: Cannot connect');
    }
?>