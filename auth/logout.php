<?php
//procecinis puslapis, nko neatvaziduoja, tik klaidai pagauti
session_start();
if ($_SERVER['REQUEST_METHOD'] != 'POST') { //jei nera post metodas, pasirodo klaida
    // show 405 error response
    header('HTTP/1.1 405 Method Not Allowed'); //responso statuso keitimas HTTP..
    exit;
}
if (isset($_SESSION['login']) && $_SESSION['login'] == 'logIn') {
    unset($_SESSION['login']); //viska unsetinam ir mirsta
    unset($_SESSION['name']);
}//jei ir neprisilogine, siunciam kitur
header('Location: http://localhost/bank_php/auth/index.php');
exit;
