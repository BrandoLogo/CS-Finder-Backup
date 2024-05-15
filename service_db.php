<?php
session_start();


// Declaring variable from CreateService.php
$name = $_POST['org_name'];
$phone = $_POST['org_pNum'];
$loc = $_POST['org_location'];
$title = $_POST['org_title'];
$email = $_POST['org_email'];
$desc = $_POST['org_message'];
$number = $_POST['quantity'];
$date = $_POST['org_date'];
$startT = $_POST['start_time'];
$endT = $_POST['end_time'];


if (!empty($name) || !empty($phonenum) || !empty($loc) || !empty($title) || !empty($email) || !empty($desc) || !empty($number) || !empty($date) || !empty($startT) || !empty($endT)) {
	// Declaring sign in variables
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "cs_app";

	// creating connection with database
	$conn = new mysqli($host , $dbUsername, $dbPassword, $dbname);

	if (mysqli_connect_error()) {
		die('Connect Error ('. mysqli_connect_errno().')'. mysqli_connect_error());
	} else {

		$SELECT = "SELECT org_email FROM service_form WHERE org_email = ? Limit 1";
		$INSERT = "INSERT INTO service_form (org_name, org_pNum, org_location, org_title, org_email, org_message, quantity) VALUES(?, ?, ?, ?, ?, ?, ?)";

		// prepare Statement
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

		if ($rnum==0) {
			$stmt->close();

			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("sissssi", $name, $phone, $loc, $title, $email, $desc, $number);
			$stmt->execute();
			echo "Your service has been created successfully";

		} else {
			echo "Another service using this email";
		}
		$stmt->close();
		$conn->close();
	}
} else {
	echo "All fields are required!";
	die();
}

?>