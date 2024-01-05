<?php

require "../classes/Database.php";
require "../classes/Url.php";
require "../classes/User.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    $database = new Database();
    $connection = $database->connectionDB();

    $log_email = $_POST["login-email"];
    $log_password = $_POST["login-password"];

    if(User::authentification($connection, $log_email, $log_password)){
        // získanie ID užívatela
        $id = User::getUserId($connection, $log_email);

        session_regenerate_id(true);

        // nastavenie ze je uzivatel prihlaseny
        $_SESSION["is_logged_in"] = true;
        // nastavenie ID uzivatela
        $_SESSION["logged_in_user_id"] = $id;
        // nastavenie role uzivatela
        $_SESSION["role"] = User::getUserRole($connection, $id);

        Url::redirectUrl("/www2.database/admin/students.php");
        
    } else {
        $error = "Chyba pri prihlásení";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(!empty($error)): ?>
        <p><?= $error ?></p>
        <img src="../img/chyba.jpg" alt="error">
        <a href="../signin.php">Vrátiť sa späť</a>
    <?php endif; ?>
    
</body>
</html>