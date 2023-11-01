<?php 
    // NASTAVENIE - PRIHLASOVACIE UDAJE
        $db_host = "localhost";  //pokial by nesiel localhost tak 127.0.0.1
        $db_user = "test";
        $db_password = "admin1234";
        $db_name = "skola";

    // NASTAVENIE DATABAZOVEHO SPOJENIA
        $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    // KONTROLA CI NIE JE NEJAKA CHYBA
        if(mysqli_connect_error()){
            echo mysqli_connect_error();
            exit;
        }
        // echo "Úspešné prihlásenie do databázy";

    //NASTAVENIE SQL DOTAZU
        $sql = "SELECT * 
                FROM student
                ORDER BY first_name ASC";
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
    <a href="index.php">Úvodná strana</a>
    <h1>Zoznam žiakov školy</h1>
    <?php if(empty($students)):    ?>
        <p>Žiadny žiaci v databáze</p>
    <?php else:  ?>
        <ul>
            <?php foreach($students as $one_student): ?>
                <li>
                    <?php echo $one_student["first_name"]. " ".$one_student["second_name"] ?>
                </li>
                <a href="jeden-ziak.php?id=<?= $one_student['id']?> ">Viac informácií</a>
            <?php endforeach; ?>
        </ul>

    <?php endif; ?>

</body>
</html>