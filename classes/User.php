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
     * @param string $role - rola uzivatela
     * 
     * @return integer $id - id uzivatela
     */
    public static function createUser($connection, $first_name, $second_name, $email, $password, $role){
        $sql = "INSERT INTO user (first_name, second_name, email, password, role)
            VALUES (:first_name, :second_name, :email, :password, :role)";  

            $stmt = $connection->prepare($sql);

            if (!$stmt) {
                echo mysqli_error($connection);
            } else {
                $stmt->bindValue(":first_name", $first_name, PDO::PARAM_STR);
                $stmt->bindValue(":second_name", $second_name, PDO::PARAM_STR);
                $stmt->bindValue(":email", $email, PDO::PARAM_STR);
                $stmt->bindValue(":password", $password, PDO::PARAM_STR);
                $stmt->bindValue(":role", $role, PDO::PARAM_STR);
                
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
                
                return password_verify($log_password, $user["password"]);
            }
        }
        

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

            try {
                if($stmt->execute()){
                    $result = $stmt->fetch();
                    $user_id = $result[0];
    
                    return $user_id;
                } else {
                    throw new Exception("Získanie ID užívatela zlyhalo");
                }
            } catch(Exception $e){
                error_log("Chyba funkcie getUserId\n" , 3 , "../errors/error.log");
                echo "Typ chyby: " . $e->getMessage();
            }

        }}

    public static function getUserRole($connection, $id){
        $sql = "SELECT role FROM user
                WHERE id = :id";

        $stmt = $connection->prepare($sql); 

        if($stmt){
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            try {
                if($stmt->execute()){
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $result["role"];
                } else {
                    throw new Exception("Získanie role užívatela zlyhalo");
                }
            } catch(Exception $e){
                error_log("Chyba funkcie getUserRole\n" , 3 , "../errors/error.log");
                echo "Typ chyby: " . $e->getMessage();
            }

            
    }
    }}