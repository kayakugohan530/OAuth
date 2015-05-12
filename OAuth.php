<?php

require_once 'src/Google/Client.php';
$ggclient = new Google_Client();

$ggclient->setClientId(GG_APPID);
$ggclient->setClientSecret(GG_SECRET);
$ggclient->setRedirectUri(GG_CALLBACK);
$ggclient->setScopes('email profile');
$ggauthUrl = $ggclient->createAuthUrl();

require_once 'src/Facebook/facebook.php';

$facebook = new Facebook(array('appId' => FB_APPID, 'secret' => FB_SECRET));
$fbauthUrl = $facebook->getLoginUrl(array('redirect_uri' => FB_CALLBACK, 'scope'=>'public_profile,email'));

require_once 'src/Twitter/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

$connection = new TwitterOAuth(TW_APPID, TW_SECRET);
$token = $connection->oauth('oauth/request_token', array('oauth_callback' => TW_CALLBACK));
$SESSION->Set('token', $token);

$twauthUrl = $connection->url('oauth/authorize', array('oauth_token' => $token['oauth_token']));
