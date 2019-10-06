<?php
    session_start();
    require_once('pdo.php');

    if(isset($_POST['cardeletebutton'])) {
        $carid = $_POST['cardid'];
        echo "delete button clicked! <br />";
        echo " deleting car #".$carid;

        $stmt_delete = $pdo->prepare('DELETE FROM cars WHERE id = :carid');
        $stmt_delete->execute(array(':carid' => $carid));
    }
    header('Location: index.php');
?>
