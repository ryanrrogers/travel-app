<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

$flights = Flight::getAll($conn);

$weather = Weather::getAll($conn);
?>

<?php if (empty($weather)) : ?>
    <p>No weather found!</p>
<?php else : ?>
    <ul>
        <?php foreach ($weather as $weather_instance) : ?>
            <li>
                <ol>
                    <li><?= htmlspecialchars($weather_instance['weathermain']); ?></li>
                    <li><?= htmlspecialchars($weather_instance['weatherdescription']); ?></li>
                    <li><?= htmlspecialchars($weather_instance['basestationshumidity']); ?></li>
                    <li><?= htmlspecialchars($weather_instance['basestationsmaintempx']); ?></li>
                </ol>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (empty($flights) : ?>
    <p>No flights found!</p>
<?php else : ?>
    <ul>
        <?php foreach ($flights as $flight) : ?>
            <li>
                <ol>
                    <li><?= htmlspecialchars($flight['airline']); ?></li>
                    <li><?= htmlspecialchars($flight['price']); ?></li>
                    <li><?= htmlspecialchars($flight['seats']); ?></li>
                    <li><?= htmlspecialchars($flight['one_way']); ?></li>
                </ol>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>