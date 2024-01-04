<?php

require "../classes/Database.php";
require "../classes/Auth.php";
require "../classes/Image.php";
require "../classes/Url.php";

session_start();

// overenie prihlaseneho uzivatela
if (!Auth::isLoggedIn()){
    die("Nepovolený prístup");
}

$db = new Database();
$connection = $db->connectionDB();

$user_id = $_GET["id"];
$image_name = $_GET["image_name"];

$image_path = "../uploads/" . $user_id . "/" . $image_name;

if(Image::deleteImageFromDirectory($image_path)){
    // zmazať obrázok
    Image::deleteImageFromDatabase($connection, $image_name);

    Url::redirectUrl("/www2.database/admin/photos.php");
}