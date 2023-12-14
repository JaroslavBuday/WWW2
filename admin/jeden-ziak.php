<?php 
        // require "../assets/database.php";
        require "../assets/ziak.php";
        require "../assets/auth.php";
        require "./classes/Database.php";

        session_start();
    
        if (!isLoggedIn()){
            die("Nepovolený prístup");
        }

        // $connection = connectionDB();
        $database = new Database();
        $connection = $database->connectionDB();

        
        if (isset($_GET["id"]) and is_numeric($_GET["id"])){
            $students = getStudent($connection, $_GET["id"]);
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
        <section class="main-heading">
            <h1>Informácie o žiakovi</h1>
        </section>
        <section>
            
            <?php if ($students === null): ?>
                <p>Žiak nefiguruje v databáze</p>
            <?php else: ?>
                <h2><?= htmlspecialchars($students["first_name"])." ".htmlspecialchars($students["second_name"])  ?></h2>
                <p>Vek: <?= htmlspecialchars($students["age"])?> </p>
                <p>Dodatočné informácie: <?= htmlspecialchars($students["life"])?> </p>
                <p>Fakulta: <?= htmlspecialchars($students["college"])?> </p>
            <?php endif ?>
        </section>
        <section class="buttons">
            <a href="editacia-ziaka.php?id=<?= $students['id']?>">Editovať</a>
            <a href="delete-student.php?id=<?= $students['id']?>">Zmazať</a>
        </section>
        
    </main>
    
    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>
</body>
</html>