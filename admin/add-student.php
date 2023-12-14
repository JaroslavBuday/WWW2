<?php 
// require "../assets/database.php";
require "../assets/url.php";
require "../assets/ziak.php";
require "../assets/auth.php";
require "./classes/Database.php";

session_start();

if (!isLoggedIn()){
    die("Nepovolený prístup");
}

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

    // $connection = connectionDB();
    $database = new Database();
    $connection = $database->connectionDB();


    $id = createStudent($connection, $first_name, $second_name, $age, $life, $college);
    if($id){
        redirectUrl("/www2.database/admin/jeden-ziak.php?id=$id");
    } else {
        echo "Žiaka sa nepodarilo vytvoriť";
    }
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
    <script src="https://kit.fontawesome.com/81e746884d.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>
    
    <main>
        <section class="add-form">
            <?php require "../assets/formular-ziak.php"; ?>
        </section>
        <section class="home">
            <br>
            
        </section>
        
    </main>
    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>
</body>
</html>