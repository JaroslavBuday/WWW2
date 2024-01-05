<?php 
        
        require "../classes/Database.php";
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
            $students = Student::getStudent($connection, $_GET["id"]);
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
    <link rel="stylesheet" href="../css/admin-one-student.css">
    <script src="https://kit.fontawesome.com/81e746884d.js" crossorigin="anonymous"></script>
    
    <title>Document</title>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>
    <main>
        <!-- <section class="main-heading">
            <h1>Informácie o žiakovi</h1>
        </section> -->
        <section class="one-student">
            
            <?php if ($students === null): ?>
                <p>Žiak nefiguruje v databáze</p>
            <?php else: ?>
                <div class="one-student-box">
                    <h2><?= htmlspecialchars($students["first_name"])." ".htmlspecialchars($students["second_name"])  ?></h2>
                    <p>Vek: <?= htmlspecialchars($students["age"])?> </p>
                    <p>Dodatočné informácie: <?= htmlspecialchars($students["life"])?> </p>
                    <p>Fakulta: <?= htmlspecialchars($students["college"])?> </p>
                </div>
                <?php if ($role === "admin"): ?>
                    <div class="one-student-buttons">
                        <a class="edit-one-student" href="edit-student.php?id=<?= $students['id']?>">Editovať</a>
                        <a class="delete-one-student" href="delete-student.php?id=<?= $students['id']?>">Zmazať</a>
                    </div>
                <?php endif ?>
            <?php endif ?>
        </section>
        
        
    </main>
    
    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>
</body>
</html>