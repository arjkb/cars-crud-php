<?php
    session_start();
    require_once('pdo.php');

    if (isset($_POST['createbtn'])) {
        // code...

        if ( isset($_POST['make']) &&
             isset($_POST['model']) &&
             isset($_POST['year']) &&
             isset($_POST['kilometer']) &&
             isset($_POST['transmission']) &&
             isset($_POST['owner_id']))
        {
            if ( empty($_POST['make']) ||
                 empty($_POST['model']) ||
                 empty($_POST['year']) ||
                 empty($_POST['kilometer']) ||
                 empty($_POST['transmission']) ||
                 empty($_POST['owner_id']))
             {
                 die('empty fields!');
             }

             $stmt_insert = $pdo->prepare('INSERT INTO cars(make, model, year, kilometer, transmission, owner_id) VALUES (:make, :model, :year, :kilometer, :transmission, :owner_id)');
             $stmt_insert->execute(array(
                 ':make' => $_POST['make'],
                 ':model' => $_POST['model'],
                 ':year' => $_POST['year'],
                 ':kilometer' => $_POST['kilometer'],
                 ':transmission' => $_POST['transmission'],
                 ':owner_id' => $_POST['owner_id']
             ));

             header('Location: index.php');
        }
    }

?>
