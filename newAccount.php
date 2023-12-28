<?php
session_start();
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
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
    <?= require __DIR__ . '/menu.php' ?>
    <form class="accountForm" action="http://localhost/bank_php/store.php" method="post">
        <h2>Create New Account </h2>
        <div class="accountInput">
            <label for="name">First Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="accountInput">
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>
        </div>
        <div class="accountInput">
            <label for="IBAN">IBAN:</label>
            <input type="text" id="IBAN" name="IBAN" required>
        </div>
        <div class="accountInput">
            <label for="PC">Personal Code:</label>
            <input type="text" id="PC" name="PC" required>
        </div>
        <button type="submit">Create account</button>
    </form>
    <?php if (isset($error)) : ?>
        <h1 style="color: crimson; text-align:center"><?= $error ?></h1>
    <?php endif ?>
</body>

</html>





<!-- Naujos sąskaitos sukūrimas (įvedami duomenys: vardas, pavardė, sąskaitos numeris, asmens kodas) -->