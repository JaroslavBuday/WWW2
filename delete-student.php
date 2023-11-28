<?php
    require "assets/database.php";
    require "assets/ziak.php";

    $conn = connectionDB();

    if($_SERVER["REQUEST_METHOD"]=== "POST"){
        deleteStudent($conn, $_GET["id"]);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./query/header-query.css">
    <script src="https://kit.fontawesome.com/81e746884d.js" crossorigin="anonymous"></script>
    <title>Zmazať žiaka</title>
</head>
<body>
    <?php require "assets/header.php"?>
    <main>
        <section class="delete-form">
            <form method="POST">
                <p>Ste si istý, že chcete tohoto žiaka zmazať?</p>
                <button>Zmazať</button>
                <a href="jeden-ziak.php?id=<?=$_GET['id'] ?>">Zrušiť</a>
            </form>
        </section>
        <?php require "assets/footer.php"?>
    </main>
    
    
    <script src="./js/header.js"></script>
</body>
</html>

        
