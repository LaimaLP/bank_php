<?php
session_start();
require __DIR__ . '../menu.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $getUsers = file_get_contents(__DIR__ . '/seeder/users.ser');
    $usersData = unserialize($users);
}

// $user = [
//     'name' => $_POST['name'],
//     'lastname' => $_POST['lastname'],
//     'IBAN' => $_POST['IBAN'],
//     'PC' => $_POST['PC'],

// ];
// $users[] = $user;
// file_put_contents(__DIR__ . '/data/users.ser', serialize($users));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>New Account</title>
</head>

<body>
    <?= $menu ?>
 
    <form class="accountForm" action="addNewAccount" method="post">
    <h2>Create New Account </h2>
    <div class="accountInput">
        <label for="name">First Name:</label>
        <input type="text" id="name" name="name">
    </div>
    <div  class="accountInput">
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname">
    </div>
    <div  class="accountInput">
        <label for="IBAN">IBAN:</label>
        <input type="text" id="IBAN" name="IBAN">
    </div>
    <div  class="accountInput">
        <label for="PC">Personal Code:</label>
        <input type="text" id="PC" name="PC">
    </div>
    <button type="submit">Create account</button>
</form>
</body>

</html>






<!-- Naujos sąskaitos sukūrimas (įvedami duomenys: vardas, pavardė, sąskaitos numeris, asmens kodas) -->