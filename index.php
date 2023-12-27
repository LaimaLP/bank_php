<?php
require __DIR__ . '../menu.php';
require __DIR__ . '../functions.php';

$getUsers = file_get_contents(__DIR__ . '/data/users.ser');
$usersData = unserialize($getUsers);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accounts List </title>
</head>

<body>
    <?= $menu ?>

    <h1>Accounts List </h1>

    <?php
    echo "    <table class='accountTable'>
<thead class='labas'>
    <tr>
        <td>Owner</td>
        <td>Personal code</td>
        <td>Account number</td>
        <td>Balance</td>
        <td>Add</td>
        <td>Debit</td>
        <td>Delete</td>

    </tr>
</thead>
<tbody>";

    foreach ($usersData as $userBlock) {
        $userId = $userBlock['id'];
        echo "<tr>
                <td>{$userBlock['name']} {$userBlock['lastname']}</td>
                <td>{$userBlock['personalCode']}</td>
                <td>{$userBlock['number']}</td>
                <td>{$userBlock['balance']}</td>
                <td> <a href='http://localhost/bank_php/addMoney.php/?userId=$userId'>Add</a> </td>
                <td><a href='http://localhost/bank_php/withdraw.php'>Debit</a>  </td>
                <td> <a href='#'>Delete</a></td>
            </tr>";
    }

    echo "</tbody>
    </table>";
    ?>
</body>

</html>