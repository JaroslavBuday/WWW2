<?php
/*
--   4 principy OOP --

Zapuzdrenie (Encapsulation)
    -private = atribut a metoda je pristupna iba vo vnutri class
    -public =  atribut a metoda je pristupna aj mimo class, nemusi sa vypisovat je to nastavene vzdy
    -protected = 

Abstrakcia (abstraction)
Dedičnosť (Inheritance)
Polymorfizmus (Polimorphism)
*/

// Logika
class bankAccount {
    private $pin; 
    // public $first_name;
    // public $second_name;
    // public $income;
    // public $expense;

    function __construct($first_name, $second_name, $pin){
        $this->first_name = $first_name ;
        $this->second_name = $second_name ;
        $this->pin = $pin;
        $this->income = 0;
        $this->expense = 0;
    }

    function pin_checker($user_pin){
        if ($user_pin !== $this->pin){
            header("location: http://localhost/www2.database/ucimesa/wrongpin.php");
            exit();
        }
    }
    function create_income($amount){
        $this->income += $amount;
    }
    function create_expense($amount){
        $this->expense -= $amount;
    }
}

// Použitie
$account1 = new bankAccount("Jaro","Buday",1234);

echo $account1->first_name;
echo "<br>";
echo $account1->second_name;
$account1->pin_checker(1234);
echo "<br>";
$account1->create_income(50);
echo "Príjem: " . $account1->income;
echo "<br>";
$account1->create_expense(30);
echo "Výdaj: " . $account1->expense;
echo "<br>";
echo "Zostatok na účte: " . $account1->income - $account1->expense;
