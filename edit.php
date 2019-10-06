<?php
    session_start();
    require_once('pdo.php');

    if (isset($_POST['cardeditbutton'])) {
        $carid = $_POST['cardid'];
        $stmt_select = $pdo->prepare('SELECT id, make, model, year, kilometer, transmission, owner_id FROM cars WHERE id = :carid');
        $stmt_select->execute(array(':carid' => $carid));
        $cardetails = $stmt_select->fetch(PDO::FETCH_ASSOC);
    } elseif (isset($_POST['updatebtn'])) {
        $carid = $_POST['carid'];

        $stmt_update = $pdo->prepare('UPDATE cars SET make = :make, model = :model, year = :year, kilometer = :kilometer, transmission = :transmission, owner_id = :owner_id  WHERE id = :carid');
        $stmt_update->execute(array(
            ':make' => $_POST['make'],
            ':model' => $_POST['model'],
            ':year' => $_POST['year'],
            ':kilometer' => $_POST['kilometer'],
            ':transmission' => $_POST['transmission'],
            ':owner_id' => $_POST['owner_id'],
            ':carid' => $carid
        ));

        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <form action="" method="post">
            <input type="hidden" name="carid" value="<?= $carid ?>">
            <input type="text" name="make" placeholder="Make" value="<?= $cardetails['make'] ?>" required> <br >
            <input type="text" name="model" placeholder="Model" value="<?= $cardetails['model'] ?>" required> <br >
            <input type="number" name="year" min="1900" value="<?= date("Y") ?>" max="<?= date("Y") ?>" value="<?= $cardetails['year'] ?>" required> <br >
            <input type="text" name="kilometer" placeholder="Kilometer" value="<?= $cardetails['kilometer'] ?>" required> <br >

            <select name="transmission">
                <option value='Manual'>Manual</option>
                <option value='Torque-Converter'>Torque Converter</option>
                <option value='Dual-Clutch'>Dual Clutch</option>
                <option value='Continuously-Variable'>Continuously Variable</option>
                <option value='Automated-Manual'>Automated Manual</option>
            </select> <br >
            <input type="text" name="owner_id" placeholder="Owner ID" value="<?= $cardetails['owner_id'] ?>" required> <br >
            <button type="submit" name="updatebtn">Update</button>
        </form>

    </body>
</html>
