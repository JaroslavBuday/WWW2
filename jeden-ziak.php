<?php 
        $db_host = "localhost";
        $db_user = "test";
        $db_password = "admin1234";
        $db_name = "skola";

        $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

        if(mysqli_connect_error()){
            echo mysqli_connect_error();
            exit;
        }
        
        $sql = "SELECT * 
                FROM student
                WHERE id = 1";
        
         $result = mysqli_query($connection, $sql); 
            
         if ($result === false) {
            echo mysqli_error($connection);
        } else {
            $students = mysqli_fetch_assoc($result);
        }
            
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
    <header>
        <h1>Informácie o žiakovi</h1>
    </header>
    <main>

    </main>
    <footer>

    </footer>
    
</body>
</html>