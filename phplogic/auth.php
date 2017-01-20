<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
if (!isset($_SESSION['token'])) {
    goto_login();
}
$token = $_SESSION['token'];
if (empty($token)) {
    goto_login();
}
$username = $_SESSION['username'];
$token2 = sha1(session_id().$username);
if ($token !== $token2) {
    goto_login();
}
function goto_login() {
    $_SESSION['error_msg'] = '認証を失敗しました。';
    header('location: /php/login.php');
    exit();
}
