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

/**
 * 
 * 
 * 
 */
function authentification($connection, $log_email, $log_password){
    $sql = "SELECT password
            FROM user
            WHERE email = ?";

    $stmt = mysqli_prepare($connection, $sql);

    if($stmt){
        mysqli_stmt_bind_param($stmt, "s", $log_email);

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            $password_database = mysqli_fetch_row($result);
            $user_password_database = $password_database[0];

            if($user_password_database){
                return password_verify($log_password, $user_password_database);
                // vzdy prve dat zadane heslo az potom heslo hashovane z databazy!
                // pokial to sedi vrati sa true
            }
        }
    } else {
        echo mysqli_error($connection);
    }
}