<?php

require "../classes/Database.php";
require "../classes/Auth.php";
require "../classes/Image.php";


session_start();

// overenie prihlaseneho uzivatela
if (!Auth::isLoggedIn()){
    die("Nepovolený prístup");
}

$db = new Database();
$connection = $db->connectionDB();

$user_id = $_SESSION["logged_in_user_id"];  // id prihlaseneho uzivatela

$allImages = Image::getImageByUserId($connection, $user_id);
// var_dump($allImages);

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
        <section class="upload-photos">
            <h1>Fotky</h1>
            <form action="upload-photos.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" require>
                <input type="submit" name="submit" value="Nahrať obrázok">
            </form>
        </section>

        <section class="images">
            <article>
                <?php foreach($allImages as $one_image): ?>
                    <div>
                        <div>
                            <img src=<?= "../uploads/" . $user_id . "/" . $one_image["image_name"] ?> alt="">
                        </div>
                        <div>
                            <a href="<?= "../uploads/" . $user_id . "/" . $one_image["image_name"] ?>" download="Picture">Stiahnuť</a>
                            <a href="delete-image.php?id=<?= $user_id?>&image_name=<?= $one_image["image_name"]?>">Zmazať</a>

                        </div>

                    </div>
                    

                <?php endforeach; ?>
            </article>
        </section>

    </main>

    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>
</body>
</html>