<?php

// function createAccount( $name, $lname, $number, $code, $balance): void
function createAccount(): void
{
    $getUsers = file_get_contents(__DIR__ . '/data/users.ser');
    $usersData = unserialize($getUsers);

    $usersData[] = [
        "id" => 45,//AUTO paskaiciuot!!!!!,
        "name" => "xxxxxxx",
        "lastName" => "xxxxxx",
        "number" => "xxxxxxx",
        "personalCode" => "xxxxx",
        "balance" => 111111,
    ];
    
    // $ser = serialize($usersData);
    // file_put_contents(__DIR__.'../data/users.ser', $ser);
}

function addMoney($id, $amount): void
{
    $getUsers = file_get_contents(__DIR__ . '/data/users.ser');
    $usersData = unserialize($getUsers);

    foreach ($usersData as $user) {
        // user [balance] = new balance after add
    }
    
    $ser = serialize($usersData);
    file_put_contents(__DIR__.'../data/users.ser', $ser);


    //then redirect to main page
}

function reduceMoney($id, $amount): void
{
    $getUsers = file_get_contents(__DIR__ . '/data/users.ser');
    $usersData = unserialize($getUsers);

    foreach ($usersData as $user) {
        //if ...... atrasti ta user kur ID
        // user balance = new
    }
    
    $ser = serialize($usersData);
    file_put_contents(__DIR__.'../data/users.ser', $ser);


    //then redirect to main page
}