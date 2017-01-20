<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$username = filter_input(INPUT_POST, 'username', FILTER_CALLBACK, array('options' => 'trimString')); 
$password = filter_input(INPUT_POST, 'password', FILTER_CALLBACK, array('options' => 'trimString')); 

function trimString ($value) {
    return trim($value);
}

session_start();
if (empty($username) || empty($password)) {
    $_SESSION['error_msg'] = 'ユーザー名またはパスワードを入力されない';
    header('location: /php/login.php');
    exit();
} else {
    $_SESSION['username'] = $username;
    $_SESSION['sessionID'] = session_id();
    $_SESSION['token'] = sha1(session_id().$username);
    header('location: /php/welcome.php');
    exit();
}
