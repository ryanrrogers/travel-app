<?php
require 'header.php';
require 'connection.php';

$departure_date = '';
$departure_city = '';
$return_date = '';
$destination_city = '';
$max_hotel_price = '';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $departure_city = $_POST['departure_city'];
    $destination_city = $_POST['destination_city'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $max_hotel_price = $_POST['max_price'];

    $conn = getDB();
    $sql = "INSERT INTO sql5476262.TempPerms (departureCity, arrivalCity, leaveDate, arrivalDate, maxPrice)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if($stmt === false)
    {
        echo mysqli_error($conn);
    }

    else
    {
        mysqli_stmt_bind_param($stmt, $departure_city, $destination_city, $departure_date, $return_date, $max_hotel_price);

    }
}

require 'HomeForm.php';
require 'footer.php';
?>