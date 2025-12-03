<?php

include("user_service.php");
$user = new user_service($_POST['username'],
$_POST['password']);

if($get_user = $user->login()) {
    echo '<h1> Selamat Datang '.$user->getRole().'</h1>';
    echo 'Masuk Sebagai username: '.$get_user;
} else {
    echo 'Invalid Login';
}