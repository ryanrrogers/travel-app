<?php
include_once 'connection.php';
require 'url.php';

$arrivalCity = "";
if(isset($_POST['submit'])) {
	$departureCity = $_POST['departureCity'];
	$arrivalCity = $_POST['arrivalCity'];
	$leaveDate = $_POST['leaveDate'];
	$arrivalDate = $_POST['arrivalDate'];
	$maxPrice = $_POST['maxPrice'];
	$sql = "INSERT INTO TempPerms (departureCity, arrivalCity, leaveDate, arrivalDate, maxPrice) 
			VALUES ('$departureCity', '$arrivalCity', '$leaveDate', '$arrivalDate', '$maxPrice')";
	if (mysqli_query($conn, $sql)) {
		echo "New record added!";
	} else {
		echo "Error: " . $sql . ":-" . mysqli_error($conn);
	}
	mysqli_close($conn);

	redirect("views/weatherDisplay");
}

?>