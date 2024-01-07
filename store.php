<?php
session_start();
//procesas,  post sita forma
require __DIR__ .'/functions.php';
// veiksmo failas
$members = unserialize(file_get_contents(__DIR__ . '/data/users.ser')); //jei metodas post, paimam duomenis, isserializuojam

newMemberSamePersonalCodeValidation($members);

nameLengthValidation($_POST);

personalCodeValidation($_POST['PC']);

createNewAccount($members);

