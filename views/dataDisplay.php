<?php

require 'includes/header.php';
require 'includes/connection.php';
?>

<style>
    .center{
        margin: auto;
        width: 60%;
        border: 5px #FFFF00;
        padding: 10x;
    }
</style>

<?php
$conn = getDB();
# $city = $_POST['destination_city']; get the city from the form

$sql = "Select *
        From sql5476262.hotels
        WHERE cityName = 'chicago'";

$results = mysqli_query($conn, $sql);

if($results === false)
{
    echo mysqli_error($conn);
}
else
{
    $m_data = mysqli_fetch_all($results, MYSQLI_ASSOC);
}
?>


<?php foreach ($m_data as $data): ?>

    <div class:"center">
        <h3><?= $data['Name']?></h3>
        <p>Price:<?= $data['Price']?></p>
        <p>Address: <?= $data['Address'] ?></p>
        <p>Star Rating:<?= $data['Rating']?></p>
    </div>
<?php endforeach ?>

<?php require 'includes/footer.php'; ?>