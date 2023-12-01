<?php

require "url.php";

/**
 * Získa jedneho žiaka z databazy podla id
 * 
 * @param object $connection - napojenie na databazu
 * @param integer $id - id jedneho konkretneho ziaka
 * 
 * @return mixed  asociativne pole ktore obsahuje info o jednom konkretnom ziakovi alebo vrati null pokial nenajde ziadneho ziaka
 * 
 */
function getStudent($connection, $id, $columns = "*"){
    $sql = "SELECT $columns 
            FROM student
            WHERE id = ?";     
            
    $stmt = mysqli_prepare($connection, $sql);

    if($stmt === false) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt,"i", $id);

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            return mysqli_fetch_array($result, MYSQLI_ASSOC);
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
 * @return void - nevracia ziadnu hodnotu
 */
function updateStudent($connection, $first_name, $second_name, $age, $life, $college, $id){
    $sql = "UPDATE student 
                    SET first_name = ?,
                        second_name= ?,
                        age= ?,
                        life= ?,
                        college= ? 
            WHERE id = ?";

    $stmt = mysqli_prepare($connection, $sql);

    if(!$stmt){
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt,"ssissi", $first_name, $second_name, $age, $life, $college, $id);

        if(mysqli_stmt_execute($stmt)){

            redirectUrl("/www2.database/admin/jeden-ziak.php?id=$id");
           
        }
    }
}

/**
 * Vymaze ziaka z databazy
 * 
 * @param object $connection - napojenie na databazu
 * @param integer $id - id ziaka
 * 
 * @return void
 */

function deleteStudent($connection, $id){
    $sql = "DELETE 
            FROM student        
            WHERE id = ?"; 
        
    $stmt = mysqli_prepare($connection, $sql);

    if(!$stmt){
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt,"i", $id);

        if (mysqli_stmt_execute($stmt)){
            redirectUrl("/www2.database/admin/ziaci.php");
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

 function getAllStudents(object $conn, $columns = "*"){
    //NASTAVENIE SQL DOTAZU
        $sql = "SELECT $columns 
        FROM student";

    // ODOSLANIE DOTAZU DO DATABAZY-VRATI OBJEKT
        $result = mysqli_query($conn, $sql); 

    // PREHODIM SI OBJEKT NA ASOCIATIVNE POLE
    if (!$result){
        echo mysqli_error($conn);
    } else {
        $students = mysqli_fetch_all($result, MYSQLI_ASSOC); 
        return $students;
    }
}
    
/**
 * Prida ziaka do databazy a presmeruje nas na profil ziaka
 * 
 * @param object $connection - napojenie na databazu
 * @param string $first_name - meno
 * @param string $second_name - priezvisko
 * @param integer $age - vek
 * @param string $life - informacie o ziakovi
 * @param string $college - fakulta
 * 
 * @return void
 */
function createStudent($connection, $first_name, $second_name, $age, $life, $college){
    $sql = "INSERT INTO student (first_name, second_name, age, life, college)
        VALUES (?,?,?,?,?)";  

        $statement = mysqli_prepare($connection, $sql);

        if (!$statement) {
            echo mysqli_error($connection);
        } else {
            mysqli_stmt_bind_param($statement,"ssiss", $first_name, $second_name,$age, $life,$college);

            if(mysqli_stmt_execute($statement)){
                $id = mysqli_insert_id($connection);
                

            redirectUrl("/www2.database/admin/jeden-ziak.php?id=$id");
            } else {
                echo mysqli_stmt_error($statement);  
            }
        }
}