<?php

/**
 * 
 * Overuje ci je uzivatel prihlaseny alebo nie
 * 
 * @return boolean true pokial je uzivatel prihlasenz inak false
 */

 function isLoggedIn(){
    return isset($_SESSION["is_logged_in"]) and $_SESSION["is_logged_in"];
 }