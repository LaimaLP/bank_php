<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = file_get_contents(__DIR__ . '/data/users.ser');
    $users = unserialize($users);
}

$user = [
    'name' => $_POST['name'],
    'lastname' => $_POST['lastname'],
    'IBAN' => $_POST['IBAN'],
    'PC' => $_POST['PC'],

];
$users[] = $user;
file_put_contents(__DIR__ . '/data/users.ser', serialize($users));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Account</title>
</head>

<body>
    <h1> Headeris: meniu su nuorodomis </h1>
    <h1>New Account </h1>
    <form action="" method="post">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="lastname" placeholder="lastname">
        <input type="text" name="IBAN" placeholder="LT01 1111 1111 1111 1111">
        <input type="text" name="PC" placeholder="11111111111">
        <button type="submit">Create account</button>
    </form>
    <p> <?php $_POST['name']  ?> </p>
    <p> <?php $_POST['lastname'] ?> </p>
    <p> <?php $_POST['IBAN'] ?> </p>

    <p> <?php $_POST['PC'] ?> </p>

</body>

</html>






<!-- Naujos sąskaitos sukūrimas (įvedami duomenys: vardas, pavardė, sąskaitos numeris, asmens kodas) -->