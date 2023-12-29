<?php
session_start();

$members = unserialize(file_get_contents(__DIR__ . '/data/users.ser')); //jei metodas post, paimam duomenis, isserializuojam

// check user existence, kad nesikartotu tuo paciu personal code
foreach ($members as $member) {
    if ($member['personalCode'] == $_POST['PC']) {
        $_SESSION['error'] = 'Member with this personal code already exist';
        $_SESSION['old_data'] = $_POST;
        header("Location: http://localhost/bank_php/newAccount.php");
        exit;
    }
}

if (strlen($_POST['name']) < 3 && strlen($_POST['lastname']) < 3) {
    $_SESSION['error'] = 'User name and last name must be more than three letters.';
    header("Location: http://localhost/bank_php/newAccount.php");
    exit;
}

$pc = $_POST['PC'];
$pirmasDigit = substr($pc, 0, 1);
$menuoDigit = substr($pc, 3, 2);
$dienaDigit = substr($pc, 5, 2);
if (
    strlen($pc) > 11 ||
    $pirmasDigit < 1 || $pirmasDigit > 6 ||
    $menuoDigit > 12 ||
    $dienaDigit > 31
) {
    $_SESSION['error'] = "Invalid personal code.  $pirmasDigit menuo: $menuoDigit  diena $dienaDigit ";
    header("Location: http://localhost/bank_php/newAccount.php");
    exit;
}



createNewAccount();
function createNewAccount()
{
    if (isset($_SESSION["error"])) {
        unset($_SESSION["error"]);
    }

    $id = rand(1000, 9999);
    $name = $_POST['name'] ?? 0;
    $lastname = $_POST['lastname'] ?? 0;
    $number = "LT" . rand(10 ** 17, 10 ** 18 - 1);
    $personalCode = $_POST['PC'] ?? 0;

    $users = unserialize(file_get_contents(__DIR__ . '/data/users.ser'));
    $users[] = [
        'id' => $id,
        'name' => $name,
        'lastname' => $lastname,
        'number' => $number,
        'personalCode' => $personalCode,
        'balance' => 0,
    ];

    file_put_contents(__DIR__ . '/data/users.ser', serialize($users));
    $_SESSION['success'] = "New account of $name $lastname was created";

    header('Location: http://localhost/bank_php/read.php');
}
