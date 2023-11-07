<?php
    require "assets/database.php";
    require "assets/ziak.php";

    $conn = connectionDB();

    deleteStudent($conn, $_GET["id"]);    
