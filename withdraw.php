<?php
require __DIR__ . '../menu.php';
// call function reduce
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdraw </title>
</head>
<body>
<?= $menu ?>
    <h1>Withdraw </h1>
    <p> Name: ... </p>
    <p> Last Name: ... </p>
    <p> Saskaitos Likutis: ... </p>
    <form action="" method="post">
        <input type="text" name="removeMoney" placeholder="€1111">
        <button type="submit">Remove money</button>
    </form>
</body>
</html>