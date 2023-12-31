<?php
    
    require "../classes/Database.php";
    require "../classes/Url.php";
    require "../classes/Student.php";
    require "../classes/Auth.php";

    session_start();

    if (!Auth::isLoggedIn()){
        die("Nepovolený prístup");
    }

    $role = $_SESSION["role"];
    
    $database = new Database();
    $connection = $database->connectionDB();


    if (isset($_GET["id"]) and is_numeric($_GET["id"])){
        $one_student = Student::getStudent($connection, $_GET["id"]);

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

            if(Student::updateStudent($connection, $first_name, $second_name, $age, $life, $college, $id)){
                Url::redirectUrl("/www2.database/admin/one-student.php?id=$id");
            };

            
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../query/header-query.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/admin-edit-student.css">
    <link rel="stylesheet" href="../query/admin-edit-student-query.css">
    <script src="https://kit.fontawesome.com/81e746884d.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>
    
    <main>
        <?php 
            if ($role === "admin"){
                require "../assets/form-student.php";
                } else {
                    echo "<h1>Obsah tejto stránky je k dispozícii iba Administrátorom!</h1>";
                }
        ?>

    </main>
    
    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>
</body>
</html>