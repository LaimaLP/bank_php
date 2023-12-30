<?php
session_start();
require __DIR__ . '../functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="http://localhost/bank_php/script.js" defer></script>

    <title>Read</title>
</head>

<body>
    <?php require __DIR__ . '/menu.php' ?>
    <?php require __DIR__ . '/msg.php' ?>


    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2>Accounts</h2>
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


                    <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'logIn') : ?>
                        <div class="col-3">
                            <b>Action</b>
                        </div>
                    <?php endif ?>

                </div>
            </div>
        </li>
        <?php $members = unserialize(file_get_contents(__DIR__ . '/data/users.ser')) ?>

        <?php usort($members, fn ($a, $b) => $a['lastname'] <=> $b['lastname']) ?>

        <?php foreach ($members as $member) : ?>
            <li class="list-group-item">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <?= $member['name'] . " " . $member['lastname'] ?>
                        </div>
                        <div class="col-2">
                            <?= $member['personalCode'] ?>
                        </div>
                        <div class="col-3">
                            <?= $member['number'] ?>
                        </div>
                        <div class="col-2">
                            <?= $member['balance'] ?>
                        </div>

                        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'logIn') : ?>
                            <div class="col-3">
                                <a href="http://localhost/bank_php/addMoney.php?id=<?= $member['id'] ?>" class="btn btn-outline-success btn-sm">Add</a>
                                <a href="http://localhost/bank_php/withdraw.php?id=<?= $member['id'] ?>" class="btn btn-outline-info btn-sm">Debit</a>
                                <a href="http://localhost/bank_php/delete.php?id=<?= $member['id'] ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                            </div>
                        <?php endif ?>

                    </div>
                </div>
            </li>

        <?php endforeach ?>

    </ul>

</body>

</html>