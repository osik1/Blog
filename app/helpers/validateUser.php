<?php
$table = 'users';

function validateUser($user)
{
$errors = array();

if (empty($user['username'])){
    array_push($errors, 'username is required please!' );
}

if (empty($user['email'])){
    array_push($errors, 'Email is required please!' );
}

if (empty($user['password'])){
    array_push($errors, 'Password is required please!' );
}


if ($user['passwordConf'] !== $user['password']){
    array_push($errors, 'Passwords do not much please!' );
}

$existinguser = selectOne('users', ['email' => $user['email']]);
if ($existinguser){
    if (isset($user['register-btn']) && $existinguser['id'] != $user['id']) {
        array_push($errors, 'User with the same email exist!');
    }
    if (isset($user['update-user']) && $existinguser['id'] != $user['id']) {
        array_push($errors, 'Email already exist!');
    }


    if (isset($user['create-admin'])){
        array_push($errors, 'Email already exist!');
    }
}
    return $errors;
}


function validateLogin($user)
{
$errors = array();

if (empty($user['username'])){
    array_push($errors, 'username is required please!' );
}
if (empty($user['password'])){
    array_push($errors, 'Password is required please!' );
}

    return $errors;
}

function validateResetPassword($user)
{
$errors = array();

if (empty($user['email'])){
    array_push($errors, 'Email is required please.' );
}
if (empty($user['curpwd'])){
    array_push($errors, 'Current Password is required please.' );
}
if (empty($user['newpwd'])){
    array_push($errors, 'New Password is required please.' );
}

    return $errors;
}


?>  