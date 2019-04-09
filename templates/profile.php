<?php


echo "<h1>Profile Page 17</h1>";
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);*/

require  __DIR__.'/../vendor/autoload.php';
require  __DIR__.'/../vendor/chargebee/chargebee-php/lib/ChargeBee.php';



use Auth0\SDK\Auth0;
use Auth0\SDK\Store\SessionStore;
use Auth0\SDK\API\Management;
use Auth0\SDK\API\Authentication;


$user = EditpressPaywall::auth0UserIsConnected();

if( $user ){

    $management_api = EditpressPaywall::managementApiAuth();

    $costumer_info = $management_api->users->get($user['sub']);

    //var_dump($costumer_info);



   loadChargebeeEnvironment();
    $portal_session = getChargebeePortalSession("2smoc96ZRLvFVB4cyO");

    var_dump($portal_session);
}


?>