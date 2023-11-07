<?php
/**
 * Získa jedneho žiaka z databazy podla id
 * 
 * @param object $connection - napojenie na databazu
 * @param integer $id - id jedneho konkretneho ziaka
 * 
 * @return mixed  asociativne pole ktore obsahuje info o jednom konkretnom ziakovi alebo vrati null pokial nenajde ziadneho ziaka
 * 
 */
function getStudent($connection, $id){
    $sql = "SELECT * 
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
           
            if (isset($_SERVER["HTTPS"]) and $_SERVER["HTTPS"] != "off"){
                $url_protocol = "https";
            } else {
                $url_protocol = "http";
            }
            
            header("location: $url_protocol://" . $_SERVER["HTTP_HOST"] . "/www2.database/jeden-ziak.php?id=$id"); 

    
        }
    }
}