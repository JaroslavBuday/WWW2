<?php

// Objektovo orientovane programovanie OOP
// kratsie, prehladnejsie, zrozumitelnejsie

// asociativne pole
/*
$book1 = [
    "title" => "Harry a Kameň mudrcov",
    "author" => "J. K. Rowling",
    "year" => 1997,
];

$book2 = [
    "title" => "Harry a Tajomná komnata",
    "author" => "J. K. Rowling",
    "year" => 1998,
];

echo $book1["title"];
*/

// Logika /default hodnoty/ atribut (premenna), metoda (funkcia)
class book {
    function __construct($title, $author, $year, $price){ //atribut
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->price = $price;
        $this->currency = "Eur";
    }

    function bookDescription(){ //metoda
        return "Názov knihy: " . $this->title . "<br>Autor: " . $this->author . "<br>Rok vydania: " . $this->year . "<br>Cena: " . $this->price . " " . $this->currency . "<br>";
    }

    function changePriceAmount($amount){
        // $this->price = $this->price + $amount;
        $this->price += $amount; //skrateny zapis
    }

    function changePricePercentage($percentage){
        // $this->price = $this->price + ($this->price / 100 * $percentage);
        $this->price += ($this->price / 100 * $percentage);
    }
    }

// pouzitie

$book_1 = new book("Harry Potter a Kameň mudrcov", "J. K. Rowling", 1997, 25);
$book_2 = new book("Harry Potter a Tajomna komnata", "J. K. Rowling", 1998, 30);
$book_3 = new book("Harry Potter a vezeň z Azkabanu","J. K. Rowling", 1999, 35);

echo $book_1->bookDescription();

$book_1->changePriceAmount(5);
echo "Zmena ceny o čiastku: " . $book_1->price . " " . $book_1->currency . "<br>";
$book_1->changePricePercentage(10);
echo "Zmena ceny percentuálna: " . $book_1->price . " " . $book_1->currency . "<br>";




