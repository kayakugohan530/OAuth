<?php

require_once 'src/Facebook/facebook.php';

$facebook = new Facebook(array('appId' => FB_APPID, 'secret' => FB_SECRET));
$user = $facebook->api('/me', 'GET');
$image = $facebook->api('me/picture?redirect=0&height=50&type=normal&width=50', 'GET');

