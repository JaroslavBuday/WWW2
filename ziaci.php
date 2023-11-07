<?php 
    require "assets/database.php";

    $connection = connectionDB();

    //NASTAVENIE SQL DOTAZU
        $sql = "SELECT * 
                FROM student
                ORDER BY id ASC";
            // echo "<br>";

    // ODOSLANIE DOTAZU DO DATABAZY-VRATI OBJEKT
        $result = mysqli_query($connection, $sql); 
            // var_dump($result);
            // echo "<br>";
            // echo "<br>";

    // PREHODIM SI OBJEKT NA ASOCIATIVNE POLE
        $students = mysqli_fetch_all($result, MYSQLI_ASSOC); 
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
            <h1>Zoznam žiakov školy</h1>
        </section>
        <section class="students-list">
            <?php if(empty($students)):    ?>
                <p>Žiadny žiaci v databáze</p>
            <?php else:  ?>
                <ul>
                    <?php foreach($students as $one_student): ?>
                        <li>
                            <?php echo htmlspecialchars($one_student["first_name"]). " ".htmlspecialchars($one_student["second_name"]) ?>
                        </li>
                        <a href="jeden-ziak.php?id=<?= $one_student['id']?> ">Viac informácií</a>
                    <?php endforeach; ?>
                </ul>

            <?php endif; ?>
        </section>
        
    </main>
    <?php require "assets/footer.php"; ?>

</body>
</html>