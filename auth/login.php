<?php
session_start(); //jei prisijuges, neturi rodyti login psl, uzdedama salyga
if (isset($_SESSION['login']) && $_SESSION['login'] == 'logIn') {
    header('Location: http://localhost/bank_php/auth/index.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newUsers = unserialize(file_get_contents(__DIR__ . '/data/newUsers.ser'));
    foreach ($newUsers as $user) {
        if ($user['email'] == $_POST['email']) {
            if ($user['password'] == sha1($_POST['password'])) { //sulyginam is serverio pass ir irasyta, atkeliaujanti dar heshinam
                $_SESSION['login'] = 'logIn'; //po logino irasome i sesija duomenis ir issiunciame i autorizuota psl
                $_SESSION['name'] = $user['name'];
                header('Location: http://localhost/bank_php/auth/index.php');
                exit;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body style="background-color: skyblue; text-align:center;">
<?php require __DIR__ . '../../parts/menu.php'?>


    <!-- atvaizduojam errora, jei setintas: -->
    <?php if (isset($error)) : ?>
        <h1 style="color: crimson;"><?= $error ?></h1>
    <?php endif ?>

    <h2 style="text-align: center; margin-bottom: 50px;"> Welcome to Login </h2>
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <form action="" method="post">
            <div class="form-group">
                <label>Email address</label>
                <input required type="email" name="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input required type="password"  name="password" class="form-control"placeholder="Password">
            </div>
            <button style=" margin-top: 10px" type="submit" class="btn btn-primary">Submit</button>
        </form>
        <span>Don't have an account? </span> <a href='http://localhost/bank_php/auth/register.php'> Register</button>

    </div>

</body>

</html>


