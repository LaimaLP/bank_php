<?php
session_start(); // jeigu nera logino, arba loginas nelygus, redirectinam prisiloginti
if (!isset($_SESSION['login']) || $_SESSION['login'] != 'logIn') {
    header('Location: http://localhost/bank_php/auth/login.php');
    die;
}
?>
<!-- //priesingu atveju rodom si psl -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inside the BANK</title>
</head>

<body>
    <h1>Welcome to BANK members page</h1>
    <h2>Hello, <?= $_SESSION['name'] ?></h2>
    <a href="../read.php?name=<?= $_SESSION['name'] ?>">Go to Account List Page</a>
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>


</body>

</html>