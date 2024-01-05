<?php

$roleForHeader = $_SESSION["role"];

?>

<header>
    <div class="logo">
        <a href="../index.php">
            <img src="../img/hogwarts-logo.png" alt=""></a>
        
    </div>
    <nav class="navMenu">
        <ul>
            <li><a href="./students.php">Zoznam žiakov</a></li>
            <?php if ($roleForHeader === "admin"): ?>
                <li><a href="./photos.php">Fotky</a></li>
            <?php endif ?>
            <li><a href="./add-student.php">Pridať žiaka</a></li>
            <li><a href="./log-out.php">Odhlásiť</a></li>
        </ul>
    </nav>
    <div class="menu-icon">
    <i class="fa-solid fa-bars"></i>
    
    </div>
</header>
