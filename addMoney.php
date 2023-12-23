<?php
require __DIR__ . '../menu.php';
$user=[];
if ($_GET['userId'] || $_GET['userId']==0) {

    $getUsers = file_get_contents(__DIR__ . '/data/users.ser');
    $usersData = unserialize($getUsers);
 
foreach ($usersData as $userItem) {
     if($userItem['id']==$_GET['userId']){
        $user=$userItem;
     }
}
   
    //Susirasti Usery is $usersData

    // $user = tas issitrauktas

}
//call function addMoney
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Add money </title>
</head>
<body>
<?= $menu ?>


    <h1>Prideti lesas </h1>
    <!--  Name: $user['name']-->
    <?php if($user): ?>
    <p> Name: <?= $user['name'] ?> </p>
    <p> Last Name: <?= $user['lastName'] ?> </p>
    <p> Saskaitos Likutis: <?= $user['balance'] ?> </p>
    <form action="" method="post">
        <input type="text" name="addMoney" placeholder="1000">
        <button type="submit">Add money</button>
    </form>
    <?php endif ?>
</body>
</html>