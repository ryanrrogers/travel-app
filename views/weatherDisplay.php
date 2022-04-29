<?php

require 'includes/header.php';
require 'includes/connection.php';

$sql = "SELECT *
        FROM sql5476262.weather w
        INNER JOIN sql5476262.TempPerms t
        ON w.cityName = t.arrivalCity
        ORDER BY t.primKey DESC
        LIMIT 1
        ";

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
            <th scope="col">Temperature (F)</th>
            <th scope="col">Weather Description</th>
            <th scope="col">Weather Details</th>
            <th scope="col">Humidity</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($m_data as $data): ?>
            <tr>
                <td><?= $data['basestationsmaintemp']?></td>
                <td><?= $data['weathermain']?></td>
                <td><?= $data['weatherdescription']?></td>
                <td><?= $data['humidity']?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<br></br>
<input type="button" name="next" value="Check out Hotels" onclick="location.href='/Travel-App/views/hotelsDisplay.php'"


<?php require 'includes/footer.php'; ?>