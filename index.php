<?php
    require_once('pdo.php');

    $stmt_select = $pdo->query('SELECT cars.id, cars.make, cars.model, cars.year, cars.kilometer, cars.transmission, users.username FROM cars INNER JOIN users ON
cars.owner_id = users.id');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Cars CRUD</title>
    </head>
    <body>
        <h1>Cars</h1>

        <table>
            <thead>
                <th>ID</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Kilometer</th>
                <th>Transmission</th>
                <th>Owner Name</th>
            </thead>
            <tbody>
        <?php while ($row = $stmt_select->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['make'] ?></td>
                <td><?= $row['model'] ?></td>
                <td><?= $row['year'] ?></td>
                <td><?= $row['kilometer'] ?></td>
                <td><?= $row['transmission'] ?></td>
                <td><?= $row['username'] ?></td>
            </tr>
        <?php endwhile; ?>
            </tbody>
        </table>
    </body>
</html>
