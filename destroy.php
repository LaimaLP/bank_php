<?php
session_start();

//proceso puslapis, is delete ateina ID kuri norim sunaikinti
$id = $_GET['id'] ?? 0; //pasiimam ta id siunciama

$members = unserialize(file_get_contents(__DIR__ . '/data/users.ser')); //jei metodas post, paimam duomenis, isserializuojam

foreach ($members as $i => $member) {
    if ($member['id'] == $id) {
        if ($member['balance'] == 0) {
            unset($members[$i]);
            break;
        } else if($member['balance'] > 0) {
            $_SESSION['error'] = "$member[name]'s account can't be deleted. Account balance: $member[balance] €";
            header('Location: http://localhost/bank_php/index.php');
            exit;
        }
    }
}

file_put_contents(__DIR__ . '/data/users.ser', serialize($members));
$_SESSION['success'] = "$member[name]'s account was deleted";

header('Location: http://localhost/bank_php/index.php');
exit;