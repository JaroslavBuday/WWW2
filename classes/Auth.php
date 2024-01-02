<?php

class Auth {
    /**
     * 
     * Overuje ci je uzivatel prihlaseny alebo nie
     * 
     * @return boolean true pokial je uzivatel prihlasenz inak false
     */

    public static function isLoggedIn(){
        return isset($_SESSION["is_logged_in"]) and $_SESSION["is_logged_in"];
    }
}
