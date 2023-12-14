<?php

class bankAccount {
    private $pin; 
    private $balance;
    

    function __construct($first_name, $second_name, $pin){
        $this->first_name = $first_name ;
        $this->second_name = $second_name ;
        $this->setPin($pin);
        $this->balance = 50; // napr ciastka pri zalozeni uctu 50eur 
        }
// setter - sluzi k tomu aby este pred nastavenim nieco urobil v tomto pripade pred nastavenim pin skontroluje aby bol 4miestny
    public function setPin($user_pin){
        if (strlen(strval($user_pin)) === 4){
            $this->pin = $user_pin; 
        } else {
            throw new Exception("Neplatný pin!");
        }
    }

// Getter - dokaze zobrazit private atribut ale neda sa menit jeho hodnota 
    public function getBalance(){
        return $this->balance;
    }
}
// Použitie
    $account1 = new bankAccount("Jaro","Buday",1234);
    echo $account1->getBalance();


// Konštanta - pise sa velkym!!! najprv meno konstanty a potom hodnota

    define("FIRST_NAME", "Jaro"); // prva moznost zapisu konstanty
    echo FIRST_NAME;

    const SECOND_NAME = "Buday"; // alebo tento zapis ako v JS
    echo SECOND_NAME;

    // pouzitie napr.- minimalna cena v obchode aby si nesiel do straty