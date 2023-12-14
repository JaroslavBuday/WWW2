<?php

class Database {
    /**
     * Pripojenie sa do databazy
     * 
     * @return object - pre pripojenie do databazy
     */
    public function connectionDB() {
    // NASTAVENIE - PRIHLASOVACIE UDAJE
        $db_host = "localhost";  //pokial by nesiel localhost tak 127.0.0.1
        $db_name = "skola";

        $db_user = "test";
        $db_password = "admin1234";
        

    // NASTAVENIE DATABAZOVEHO SPOJENIA
        // $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
        $conn = "mysql:host=" . $db_host . ";dbname=" . $db_name . ";charset=utf8";
        

    // KONTROLA CI NIE JE NEJAKA CHYBA
    //     if(mysqli_connect_error()){
    //         echo mysqli_connect_error();
    //         exit;
    //     }
    // // echo "Úspešné prihlásenie do databázy";
    //     return $conn;

    try {
        $db = new PDO($conn, $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
    }
}