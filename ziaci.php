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
        echo "Úspešné prihlásenie do databázy";

    //NASTAVENIE SQL DOTAZU
        $sql = "SELECT FIRST_NAME FROM student";
            echo "<br>";

    // ODOSLANIE DOTAZU DO DATABAZY-VRATI OBJEKT
        $result = mysqli_query($connection, $sql); 
            var_dump($result);
            echo "<br>";
            echo "<br>";

    // PREHODIM SI OBJEKT NA ASOCIATIVNE POLE
        $students = mysqli_fetch_all($result, MYSQLI_ASSOC); 
        var_dump($students);


?>