<?php

require_once 'src/Twitter/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

$token = $_SESSION['token'];
$connection = new TwitterOAuth(TW_APPID, TW_SECRET, $token['oauth_token'], $token['oauth_token_secret']);
$access_token = $connection->oauth('oauth/access_token', array('oauth_verifier' => $_REQUEST['oauth_verifier']));

$connection = new TwitterOAuth(TW_APPID, TW_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

$user = $connection->get('account/verify_credentials');

/* 
$media_id = $connection->upload('media/upload', array('media' => '/path/image.jpg'));

$parameters = array(
    'status' => '',
    'media_ids' => $media_id->media_id_string,
);

$result = $connection->post('statuses/update', $parameters);
*/
