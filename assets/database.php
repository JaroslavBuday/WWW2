<?php 
    // NASTAVENIE - PRIHLASOVACIE UDAJE
        $db_host = "localhost";  //pokial by nesiel localhost tak 127.0.0.1
        $db_user = "test";
        $db_password = "admin1234";
        $db_name = "skola";

    // NASTAVENIE DATABAZOVEHO SPOJENIA
        $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    // KONTROLA CI NIE JE NEJAKA CHYBA
        if(mysqli_connect_error()){
            echo mysqli_connect_error();
            exit;
        }
        // echo "Úspešné prihlásenie do databázy";