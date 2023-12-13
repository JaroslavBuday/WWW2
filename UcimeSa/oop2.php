<?php
/*
--   4 principy OOP --

Zapuzdrenie (Encapsulation)
    -private = atribut a metoda je pristupna iba vo vnutri class
    -public =  atribut a metoda je pristupna aj mimo class, nemusi sa vypisovat je to nastavene vzdy
    -protected = 

Abstrakcia (abstraction)
    -vytvori sa univerzalna class s najdolezitejsimi funkciami ktore sa daju pouzit pri roznych typoch dalsich class. Napr. vlastnosti uctu ktore sa pouzivaju pri roznych typoch uctov napr klasicky, podnikatelsky, sporiaci, ...

Dedičnosť (Inheritance)
    - class berie metody z rodicovskej class. Napr univerzalne vlastnosti uctu do sporiaceho, podnikatelskeho , .. zapis= class podnikatelsky extends univerzal

Polymorfizmus (Polimorphism)
*/

// Logika
class bankAccount {
    private $pin; 
    // public $first_name;
    // public $second_name;
    // public $income;
    // public $expense;
    // public $movements;

    function __construct($first_name, $second_name, $pin){
        $this->first_name = $first_name ;
        $this->second_name = $second_name ;
        $this->pin = $pin;
        $this->income = 0;
        $this->expense = 0;
        $this->movements = [];
    }

    function pin_checker($user_pin){
        if ($user_pin !== $this->pin){
            header("location: http://localhost/www2.database/ucimesa/wrongpin.php");
            exit();
        }
    }
    function create_income($amount){
        $this->income += $amount;
        $this->add_movements($amount);
    }
    function create_expense($amount){
        $this->expense -= $amount;
        $this->add_movements(-$amount);
    }

    private function add_movements($money){
        $this->movements[] = $money;
    }
}

// Použitie
$account1 = new bankAccount("Jaro","Buday",1234);

// echo $account1->first_name;
// echo "<br>";
// echo $account1->second_name;
// $account1->pin_checker(1234);
echo "<br>";
$account1->create_income(50);

$account1->create_expense(30);

$account1->create_income(150);
var_dump($account1->movements);
echo "<br>";

//    ----   DEDICNOST ----

Echo "Dedicnost";echo "<br>";echo "<br>";

class SaveAccount extends bankAccount {
   
}

$account1 = new SaveAccount("Jozko","Varabel",4444);
echo $account1->first_name;