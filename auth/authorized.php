<?php
session_start(); // jeigu nera logino, arba loginas nelygus, redirectinam prisiloginti
if (!isset($_SESSION['login']) || $_SESSION['login'] != 'logIn') {
    header('Location: http://localhost/bank_php/auth/login.php');
    exit;
}
?>
<!-- //priesingu atveju rodom si psl -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <title>Inside the BANK</title>
</head>

<body style="background-color: skyblue; text-align:center;">
<?php require __DIR__ . '../../parts/menu.php'?>



    <h1>Welcome to BANK members page</h1>
    <h2>Hello, <?= $_SESSION['name'] ?></h2>
    <a href="../index.php?name=<?= $_SESSION['name'] ?>">Go to Account List Page</a>



</body>

</html>