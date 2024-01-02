<?php 
    
    require "../classes/Database.php";
    require "../classes/Student.php";
    require "../classes/Auth.php";

    session_start();

    if (!Auth::isLoggedIn()){
        die("Nepovolený prístup");
    }

    // $connection = connectionDB();
    $database = new Database();
    $connection = $database->connectionDB();


    $students = Student::getAllStudents($connection, "id, first_name, second_name");


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
    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>
</body>
</html>