<?php
/**
 * Popis studenta
 * 
 * @param string $first_name - meno študenta
 * @param string $second_name - priezvisko študenta
 * @param integer $age - vek študenta
 * 
 * Vypíše popis študenta
 */

 
// Vytvorenie funkcie - parametre
function studentDescription($first_name, $second_name, $age){
    echo "Toto je " . $first_name . " " . $second_name . " a je mu/jej " . $age . " rokov.";
    echo "<br>";
}

// pouzitie funkcie - argumenty
studentDescription("Harry", "Potter", 15);
studentDescription("Hermiona", "Grangerova", 12);