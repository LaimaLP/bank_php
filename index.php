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
    <script src="http://localhost/bank_php/parts/script.js" defer></script>
    <title>Read</title>
</head>

<body>
    <?php require __DIR__ . '../parts/menu.php' ?>
    <?php require __DIR__ . '../parts/msg.php' ?>

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
                    <!-- Jei logIn rodom Action and Balance stulpeli. -->
                    <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'logIn') : ?>

                        <div class="col-2">
                            <b>Balance</b>
                        </div>
                        <div class="col-3">
                            <b>Action</b>
                        </div>

                    <?php endif ?>
                </div>
            </div>
        </li>
        <!--  pasiimam memberiu faila, decodinam, ir toliau tikrinam kiekviena-->
        <?php $members = unserialize(file_get_contents(__DIR__ . '/data/users.ser')) ?>

        <?php usort($members, fn ($a, $b) => $a['lastname'] <=> $b['lastname']) ?>
        <!-- isrenkam is kiekvieno memberio jo informacijos bloka, isskaidom -->
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
                        <!-- Jei logIn rodom Action ir Balance stulpelius. -->
                        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'logIn') : ?>

                            <div class="col-2">
                                <?= number_format($member['balance'], 2, '.', '') ?> €
                            </div>
                            <div class="col-3">
                                <!-- mygtukai nuorodos i action atvaizdavimo puslapius, per query (get metodu) perduodama memberio info (id) -->
                                <a href="http://localhost/bank_php/addMoney.php?id=<?= $member['id'] ?>" class="btn btn-outline-success btn-sm">Add</a>
                                <a href="http://localhost/bank_php/withdraw.php?id=<?= $member['id'] ?>" class="btn btn-outline-info btn-sm">Withdraw</a>
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