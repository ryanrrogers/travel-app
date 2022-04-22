<?php

require 'includes/header.php';
require 'includes/connection.php';

$sql = "Select *
        From sql5476262.flights";

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
        <h3><?= $data['airline']?></h3>
        <p>Price:<?= $data['price']?></p>
        <p>Seats Available: <?= $data['seats'] ?></p>
        <p>One Way:<?= $data['one_way']?></p>
    </div>
<?php endforeach ?>

<?php require 'includes/footer.php'; ?>