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

        $stmt_user_credentials = $pdo->prepare('SELECT id, username, passhash FROM users WHERE useremail LIKE :email');
        $stmt_user_credentials->execute(array(':email' => $useremail));

        $row_user_credentials = $stmt_user_credentials->fetch(PDO::FETCH_ASSOC);
        $userid_db = $row_user_credentials['id'];
        $username_db = $row_user_credentials['username'];
        $passhash_db = $row_user_credentials['passhash'];

        echo "<br> $userid_db";
        echo "<br> $username_db";
        echo "<br> $passhash_db";

        if(password_verify($password, $passhash_db))    {
            echo "<br> passwords match!";
        }
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
