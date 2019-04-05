<?php
echo "Login Template";

include "../vendor/autoload.php";

use Auth0\SDK\Auth0;
 
$auth0 = new Auth0([
  'domain' => 'editpress-jz.eu.auth0.com',
  'client_id' => '2T4OUyFi8uIZA1O7CnWZOYInKe4Nef2Q',
  'client_secret' => 'GbsTKOU3COx3iRMMWdezhXj7npL570-VhpuGX6t0ARrPwofaISEK0gRHov6eK8po',
  'redirect_uri' => 'http://3.82.40.80',
  'scope' => 'openid profile',
  'store' => false
]);


if (!$userInfo) {
  $auth0->login();
} 

?>