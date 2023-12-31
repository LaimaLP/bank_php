<?php
session_start();
$id = $_GET['id'] ?? 0;

if (!$id) {
    header('Location: http://localhost/bank_php/index.php');
    exit;
}

$members = unserialize(file_get_contents(__DIR__ . '/data/users.ser'));
$money = ($_POST['withdraw']) > 0 ?  (float)$_POST['withdraw'] : 0;

if (is_numeric($_POST['withdraw']) && $_POST['addMoney'] >= 0) {
    foreach ($members as $i => $member) {
        if ($member['id'] == $id) {
            if ($member['balance'] >= $money) {
                $member['balance'] =  $member['balance'] - $money; //ji updatinu. isideda stringas, tai prieky dar (int) pridedame. "castingas" irasome ko norime
                $members[$i] = $member;
                break;
            } else {
                $_SESSION['error'] = "Cannot withdraw $money € from $member[name]'s account. Maximal ammount $member[balance] €.";
                header('Location: http://localhost/bank_php/index.php');
                exit;
            }
        }
    }
} else {
    $_SESSION['error'] = "Input must be a number and more than 0";
    header("Location: http://localhost/bank_php/withdraw.php?id=$id");
    exit;
}

file_put_contents(__DIR__ . '/data/users.ser', serialize($members));
$_SESSION['success'] = "$money € was withdrawed from $member[name]'s account.";
header('Location: http://localhost/bank_php/index.php');
exit;
