<?php

require 'includes/header.php';
require 'includes/connection.php';

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

<h1>Hotels</h1>

<table class ="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">Hotel Name</th>
            <th scope="col">Price</th>
            <th scope="col">Rating</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($m_data as $data): ?>
            <tr>
                <th scope="row"></th>
                <td><?= $data['Address']?></td>
                <td><?= $data['cityName']?></td>
                <td><?= $data['Name'] ?></td>
                <td><?= $data['Price']?></td>
                <td><?= $data['Rating']?> / 5</td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php require 'includes/footer.php'; ?>