<?php 
//PODMIENKA ABY - AK JE POLE PRAZDNE NEVYPISOVALO HO DO STRANKY
if ($_SERVER["REQUEST_METHOD"]=== "POST")
{var_dump($_POST);}

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
        <section class="add-form">
            <form action="add-student.php" method="post">
                <input type="text" placeholder="Meno" name="first_name" id=""><br>
                <input type="text" placeholder="Priezvisko" name="second_name" id=""><br>
                <input type="number" placeholder="Vek" min="6" name="age" id=""><br>
                <textarea name="life" placeholder="Podrobnosti o žiakovi" ></textarea><br>
                <input type="text" placeholder="Fakulta" name="college" id="">
                <input type="submit" value="Pridať">
            </form>
        </section>
    </main>
    <?php require "assets/footer.php"; ?>
</body>
</html>