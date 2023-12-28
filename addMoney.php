<?php
session_start();
// require __DIR__ . '../functions.php';

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
// addMoney($user['id'], 300)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="http://localhost/bank_php/script.js" defer></script>

    <title>Add money </title>
</head>
<body>

<?= require __DIR__ . '/menu.php'?>
<?php require __DIR__ . '/msg.php' ?>


    <h1>Prideti lesas </h1>
    <!--  Name: $user['name']-->
    <?php if($user): ?>
    <p> <b>Name: </b> <?= $user['name'] ?> </p>
    <p> <b>Last Name: </b> <?= $user['lastname'] ?> </p>
    <p> <b> Saskaitos likutis: </b> <?= $user['balance'] ?> €.</p>
    <form action="http://localhost/bank_php/update.php?id=<?= $_GET['id'] ?? 0 ?>" method="post">
        <input type="text" name="addMoney">
        <button type="submit">Add money</button>
    </form>
    <?php endif ?>
</body>
</html>