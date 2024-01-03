<?php
session_start();
$id = $_GET['id'] ?? 0;

if (!$id) {
    header('Location: http://localhost/bank_php/index.php');
    exit;
}

$members = unserialize(file_get_contents(__DIR__.'/data/users.ser'));
$money = ($_POST['addMoney'])>0 ?  (int)$_POST['addMoney'] : 0;


foreach ($members as $i => $member) {
    if ($member['id'] == $id) { 
        $member['balance'] =  $member['balance'] + $money; //ji updatinu. isideda stringas, tai prieky dar (int) pridedame. "castingas" irasome ko norime
        $members[$i] = $member;
        break;
    }
}

file_put_contents(__DIR__ . '/data/users.ser', serialize($members));
$_SESSION['success'] = "$money € was added to $member[name]'s account";
header('Location: http://localhost/bank_php/index.php');
exit;