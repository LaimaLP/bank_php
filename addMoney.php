<?php
session_start();
//GET vaizdas, keliauja i update.php
// per query perduota memberio info - id, jei yra id

if (!isset($_SESSION['login']) || $_SESSION['login'] != 'logIn') {
    header('Location: http://localhost/bank_php/auth/login.php');
    exit;
}

if (!$_GET['id']) {
    header('Location: http://localhost/bank_php/index.php');
    exit;
} else if ($_GET['id']) {
    // decodinam, kad prieitume prie kiekvieno ir tikrintume id atejusi is querio ir esancio jau sarase
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
    <link rel="stylesheet" href="styles.css">
    <script src="http://localhost/bank_php/script.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Add money </title>

</head>

<body>

    <?php require __DIR__ . '../parts/menu.php' ?>
    <?php require __DIR__ . '../parts/msg.php' ?>

    <?php if (!$user) : ?>

        <div style="text-align: center" class="alert alert-danger" role="alert">
            Member with this id not found!
            <a href=http://localhost/bank_php/index.php> Go back to Accounts </a>
        </div>
    <?php else : ?>

        <div style="text-align: center;">
            <h1>Add funds </h1>
            <p> <b>Name: </b> <?= $user['name'] ?> </p>
            <p> <b>Last Name: </b> <?= $user['lastname'] ?> </p>
            <p> <b> Balance: </b> <?= number_format($user['balance'], 3, '.', '')  ?> €.</p>
            <form action="http://localhost/bank_php/update.php?id=<?= $_GET['id'] ?? 0 ?>" method="post">
                <input type="text" min="0" name="addMoney">
                <button class="btn btn-outline-success btn-sm" type="submit">Add</button>
            </form>
        </div>
    <?php endif ?>
</body>


</html>