<?php
require __DIR__ . '../menu.php';
require __DIR__ . '../functions.php';

$user=[];
if ($_GET['id'] || $_GET['id']==0) {

    $getUsers = file_get_contents(__DIR__ . '/data/users.ser');
    $usersData = unserialize($getUsers);
 
foreach ($usersData as $userItem) {
     if($userItem['id'] == $_GET['id']){
        $user=$userItem;
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
    <title>Debit </title>
</head>
<body>

<?= $menu ?>

    <h1>Debit </h1>

    <?php if($user): ?>
    <p> <b>Name: </b> <?= $user['name'] ?> </p>
    <p> <b>Last Name: </b> <?= $user['lastname'] ?> </p>
    <p> <b> Saskaitos likutis: </b> <?= $user['balance'] ?> €.</p>
    <form action="" method="post">
        <input type="text" name="addMoney" placeholder="1000">
        <button type="submit">Add money</button>
    </form>
    <?php endif ?>
</body>
</html>