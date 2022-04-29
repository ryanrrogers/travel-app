<?php
include_once 'connection.php';
require 'url.php';

$arrivalCity = "";
if(isset($_POST['submit'])) {
	$departureCity = $_POST['departureCity'];
	$arrivalCity = $_POST['arrivalCity'];
	$leaveDate = $_POST['leaveDate'];
	$arrivalDate = $_POST['arrivalDate'];
	$sql = "INSERT INTO TempPerms (departureCity, arrivalCity, leaveDate, arrivalDate) 
			VALUES ('$departureCity', '$arrivalCity', '$leaveDate', '$arrivalDate')";
	if (mysqli_query($conn, $sql)) {
		echo "New record added!";
	} else {
		echo "Error: " . $sql . ":-" . mysqli_error($conn);
	}
	mysqli_close($conn);

	redirect("/Travel-App/views/weatherDisplay");

}

?>