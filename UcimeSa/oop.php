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

// Logika defaukt hodnoty
class book {
    function __construct($title, $author, $year, $price){
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->price = $price;
        $this->currency = "Eur";
    }
    }

// pouzitie

$book_1 = new book("Harry Potter a Kameň mudrcov", "J. K. Rowling", 1997, 25);
$book_2 = new book("Harry Potter a Tajomna komnata", "J. K. Rowling", 1998, 30);
$book_3 = new book("Harry Potter a vezeň z Azkabanu","J. K. Rowling", 1999, 35);

echo $book_1->title;
echo $book_1->price;
echo $book_1->currency;
echo "<br>";
echo $book_2->title;
echo $book_2->price;
echo $book_2->currency;
echo "<br>";
echo $book_3->title;
echo $book_3->price;
echo $book_3->currency;
echo "<br>";

class car {
    function __construct($brand,$type,$color){
        $this->brand = $brand;
        $this->type = $type;
        $this->color = $color;
        $this->seats = 5;
    }
}

$car_1 = new car("KIA","Picanto","red");
$car_2 = new car("Skoda","Octavia","White");
$car_3 = new car("Opel","Astra","Blue");

echo $car_1->brand; echo "<br>";
echo $car_2->type; echo "<br>";
echo $car_3->seats; 

