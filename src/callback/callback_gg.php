<?php

require_once 'src/Google/Client.php';

$client = new Google_Client();

$client->setClientId(GG_APPID);
$client->setClientSecret(GG_SECRET);
$client->setRedirectUri(GG_CALLBACK);

$client->authenticate($_GET['code']);

$userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . json_decode($client->getAccessToken())->access_token));
