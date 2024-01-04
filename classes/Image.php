<?php

class Image {
    public static function insertImage($conn, $user_id, $image_name){
        $sql = "INSERT INTO image (user_id, image_name)
        VALUES (:user_id, :image_name)";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":user_id" , $user_id, PDO::PARAM_INT);
        $stmt->bindValue(":image_name" , $image_name, PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        }
    }

    public static function getImageByUserId($conn, $user_id){  //v264

        $sql = "SELECT image_name
        FROM image
        where user_id = :user_id";
    
        $stmt = $conn->prepare($sql);
    
        $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
    
        $stmt->execute();
    
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $images;
    }

    public static function deleteImageFromDirectory($path){  //v268
        try {
            //kontrola existencie obrazku
            if(!file_exists($path)){
                throw new Exception("Súbor neexistuje");
            }

            // zmazanie obrazku
            if(unlink($path)){
                return true;
            } else {
                throw new Exception("Pri mazaní súboru došlo k chybe");
            }
        } catch (Exception $e) {
            error_log("Chyba pri mazaní obrázku\n", 3, "../errors/error.log");
            echo "Chyba: " . $e->getMessage();
        }
    }

    public static function deleteImageFromDatabase($conn, $image_name){
        $sql = "DELETE FROM image
                WHERE image_name = :image_name";

        $stmt = $conn->prepare($sql);

        try {
            $stmt->bindValue(":image_name", $image_name, PDO::PARAM_STR);

            if (!$stmt->execute()){
                throw new Exception("Obrázok sa nepodarilo zmazať z databázy");
            }
        } catch (Exception $e) {
            echo "Chyba: " . $e->getMessage();
        }
    }
}

