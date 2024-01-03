<?php
session_start();

if ($_GET['id']) {
    $usersData = unserialize(file_get_contents(__DIR__ . '/data/users.ser'));
    $user = null;
    foreach ($usersData as $userItem) {
        if ($userItem['id'] == $_GET['id']) {
            $user = $userItem;
            break;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Debit </title>
</head>

<body>

    <?php require __DIR__ . '/menu.php' ?>

    <?php if (!$user) : ?>

        <div style="text-align: center" class="alert alert-danger" role="alert">
            Member with this id not found!
            <a href=http://localhost/bank_php/index.php> Go back to Accounts </a>
        </div>

    <?php else : ?>

        <div style="text-align: center;">
            <h1>Debit </h1>
            <p> <b>Name: </b> <?= $user['name'] ?> </p>
            <p> <b>Last Name: </b> <?= $user['lastname'] ?> </p>
            <p> <b> Saskaitos likutis: </b> <?= $user['balance'] ?> €.</p>
            <form action="http://localhost/bank_php/updateDebit.php?id=<?= $_GET['id'] ?? 0 ?>" method="post">
                <input type="text" name="debitMoney">
                <button class="btn btn-outline-info btn-sm" type="submit">Debit money</button>
            </form>
        </div>
    <?php endif ?>
</body>


</html>