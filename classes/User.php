<?php
class User {
    
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
    public static function createUser($connection, $first_name, $second_name, $email, $password){
        $sql = "INSERT INTO user (first_name, second_name, email, password)
            VALUES (:first_name, :second_name, :email, :password)";  

            $stmt = $connection->prepare($sql);

            if (!$stmt) {
                echo mysqli_error($connection);
            } else {
                $stmt->bindValue(":first_name", $first_name, PDO::PARAM_STR);
                $stmt->bindValue(":second_name", $second_name, PDO::PARAM_STR);
                $stmt->bindValue(":email", $email, PDO::PARAM_STR);
                $stmt->bindValue(":password", $password, PDO::PARAM_STR);
                
                $stmt->execute();
                $id = $connection->lastInsertId();
                return $id;
            }
    }

    /**
     * Overenie uzivatela podla emailu a hesla
     * 
     * @param object $connection - pripojenie do databazy
     * @param string $log_email - email z formulara pre prihlasenie
     * @param string $log_password - heslo z formulara pre prihlasenie
     * 
     * @return boolean true - ak je prihlasenie uspesne, false - ak je neuspesne
     */
    public static function authentification($connection, $log_email, $log_password){
        $sql = "SELECT password
                FROM user
                WHERE email = :email";

        $stmt = $connection->prepare($sql); 

        if($stmt){
            $stmt->bindValue(":email", $log_email, PDO::PARAM_STR);

            $stmt->execute();

            if($user = $stmt->fetch()){
                var_dump($user);
                return password_verify($log_password, $user["password"]);
            }
        }
        

        




        // if($stmt){
        //     $stmt->bindValue(":email", $email, PDO::PARAM_STR);

        //     if($stmt->execute()){
        //         $result = mysqli_stmt_get_result($stmt);

        //         if($result->num_rows != 0){
        //             $password_database = mysqli_fetch_row($result); // tu je v premennej pole
        //             $user_password_database = $password_database[0]; // tu je v premennej string

        //             if($user_password_database){
        //                 return password_verify($log_password, $user_password_database);
        //                 // vzdy prve dat zadane heslo az potom heslo hashovane z databazy!
        //                 // pokial to sedi vrati sa true
        //             }
        //         } else {
        //             echo "Nesprávny email";
        //         }
                    
        //     }
        // } else {
        //     echo mysqli_error($connection);
        // }
    }

    /**
     * Ziskanie ID uzivatela
     * 
     * @param object $connection - pripojenie do databazy
     * @param string $email - email uzivatela
     * 
     * @return int id uzivatela
     */
    public static function getUserId($connection, $email){
        $sql = "SELECT id FROM user
                WHERE email = :email";

        $stmt = $connection->prepare($sql); 

        if($stmt){
            $stmt->bindValue(":email", $email, PDO::PARAM_STR);

            if($stmt->execute()){
                // $result = mysqli_stmt_get_result($stmt);
                // $id_database = mysqli_fetch_row($result); // pole
                // $user_id = $id_database[0];

                // PDO::FETCH_NUM
                $result = $stmt->fetch();
                $user_id = $result[0];

                return $user_id;
            }
        } else {
            echo mysqli_error($connection);
        }
    }
    }