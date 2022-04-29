<?php

require 'includes/header.php';
require 'includes/connection.php';
require 'includes/submit.php';

$sql = "SELECT *
        FROM sql5476262.hotels h
        INNER JOIN sql5476262.TempPerms t
        ON h.cityName = t.arrivalCity
        ORDER BY t.primKey DESC
        LIMIT 5
        ";

$result = mysqli_query($conn, $sql);

if($result === false)
{
    echo mysqli_error($conn);
}
else
{
    $m_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
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

<br></br>
<input type="button" name="next" value="Check out Flights" onclick="location.href='/Travel-App/views/flightsDisplay.php'"

<?php require 'includes/footer.php'; ?>