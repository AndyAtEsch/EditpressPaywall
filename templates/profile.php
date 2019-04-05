<?php


echo "<h1>Profile Page 12</h1>";
error_reporting(E_ALL);
ini_set('display_errors', 1);

require  __DIR__.'/../vendor/autoload.php';

use Auth0\SDK\Auth0;

/*
$auth0 = new Auth0([
    'domain' => getenv('AUTH0_DOMAIN'),
    'client_id' => getenv('AUTH0_CLIENT_ID'),
    'client_secret' => getenv('AUTH0_CLIENT_SECRET'),
    'redirect_uri' => getenv('AUTH0_REDIRECT_URI'),
    'scope' => 'openid',
  ]);
*/
  $userInfo = $auth0->getUser();

  var_dump($userInfo);

?>