<?php

require 'vendor/autoload.php';

session_start();

$client = new Google_Client();
$client -> setClientId('1083767931208-or5iab9f7r75kiq8k3oha5us8u0avpev.apps.googleusercontent.com');
$client -> setClientSecret('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');
$client -> setRedirectUri('http://localhost:8080/google-callback.php');

if (isset($_GET['code'])) {
    $token = $client -> fetchAccessTokenWithAuthCode($_GET['code']);
    $client -> setAccessToken($token);

    $oauth2 = new Google_Service_Oauth2($client);
    $userInfo = $oauth2 -> userinfo -> get();

    $_SESSION['user_id'] = $userInfo -> id;
    $_SESSION['email'] = $userInfo -> email;
    $_SESSION['name'] = $userInfo -> name;
    $_SESSION['picture'] = $userInfo -> picture;

    header('Location: Dashboard_Page1.php');
    exit();

} else {

    header ('Location: Login_Page.php');
    exit();
}

?>