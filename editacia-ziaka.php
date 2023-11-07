<?php
    require "assets/database.php";
    require "assets/ziak.php";

    $connection = connectionDB();

    if (isset($_GET["id"]) and is_numeric($_GET["id"])){
        $one_student = getStudent($connection, $_GET["id"]);

        if ($one_student){
            $first_name = $one_student["first_name"];
            $second_name = $one_student["second_name"];
            $age = $one_student["age"];
            $life = $one_student["life"];
            $college = $one_student["college"];
            $id = $one_student["id"];
        } else {
            die("Študent sa nenachádza v databáze !!!");
        }

        
    } else {
        die("ID nezadané !!!");
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
            $first_name = $_POST["first_name"];
            $second_name = $_POST["second_name"];
            $age = $_POST["age"];
            $life = $_POST["life"];
            $college = $_POST["college"];

            $sql = "UPDATE student 
                    SET first_name = ?,
                        second_name= ?,
                        age= ?,
                        life= ?,
                        college= ? 
            WHERE id = ?";

            $stmt = mysqli_prepare($connection, $sql);

                if($stmt === false){
                    echo mysqli_error($connection);
                } else {
                    mysqli_stmt_bind_param($stmt,"ssissi", $first_name, $second_name, $age, $life, $college, $id);

                    if(mysqli_stmt_execute($stmt)){
                        echo "Údaje boli upravené";
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
    
    <?php require "assets/formular-ziak.php"; ?>

    <?php require "assets/footer.php"; ?>
</body>
</html>