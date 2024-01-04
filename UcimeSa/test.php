<?php

//phpinfo();

function string_length($str, $min_length){
    if(strlen($str) < $min_length){
        throw new Exception("Váš text je príliš krátky");
    }
    return true;
}

try {
    string_length("sup", 5);
    echo "Váš text je v poriadku";
} catch (Exception $e) {
    error_log("Chyba krátkeho textu\n", 3, "../errors/error.log");
    // v zatvorke : text chyby , /n znamena na novy riadok vzdy , 3 znamena do mojho suboru, cesta k suboru
    echo $e->getMessage();
}


echo "<br>";
// priklad celociselne delenie - chyby/exception 

try {
    echo intdiv(12,0);
} catch (DivisionByZeroError $e){
    echo "Chyba: " . $e->getMessage();
} finally {
    // toto sa vykona vzdy po try alebo catch
}