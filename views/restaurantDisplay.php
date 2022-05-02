<?php

require 'includes/header.php';
require 'includes/connection.php';

$sql = "SELECT *
        FROM sql5476262.restaurants
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

<h1>Restaurants</h1>

<table class ="table">
    <thead>
        <tr>
            <th scope="col">Restaurant Name</th>
            <th scope="col">Pricing</th>
            <th scope="col">Rating</th>
            <th scope="col">Number of Reviews</th>
            <th scope="col">City</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($m_data as $data): ?>
            <tr>
                <td><?= $data['Name']?></td>
                <td><?= $data['Pricing']?></td>
                <td><?= $data['Rating']?></td>
                <td><?= $data['Reviews']?></td>
                <td><?= $data['City']?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<br></br>
<input type="button" name="next" value="Search for a new trip" onclick="location.href='/Travel-App/views/new-search.php'"

<?php require 'includes/footer.php'; ?>
