<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./query/header-query.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script src="https://kit.fontawesome.com/81e746884d.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php require "assets/header.php"; ?>

    <main>
        <section class="registration-form">
            <form action="./admin/after-registration.php" method="post">
                <input type="text" name="first-name" placeholder="Meno" id=""><br>
                <input type="text" name="second-name" placeholder="Priezvisko" id=""><br>
                <input type="email" name="email" placeholder="Email" id=""><br>
                <input type="password" name="password" placeholder="Heslo" id=""><br>
                <input type="password" name="password-again" placeholder="Heslo znovu" id=""><br>
                <input type="submit" value="Zaregistrovať">
            </form>
        </section>

    </main>

    <?php require "assets/footer.php"; ?>
    <script src="./js/header.js"></script>
</body>
</html>