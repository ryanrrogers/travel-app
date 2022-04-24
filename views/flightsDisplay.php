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

<h1>Flights</h1>

<table class ="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Airline</th>
            <th scope="col">Price</th>
            <th scope="col">Seats Available</th>
            <th scope="col">One Way</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($m_data as $data): ?>
            <tr>
                <th scope="row"></th>
                <td><?= $data['airline']?></td>
                <td>$<?= $data['price']?></td>
                <td><?= $data['seats'] ?></td>
                <td><?= $data['one_way']?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php require 'includes/footer.php'; ?>