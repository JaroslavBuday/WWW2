<?php

require "../classes/Database.php";
require "../classes/Auth.php";
require "../classes/Url.php";
require "../classes/Image.php";


session_start();

// overenie prihlaseneho uzivatela
if (!Auth::isLoggedIn()){
    die("Nepovolený prístup");
}

$user_id = $_SESSION["logged_in_user_id"];  // id prihlaseneho uzivatela

if(isset($_POST["submit"]) and isset($_FILES["image"])){

    $db = new Database();
    $connection = $db->connectionDB();

    // var_dump($_FILES);

    $image_name = $_FILES["image"]["name"];
    $image_size = $_FILES["image"]["size"];
    $image_tmp_name = $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];

    if($error === 0){
        if($image_size > 9000000){
            Url::redirectUrl("/www2.database/errors/error-page.php?error_text=Váš súbor je príliš velký! Max. velkosť: 9MB");
        } else {
            $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
            $image_extension_lower_case = strtolower($image_extension);

            $alowed_extensions = ["jpg", "jpeg", "png"];

            if(in_array($image_extension_lower_case, $alowed_extensions)){
                // ak sa nachadza pole lower v poli extension

                // generujeme unikatny nazov obrazku
                $new_image_name = uniqid("IMG-", true) . "." . $image_extension_lower_case;

                if(!file_exists("../uploads/" . $user_id)){
                    mkdir("../uploads/" . $user_id, 0777, true);
                    // vytvor priecinok s cislom uzivatela video 260
                    // v podmienke je iba ak neexistuje
                }
                
                $image_upload_path = "../uploads/" . $user_id . "/" . $new_image_name; 
                // cesta pre nacitanie obrazku

                move_uploaded_file($image_tmp_name, $image_upload_path);

                // vlozenie obrazku do databazy
                if(Image::insertImage($connection, $user_id, $new_image_name)){
                    Url::redirectUrl("/www2.database/admin/photos.php");
                }

            } else {
            Url::redirectUrl("/www2.database/errors/error-page.php?error_text=Typ Vášho súboru nie je povolený! Iba: jpg, jpeg, png");
            }
        }
    } else {
        Url::redirectUrl("/www2.database/errors/error-page.php?error_text=Chyba pri vkladaní obrázku! Skúste to znova neskôr.");
    }

}

?>

