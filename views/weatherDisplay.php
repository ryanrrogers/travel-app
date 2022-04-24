<?php

require 'includes/header.php';
require 'includes/connection.php';

$sql = "Select *
        From sql5476262.weather";

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

<h1>Current Weather</h1>

<table class ="table">
    <thead>
        <tr>
            <th scope="col">Temperature</th>
            <th scope="col">Description</th>
            <th scope="col">Wind Speed</th>
            <th scope="col">Wind Degree</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($m_data as $data): ?>
            <tr>
                <td><?= $data['basestationsmaintemp']?></td>
                <td><?= $data['weathermain']?></td>
                <td><?= $data['windspeed']?></td>
                <td><?= $data['winddeg']?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php require 'includes/footer.php'; ?>