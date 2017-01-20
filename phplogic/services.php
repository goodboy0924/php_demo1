<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../phplogic/auth.php';
echo filter_input(INPUT_COOKIE, 'token');
echo filter_input(INPUT_COOKIE, 'sessionID');
$pno1 = filter_input(INPUT_POST, 'pno1');
$pno2 = filter_input(INPUT_POST, 'pno2');

$retVal = file_get_contents('http://zipcloud.ibsnet.co.jp/api/search?zipcode='.$pno1.$pno2);

if (PHP_SESSION_ACTIVE === session_status()) {
    print($retVal);
} else {
    print('{"status":400,"message":"セッションが無効になりました。"}');
}
