<?php
session_start();
// Declaring sign in variables
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "cs_app";

    // creating connection with database
    $con = mysqli_connect($host , $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error ('. mysqli_connect_errno().')'. mysqli_connect_error());
    }

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

if(isset($_POST['submit'])) {
    $name = $_POST['org_name'];
    $phone = $_POST['org_pNum'];
    $loc = $_POST['org_location'];
    $title = $_POST['org_title'];
    $email = $_POST['org_email'];
    $desc = $_POST['org_message'];
    $number = $_POST['quantity'];
    $date = date('Y-m-d', strtotime($_POST['org_date']));
    $startT = $_POST['start_time'];
    $endT = $_POST['end_time'];

    $query = "INSERT INTO service_form (org_name, org_pNum, org_location, org_title, org_email, org_message, quantity, date, start_time, end_time) VALUES('$name', '$phone', '$loc', '$title', '$email', '$desc', '$number', '$date', '$startT', '$endT')";

    $query_run = mysqli_query($con, $query);

    if($query_run) {
        $_SESSION['status'] = "Service is created successfully!";
        header("Location: CreateService.php");
    } elseif($query_run == false) {
        $_SESSION['status'] = mysqli_error($con);
        header("Location: CreateService.php");
    } else {
        $_SESSION['status'] = "Service is not created, please try again!";
        header("Location: CreateService.php");
    }
}

?>