<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Bank</title>
</head>
<body>
    <h1>Welcome to BANK</h1>
    <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'logIn'): ?>
        <h2>Hello, <?= $_SESSION['name'] ?></h2>
        <a href="authorized.php">Go to members page</a>
    <?php else: ?>
    <a href="login.php">Login</a> or <a href="register.php">Register</a>
    <?php endif ?>
    
</body>
</html>