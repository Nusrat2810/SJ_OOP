<?php
if(!session_id())
	session_start();
include_once 'Facebook/autoload.php';

$app_id = '237028177247513';
$app_secret = '6b33265bda66a9ced7e8cac6c3e75f7a';
$permissions = ['email']; // Optional permissions
$callbackUrl = 'http://localhost/SJ_OOP/view/callback.php';
$fb = new Facebook\Facebook([
  'app_id' => $app_id, // Replace {app-id} with your app id
  'app_secret' => $app_secret,
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();


$loginUrl = $helper->getLoginUrl($callbackUrl , $permissions);
?>