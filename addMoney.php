<?php
session_start();
// require __DIR__ . '../functions.php';

$user = [];
if ($_GET['id']) {

    $getUsers = file_get_contents(__DIR__ . '/data/users.ser');
    $usersData = unserialize($getUsers);

    foreach ($usersData as $userItem) {
        if ($userItem['id'] == $_GET['id']) {
            $user = $userItem;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="http://localhost/bank_php/script.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Add money </title>
</head>

<body>

    <?php require __DIR__ . '/menu.php' ?>
    <?php require __DIR__ . '/msg.php' ?>

    <div style="text-align: center;">
        <h1>Add funds </h1>
        <?php if ($user) : ?>
            <p> <b>Name: </b> <?= $user['name'] ?> </p>
            <p> <b>Last Name: </b> <?= $user['lastname'] ?> </p>
            <p> <b> Balance: </b> <?= $user['balance'] ?> €.</p>
            <form action="http://localhost/bank_php/update.php?id=<?= $_GET['id'] ?? 0 ?>" method="post">
                <input type="text" name="addMoney">
                <button class="btn btn-outline-success btn-sm"type="submit">Add</button>
            </form>
        <?php endif ?>
    </div>
</body>

</html>