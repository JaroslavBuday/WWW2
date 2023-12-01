<?php

/**
 * Prida Uzivatela do databazy 
 * 
 * @param object $connection - napojenie na databazu
 * @param string $first_name - meno
 * @param string $second_name - priezvisko
 * @param string $email - emailova adresa
 * @param string $password - heslo uzivatela
 * 
 * @return integer $id - id uzivatela
 */
function createUser($connection, $first_name, $second_name, $email, $password){
    $sql = "INSERT INTO user (first_name, second_name, email, password)
        VALUES (?,?,?,?)";  

        $statement = mysqli_prepare($connection, $sql);

        if (!$statement) {
            echo mysqli_error($connection);
        } else {
            mysqli_stmt_bind_param($statement,"ssss", $first_name, $second_name, $email, $password);

            mysqli_stmt_execute($statement);
            $id = mysqli_insert_id($connection);
            return $id;
        }
}