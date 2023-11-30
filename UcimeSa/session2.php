<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cvicny vypis</title>
</head>
<body>
    <?php if ($_SESSION["is_logged"] === true): ?>
        <h1>Vítajte v administrácii</h1>
    <?php else: ?>
        <h1>Nemáte oprávnenie na vstup</h1>
    <?php endif; ?>
    
</body>
</html>