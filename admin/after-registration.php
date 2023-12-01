<?php

require "../assets/url.php";
require "../assets/database.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $connection = connectionDB();

    $first_name = $_POST["first-name"];
    $second_name = $_POST["second-name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    var_dump($first_name, $second_name, $email, $password);
}
