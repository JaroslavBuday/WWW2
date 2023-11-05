<?php 

if ($_SERVER["REQUEST_METHOD"]=== "POST"){  

    require "assets/database.php";
      
    $sql = "INSERT INTO student (first_name, second_name, age, life, college)
        VALUES (?,?,?,?,?)";  
        
        $statement = mysqli_prepare($connection, $sql);

        if ($statement === false) {
            echo mysqli_error($connection);
        } else {
            mysqli_stmt_bind_param($statement,"ssiss", $_POST["first_name"], $_POST["second_name"],$_POST["age"], $_POST["life"],$_POST["college"]);

            if(mysqli_stmt_execute($statement)){
                $id = mysqli_insert_id($connection);
                echo "Úspešne vložené, ID žiaka: $id";
            } else {
                echo mysqli_stmt_error($statement);  
            }
        }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require "assets/header.php"; ?>
    <main>
        <section class="add-form">
            <form action="add-student.php" method="post">
                <input type="text" placeholder="Meno" name="first_name" id=""><br>
                <input type="text" placeholder="Priezvisko" name="second_name" id=""><br>
                <input type="number" placeholder="Vek" min="6" name="age" id=""><br>
                <textarea name="life" placeholder="Podrobnosti o žiakovi" ></textarea><br>
                <input type="text" placeholder="Fakulta" name="college" id="">
                <input type="submit" value="Pridať">
            </form>
        </section>
    </main>
    <?php require "assets/footer.php"; ?>
</body>
</html>