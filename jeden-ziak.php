<?php 
        require "assets/database.php";
        
        if (isset($_GET["id"]) and is_numeric($_GET["id"])){
        $sql = "SELECT * 
                FROM student
                WHERE id = ".$_GET["id"];
        
         $result = mysqli_query($connection, $sql); 
            
         if ($result === false) {
            echo mysqli_error($connection);
        } else {
            $students = mysqli_fetch_assoc($result);
        }}
            
        // var_dump($students);
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
        <section class="main-heading">
            <h1>Informácie o žiakovi</h1>
        </section>
        <section>
            <a href="ziaci.php">Zoznam žiakov</a>
            <?php if ($students === null): ?>
                <p>Žiak nefiguruje v databáze</p>
            <?php else: ?>
                <h2><?= $students["first_name"]." ".$students["second_name"]  ?></h2>
                <p>Vek: <?= $students["age"]?> </p>
                <p>Dodatočné informácie: <?= $students["life"]?> </p>
                <p>Fakulta: <?= $students["college"]?> </p>
            <?php endif ?>
        </section>
        
    </main>
    
    <?php require "assets/footer.php"; ?>
    
</body>
</html>