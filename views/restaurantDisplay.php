<?php

require 'includes/header.php';
require 'includes/connection.php';

$sql = "Select *
        From sql5476262.restaurants";

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

<h1>Restaurants</h1>

<table class ="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Restaurant Name</th>
            <th scope="col">Pricing</th>
            <th scope="col">Rating</th>
            <th scope="col"># of Reviews</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($m_data as $data): ?>
        <?php
            $price = "$";
            switch ($data['Pricing']) {
                case 1:
                    $price = "$";
                    break;
                case 2:
                    $price = "$$";
                    break;
                case 3:
                    $price = "$$$";
                    break;
            }
        ?>
            <tr>
                <th scope="row"></th>
                <td><?= $data['Name']?></td>
                <td><?= $price ?></td>
                <td><?= $data['Rating']?> / 5</td>
                <td><?= $data['Reviews']?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<br></br>
<input type="button" name="next" value="Search for a new trip" onclick="location.href='/Travel-App/views/new-search.php'"

<?php require 'includes/footer.php'; ?>