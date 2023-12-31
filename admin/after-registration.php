<?php

require "../classes/Database.php";
require "../classes/Url.php";
require "../classes/User.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    // $connection = connectionDB();
    $database = new Database();
    $connection = $database->connectionDB();

    $first_name = $_POST["first-name"];
    $second_name = $_POST["second-name"];
    $email = $_POST["email"];
    $password =  password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = "user";

    /* nikdy neukladat do databazy ako plain text
            PASSWORD_DEFAULT - vzdy pouzije najnovsiu metodu */
            
    // Plain text = Admin123
    // Hash = fggafg56a5f56ga5fg5a6sffga6f5g6a6dff5g

    $id = User::createUser($connection, $first_name, $second_name, $email, $password, $role);

    if(!empty($id)){
        // zabranuje vykonaniu tzv. fixation atack. viac tu https://owasp.org/www-community/attacks/Session_fixation
        session_regenerate_id(true);

        // nastavenie ze je uzivatel prihlaseny
        $_SESSION["is_logged_in"] = true;
        // nastavenie ID uzivatela
        $_SESSION["logged_in_user_id"] = $id;
        // nastavenie role uzivatela
        $_SESSION["role"] = $role;

        Url::redirectUrl("/www2.database/admin/students.php");        
    } else {
        echo " Užívatela sa nepodarilo zaregistrovať";
    }
    
}
