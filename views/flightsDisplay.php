<?php

require 'includes/header.php';
require 'includes/connection.php';

$sql = "SELECT *
        FROM sql5476262.flights f
        INNER JOIN sql5476262.TempPerms t
        ON f.id = t.primKey
        WHERE t.primKey = (SELECT MAX(primKey) FROM TempPerms)
        ORDER BY t.primKey DESC";

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
            <th scope="col">Airline</th>
            <th scope="col">Price</th>
            <th scope="col">Seats Available</th>
            <th scope="col">One Way</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($m_data as $data): ?>
            <?php
            $oneWay = "Yes";
            if ($data['one_way'] === 0) {
                $oneWay = "No";
            }
        ?>
            <tr>
                <td><?= $data['airline']?></td>
                <td>$<?= $data['price']?></td>
                <td><?= $data['seats'] ?></td>
                <td><?= $oneWay ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<br></br>
<input type="button" name="next" value="Check out Restaurants" onclick="location.href='/Travel-App/views/restaurantDisplay.php'"

<?php require 'includes/footer.php'; ?>