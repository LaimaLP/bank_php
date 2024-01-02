<?php
session_start();
$id = $_GET['id'] ?? 0;

if (!$id) {
    header('Location: http://localhost/bank_php/index.php');
    exit;
}

$members = unserialize(file_get_contents(__DIR__ . '/data/users.ser'));

foreach ($members as $i => $member) {
    if ($member['id'] == $id) { //susirandu ta boxa
        if ($member['balance'] >= $_POST['debitMoney']) {
            $member['balance'] =  $member['balance'] - $_POST['debitMoney']; //ji updatinu. isideda stringas, tai prieky dar (int) pridedame. "castingas" irasome ko norime
            $members[$i] = $member;
            break;
        } else {
            $_SESSION['error'] = "Cannot withdraw $_POST[debitMoney] € from $member[name]'s account. Maximal ammount $member[balance] €.";
            header('Location: http://localhost/bank_php/index.php');
            exit;
        }
    }
}

file_put_contents(__DIR__ . '/data/users.ser', serialize($members));
$_SESSION['error'] = "$_POST[debitMoney] € was debit from $member[name]'s account.";

header('Location: http://localhost/bank_php/index.php');
exit;