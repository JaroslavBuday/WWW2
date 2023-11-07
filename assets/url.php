<?php

/**
 * Presmerovanie na zadanu url adresu
 * 
 * @param string $path - adresa na ktoru sa ma presmerovat
 * 
 * @return void
 */

 function redirectUrl($path) {
    if (isset($_SERVER["HTTPS"]) and $_SERVER["HTTPS"] != "off"){
        $url_protocol = "https";
    } else {
        $url_protocol = "http";
    }
    
    header("location: $url_protocol://" . $_SERVER["HTTP_HOST"] . $path); 
}
 