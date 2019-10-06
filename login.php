<?php
    session_start();
    require_once("pdo.php");

    // print_r($_POST['useremail']); echo "<br>";
    // var_dump(isset($_POST['useremail'])); echo "<br>";
    // print_r($_POST['password']);  echo "<br>";
    // var_dump(isset($_post['password']));  echo "<br>";
    if( isset($_POST['useremail']) && isset($_POST['password']) )  {

        // echo "valid!";
        $useremail = $_POST['useremail'];
        $password = $_POST['password'];
        echo "User email = $useremail <br>";
        echo "User password = $password <br>";
    }
    // echo "invalid!";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login | Cars CRUD</title>
    </head>
    <body>
        <?php include "navigation.php"; ?>
        <h1>Login</h1>

        <form action="login.php" method="post">
            <input type="text" name="useremail" placeholder="E-Mail" ><br><br>
            <input type="text" name="password" placeholder="Password" ><br><br>
            <button type="submit">Log In</button>
        </form>

    </body>
</html>
