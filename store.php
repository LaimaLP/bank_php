<?php
 session_start();

$members = unserialize(file_get_contents(__DIR__.'/data/users.ser')); //jei metodas post, paimam duomenis, isserializuojam
      
        // check user existence, kad nesikartotu tuo paciu personal code
foreach ($members as $member) { 
    if ($member['personalCode'] == $_POST['PC']) {
        $_SESSION['error'] = 'Member with this personal code already exists';
        $_SESSION['old_data'] = $_POST;
        $error= $_SESSION['error'];
        header("Location: http://localhost/bank_php/newAccount.php?error=$error ");
        die;
    }
}


createNewAccount();
function createNewAccount(){
$id = rand(1000, 9999);
$name = $_POST['name'] ?? 0; 
$lastname = $_POST['lastname'] ?? 0; 
$number = $_POST['IBAN'] ?? 0; 
$personalCode = $_POST['PC'] ?? 0; 

$users = unserialize(file_get_contents(__DIR__ . '/data/users.ser'));
$users[] = [
    'id'=> $id, 
    'name'=> $name,
    'lastname'=> $lastname,
    'number'=> $number,
    'personalCode'=> $personalCode,
    'balance' => 0,
];

file_put_contents(__DIR__ . '/data/users.ser', serialize($users) );
header('Location: http://localhost/bank_php/read.php');
}