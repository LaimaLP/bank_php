<?php
require __DIR__ . '../functions.php';
session_start(); //jei prisijuges, neturi rodyti login psl, uzdedama salyga
if ($_SESSION['login'] !== 'logIn') {
    header('Location: http://localhost/bank_php/auth/login.php');
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Read</title>
</head>

<body>
    <?= require __DIR__ . '/menu.php'?>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2>Account List</h2>
            </div>
        </div>
    </div>


    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <b>Owner</b>
                    </div>
                    <div class="col-2">
                        <b>Personal Code</b>
                    </div>
                    <div class="col-3">
                        <b>Account Number</b>
                    </div>
                    <div class="col-2">
                        <b>Balance</b>
                    </div>

                    <div class="col-3">
                        <b>Action</b>
                    </div>
                </div>
            </div>
        </li>
        <?php $getUsers = file_get_contents(__DIR__ . '/data/users.ser');
        $usersData = unserialize($getUsers); ?>
        <?php foreach ($usersData as $userBlock) : ?>
            <li class="list-group-item">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <?= $userBlock['name']. " ".$userBlock['lastname'] ?>
                        </div>
                        <div class="col-2">
                            <?= $userBlock['personalCode'] ?>
                        </div>
                        <div class="col-3">
                            <?= $userBlock['number'] ?>
                        </div>
                        <div class="col-2">
                            <?= $userBlock['balance'] ?>
                        </div>
                        <div class="col-3">
                            <a href="http://localhost/bank_php/addMoney.php?id=<?= $userBlock['id'] ?>" class="btn btn-outline-success btn-sm">Add</a>
                            <a href="http://localhost/bank_php/withdraw.php?id=<?= $userBlock['id'] ?>" class="btn btn-outline-success btn-sm">Debit</a>
                            <a href="http://localhost/bank_php/show.php?id=<?= $userBlock['id'] ?>" class="btn btn-outline-success btn-sm">Delete</a>
                        </div>
                    </div>
                </div>
            </li>

        <?php endforeach ?>
    </ul>

</body>

</html>