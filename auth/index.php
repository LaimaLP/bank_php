<?php
    session_start();
 //vaizdas, get sita forma
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Bank</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body style="background-color: skyblue; text-align:center;">
<?php require __DIR__ . '../../parts/menu.php'?>


    <h1>Welcome to future BANK</h1>
    <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'logIn'): ?>
        <h2> <b>Hello,  <?= $_SESSION['name'] ?> </b></h2>
        <a href="authorized.php">Go to members page</a>
    <?php else: ?>
    <a href="login.php">Login</a> or <a href="register.php">Register</a>
    <?php endif ?>
    
</body>
</html>