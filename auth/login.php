<?php
    session_start(); //jei prisijuges, neturi rodyti login psl, uzdedama salyga
    if (isset($_SESSION['login']) && $_SESSION['login'] == 'logIn') {
        header('Location: http://localhost/bank_php/auth/index.php');
        die;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $newUsers = unserialize(file_get_contents(__DIR__.'/data/newUsers.ser'));
        foreach ($newUsers as $user) {
            if ($user['email'] == $_POST['email']) {
                if ($user['password'] == sha1($_POST['password'])) { //sulyginam is serverio pass ir irasyta, atkeliaujanti dar heshinam
                    $_SESSION['login'] = 'logIn'; //po logino irasome i sesija duomenis ir issiunciame i autorizuota psl
                    $_SESSION['name'] = $user['name'];
                    header('Location: http://localhost/bank_php/auth/authorized.php');
                    die;
                }
            }
        }
        $_SESSION['error'] = 'Wrong email or password'; //antrasis variantas, neprisiloginam, grazina error
        header('Location: http://localhost/bank_php/auth/login.php'); //redirectina ir leidzia is naujo prisijungti
        die;
    }

    if (isset($_SESSION['error'])) { // jei turi errora, istrinam ji, kad nesivalkiotu visur. 
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<!-- atvaizduojam errora, jei setintas: -->
    <?php if (isset($error)): ?> 
        <h1 style="color: crimson;"><?= $error ?></h1>
    <?php endif ?>

    <form action="" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
    
</body>
</html>