<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == 'logIn') {
    header('Location: http://localhost/bank_php/auth/index.php');
    die;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['password'] != $_POST['password2']) {
        $_SESSION['error'] = 'Passwords do not match';
        $_SESSION['old_data'] = $_POST;
        header('Location: http://localhost/bank_php/auth/register.php');
        die;
    }
    $newUsers = unserialize(file_get_contents(__DIR__ . '/data/newUsers.ser')); //jei metodas post, paimam duomenis, isserializuojam
    // check user existence, kad nesikartotu tuo paciu emailu
    foreach ($newUsers as $user) {
        if ($user['email'] == $_POST['email']) {
            $_SESSION['error'] = 'User with this email already exists';
            $_SESSION['old_data'] = $_POST;
            header('Location: http://localhost/bank_php/auth/register.php');
            die;
        }
    }
    $user = [ //po unser sukuria masyva
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => sha1($_POST['password']),
    ];
    $newUsers[] = $user; //idedame i users, naujus userius suserializ, kai prisiregina, redirectinam i logina
    file_put_contents(__DIR__ . '/data/newUsers.ser', serialize($newUsers));
    header('Location: http://localhost/bank_php/auth/login.php');
    die;
}

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
if (isset($_SESSION['old_data'])) {
    $old_data = $_SESSION['old_data'];
    unset($_SESSION['old_data']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Register to BANK</title>
</head>

<body style="background-color: skyblue; text-align:center;">
<?php require __DIR__ . '../../menu.php'?>


    <?php if (isset($error)) : ?>
        <h1 style="color: crimson;"><?= $error ?></h1>
    <?php endif ?>

    <h2 style="text-align: center; margin-bottom: 50px;">Register to Bank</h2>
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <form action="" method="post">
            <div class="form-group">
                <label>Name</label>
                <input  class="form-control" type="text" name="name" placeholder="Name" value="<?= isset($old_data['name']) ? $old_data['name'] : '' ?>">
            </div>
            <div class="form-group">
                <label>Email adress</label>
                <input  class="form-control" type="text" name="email" value="<?= isset($old_data['email']) ? $old_data['email'] : '' ?>" placeholder="Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input  class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input  class="form-control" type="password" name="password2" placeholder="Repeat Password">
            </div>

            <button style=" margin-top: 10px" type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>