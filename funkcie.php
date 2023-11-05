<!-- cvicny subor -->

<?php
/**
 * Popis studenta
 * 
 * @param string $first_name - meno študenta
 * @param string $second_name - priezvisko študenta
 * @param integer $age - vek študenta
 * 
 * @return string popis študenta
 */

 
// Vytvorenie funkcie - parametre
function studentDescription($first_name, $second_name, $age){
    return "Toto je " . $first_name . " " . $second_name . " a je mu/jej " . $age . " rokov.<br>";
    }

// pouzitie funkcie - argumenty
echo studentDescription("Harry", "Potter", 15);
echo studentDescription("Hermiona", "Grangerova", 12);
$student = studentDescription("Ron","Weasley",15) ;
echo $student;