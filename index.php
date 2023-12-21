<?php
require __DIR__ . '../menu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add money </title>
</head>
<body>
<?= $menu ?>

    <h1> Headeris: meniu su nuorodomis </h1>
    <h1>Accounts List</h1>

    
    <p> Name: ... </p>
    <p> Last Name: ... </p>
    <p> Saskaitos Likutis: ... </p>
    <form action="" method="post">
        <button type="submit">Delete</button>
    </form>
    <a href="/addMoney.php">Go Add Money page</a>
    <a href="/RemoveMoney.php">Go Remove Money page</a>

</body>
</html>