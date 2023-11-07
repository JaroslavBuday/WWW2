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
    
    
    
</body>
</html>

        
