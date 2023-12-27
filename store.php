<?php
// veiksmo failas, nieko nerodo, daro
$id = rand(1, 100);
$name = $_POST['name'] ?? 0; //amount ateina is posto
$lastName = $_POST['lastname'] ?? 0; //amount ateina is posto
$number = $_POST['IBAN'] ?? 0; //amount ateina is posto
$personalCode = $_POST['PC'] ?? 0; //amount ateina is posto

$users = unserialize(file_get_contents(__DIR__ . '/data/users.ser'));
$users[] = [
    'id'=> $id, 
    'name'=> $name,
    'lastName'=> $lastName,
    'number'=> $number,
    'personalCode'=> $personalCode,
    'balance' => 0,
];

file_put_contents(__DIR__ . '/data/users.ser', serialize($users) );
header('Location: http://localhost/bank_php/read.php');