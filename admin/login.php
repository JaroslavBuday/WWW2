<?php
require "../assets/database.php";
require "../assets/url.php";
require "../assets/user.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $conn = connectionDB();
    $log_email = $_POST["login-email"];
    $log_password = $_POST["login-password"];

    if(authentification($conn, $log_email, $log_password)){
        // získanie ID užívatela
        $id = getUserId($conn, $log_email);
        echo $id;
    } else {
        // neúspešné prihlásenie
    }
}