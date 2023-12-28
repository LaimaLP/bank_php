<?php
session_start();

//proceso puslapis, is delete ateina ID kuri norim sunaikinti
$id = $_GET['id'] ?? 0; //pasiimam ta id siunciama

$members = unserialize(file_get_contents(__DIR__.'/data/users.ser')); //jei metodas post, paimam duomenis, isserializuojam

foreach ($members as $index => $member) {
    if ($member['id'] == $id) {
        unset($members[$index]);
        break;
    }
}

file_put_contents(__DIR__ . '/data/users.ser', serialize($members) );
$_SESSION['error'] = "$member[name]'s account was deleted";



header('Location: http://localhost/bank_php/read.php');