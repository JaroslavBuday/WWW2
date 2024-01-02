<?php

class Student{
/**
     * Získa jedneho žiaka z databazy podla id
     * 
     * @param object $connection - napojenie na databazu
     * @param integer $id - id jedneho konkretneho ziaka
     * 
     * @return mixed  asociativne pole ktore obsahuje info o jednom konkretnom ziakovi alebo vrati null pokial nenajde ziadneho ziaka
     * 
     */
    public static function getStudent($connection, $id, $columns = "*"){
        $sql = "SELECT $columns 
                FROM student
                WHERE id = :id";     
                
        $stmt = $connection->prepare($sql);

        if($stmt === false) {
            echo mysqli_error($connection);
        } else {
            // mysqli_stmt_bind_param($stmt,"i", $id);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetch();
            } 
        }
    }

    /**
     * Updatuje informacie ziaka v databaze
     * 
     * @param object $connection - napojenie na databazu
     * @param string $first_name - meno
     * @param string $second_name - priezvisko
     * @param integer $age - vek
     * @param string $life - informacie o ziakovi
     * @param string $college - fakulta
     * @param integer $id - id ziaka
     * 
     * @return boolean true - pokial update prebehne v poriadku
     */
    public static function updateStudent($connection, $first_name, $second_name, $age, $life, $college, $id){
        $sql = "UPDATE student 
                        SET first_name = :first_name,
                            second_name= :second_name,
                            age= :age,
                            life= :life,
                            college= :college 
                WHERE id = :id";

        $stmt = $connection->prepare($sql);

        if(!$stmt){
            echo mysqli_error($connection);
        } else {
            
            $stmt->bindValue(":first_name", $first_name, PDO::PARAM_STR);
            $stmt->bindValue(":second_name", $second_name, PDO::PARAM_STR);
            $stmt->bindValue(":age", $age, PDO::PARAM_INT);
            $stmt->bindValue(":life", $life, PDO::PARAM_STR);
            $stmt->bindValue(":college", $college, PDO::PARAM_STR);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            if($stmt->execute()){
                return true;
                        
            }
        }
    }

    /**
     * Vymaze ziaka z databazy
     * 
     * @param object $connection - napojenie na databazu
     * @param integer $id - id ziaka
     * 
     * @return boolean true - pokial pride k uspesnemu vymazaniu ziaka
     */

     public static function deleteStudent($connection, $id){
        $sql = "DELETE 
                FROM student        
                WHERE id = :id"; 
            
        $stmt = $connection->prepare($sql);

        if(!$stmt){
            echo mysqli_error($connection);
        } else {
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            if ($stmt->execute()){
                return true;
                
            }
        }
    }

    /**
     * Vrati ziakov z databazy
     * 
     * @param object $conn - pripojenie do databazy
     *  
     * @return array pole objektov kde kazde pole je jeden ziak
     * */

     public static function getAllStudents(object $connection, $columns = "*"){
        //NASTAVENIE SQL DOTAZU
            $sql = "SELECT $columns 
            FROM student";
            
            $stmt = $connection->prepare($sql);

        if($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // // PREHODIM SI OBJEKT NA ASOCIATIVNE POLE
        // if (!$result){
        //     echo mysqli_error($conn);
        // } else {
        //     $students = mysqli_fetch_all($result, MYSQLI_ASSOC); 
        //     return $students;
        // }
    }
        
    /**
     * Prida ziaka do databazy 
     * 
     * @param object $connection - napojenie na databazu
     * @param string $first_name - meno
     * @param string $second_name - priezvisko
     * @param integer $age - vek
     * @param string $life - informacie o ziakovi
     * @param string $college - fakulta
     * 
     * @return integer $id - id pridaneho ziaka
     */
    public static function createStudent($connection, $first_name, $second_name, $age, $life, $college){
        $sql = "INSERT INTO student (first_name, second_name, age, life, college)
            VALUES (:first_name, :second_name, :age, :life, :college)";  

            $stmt = $connection->prepare($sql);

            if (!$stmt) {
                echo mysqli_error($connection);
            } else {
                $stmt->bindValue(":first_name", $first_name, PDO::PARAM_STR);
                $stmt->bindValue(":second_name", $second_name, PDO::PARAM_STR);
                $stmt->bindValue(":age", $age, PDO::PARAM_INT);
                $stmt->bindValue(":life", $life, PDO::PARAM_STR);
                $stmt->bindValue(":college", $college, PDO::PARAM_STR);
                
                if($stmt->execute()){
                    $id = $connection->lastInsertId();
                    return $id;

                
                } else {
                    echo mysqli_stmt_error($statement);  
                }
            }
    }
}
    