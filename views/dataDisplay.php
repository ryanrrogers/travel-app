<?php

require 'header.php';
require 'connection.php';

$conn = getDB();

$sql = "Select *
        From sql5476262.hotels";

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
    <div style:"container-fluid">
        <h3><?= $data['Name']?></h3>
        <p>Price:<?= $data['Price']?></p>
        <p>Address: <?= $data['Address'] ?></p>
        <p>Star Rating:<?= $data['Rating']?></p>
    </div>
<?php endforeach ?>

<?php require 'footer.php'; ?>