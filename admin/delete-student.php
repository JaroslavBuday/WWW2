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
    $conn = $database->connectionDB();

    if($_SERVER["REQUEST_METHOD"]=== "POST"){
        if(Student::deleteStudent($conn, $_GET["id"])){
            Url::redirectUrl("/www2.database/admin/students.php");
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
    <script src="https://kit.fontawesome.com/81e746884d.js" crossorigin="anonymous"></script>
    <title>Zmazať žiaka</title>
</head>
<body>
    <?php require "../assets/admin-header.php"?>
    <main>
        <?php if ($role === "admin"): ?>
            <section class="delete-form">
                <form method="POST">
                    <p>Ste si istý, že chcete tohoto žiaka zmazať?</p>
                    <button>Zmazať</button>
                    <a href="one-student.php?id=<?=$_GET['id'] ?>">Zrušiť</a>
                </form>
            </section>
            <?php else:  ?>
                <section>
                    <h1>Obsah tejto stránky je k dispozícii iba Administrátorom!</h1>
                </section>
            <?php endif ?>
        <?php require "../assets/footer.php"?>
    </main>
    
    
    <script src="../js/header.js"></script>
</body>
</html>

        
