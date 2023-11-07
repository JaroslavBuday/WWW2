<?php 
require "assets/database.php";
require "assets/url.php";

$first_name = null;
$second_name = null;
$age = null;
$life = null;
$college = null;

if ($_SERVER["REQUEST_METHOD"]=== "POST"){  

    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $age = $_POST["age"];
    $life = $_POST["life"];
    $college = $_POST["college"];

    $sql = "INSERT INTO student (first_name, second_name, age, life, college)
        VALUES (?,?,?,?,?)";  

        $connection = connectionDB();
        
        $statement = mysqli_prepare($connection, $sql);

        if ($statement === false) {
            echo mysqli_error($connection);
        } else {
            mysqli_stmt_bind_param($statement,"ssiss", $_POST["first_name"], $_POST["second_name"],$_POST["age"], $_POST["life"],$_POST["college"]);

            if(mysqli_stmt_execute($statement)){
                $id = mysqli_insert_id($connection);
                

            redirectUrl("/www2.database/jeden-ziak.php?id=$id");
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
            <?php require "assets/formular-ziak.php"; ?>
        </section>
        <section class="home">
            <br>
            
        </section>
        
    </main>
    <?php require "assets/footer.php"; ?>
</body>
</html>