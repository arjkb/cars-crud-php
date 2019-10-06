<?php
    session_start();
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
        <?php include "navigation.php"; ?>

        <h1>Cars</h1>
        <?php if(isset($_SESSION['username'])): ?>
            <h3> Welcome, <?= $_SESSION['username'] ?>! </h3>
        <?php endif; ?>

        <table>
            <thead>
                <th>ID</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Kilometer</th>
                <th>Transmission</th>
                <th>Owner Name</th>
                <th></th>
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
                <td>
                <?php if(isset($_SESSION['userid'])): ?>
                <?php
                    $delete_confirmation_msg = "Are you sure you wish to delete #".
                    $row['id'].' '.$row['year'].' '.$row['make'].' '.$row['model']."?";
                 ?>
                     <form action="edit.php" method="post" style="display: inline">
                         <input type="hidden" name="cardid" value="<?= $row['id'] ?>">
                         <button name='cardeditbutton'>Edit</button>
                     </form>

                    <form action="delete.php" method="post" style="display: inline">
                        <input type="hidden" name="cardid" value="<?= $row['id'] ?>">
                        <button name='cardeletebutton' onclick="return confirm(' <?= $delete_confirmation_msg ?>')">
                            Delete
                        </button>
                    </form>
                </td>
                <?php endif; ?>
            </tr>
        <?php endwhile; ?>

        <!-- create car form for logged in users -->
        <?php if(isset($_SESSION['userid'])): ?>
            <form action="create.php" method="post">
                <tr>
                    <td></td>
                    <td>
                        <input type="text" name="make" placeholder="Make" required>
                    </td>
                    <td>
                        <input type="text" name="model" placeholder="Model" required>
                    </td>
                    <td>
                        <input type="number" name="year" min="1900" value="<?= date("Y") ?>" max="<?= date("Y") ?>" required>
                    </td>
                    <td>
                        <input type="text" name="kilometer" placeholder="Kilometer" required>
                    </td>
                    <td>
                        <select name="transmission">
                            <option value='Manual'>Manual</option>
                            <option value='Torque-Converter'>Torque Converter</option>
                            <option value='Dual-Clutch'>Dual Clutch</option>
                            <option value='Continuously-Variable'>Continuously Variable</option>
                            <option value='Automated-Manual'>Automated Manual</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="owner_id" placeholder="Owner ID" required>
                    </td>
                    <td>
                        <button type="submit" name="createbtn">Create</button>
                    </td>
                </tr>
            </form>
        <?php endif; ?>
            </tbody>
        </table>
    </body>
</html>
