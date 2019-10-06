<?php
    session_start();
    require_once('pdo.php');

    if(isset($_POST['cardeletebutton'])) {
        $carid = $_POST['carid'];
        echo "delete button clicked! <br />";
        echo " deleting car #".$carid;
    }
?>
