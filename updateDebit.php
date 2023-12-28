<?php
session_start();
$id = $_GET['id'] ?? 0;

if (!$id) {
    header('Location: http://localhost/bank_php/read.php');
    exit;
}

$members = unserialize(file_get_contents(__DIR__.'/data/users.ser'));

foreach ($members as $i => $member) {
    if ($member['id'] == $id) { //susirandu ta boxa
        $member['balance'] =  $member['balance'] - $_POST['debitMoney']; //ji updatinu. isideda stringas, tai prieky dar (int) pridedame. "castingas" irasome ko norime
        $members[$i] = $member;
        break;
    }
}

file_put_contents(__DIR__ . '/data/users.ser', serialize($members) );
$_SESSION['error'] = "$_POST[debitMoney] € was debit from $member[name]'s account.";

header('Location: http://localhost/bank_php/read.php');