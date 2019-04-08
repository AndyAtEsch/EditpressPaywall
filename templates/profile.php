<?php


echo "<h1>Profile Page 17</h1>";
error_reporting(E_ALL);
ini_set('display_errors', 1);

require  __DIR__.'/../vendor/autoload.php';

//ChargeBee_Environment::configure(getenv('CHARGEBEE_SITE'),getenv('CHARGEBEE_SITE_API_KEY'));

use Auth0\SDK\Auth0;
use Auth0\SDK\Store\SessionStore;
use Auth0\SDK\API\Management;
use Auth0\SDK\API\Authentication;


var_dump(EditpressPaywall::auth0UserIsConnected());

$user = EditpressPaywall::auth0UserIsConnected();

if( $user ){

    $management_api = EditpressPaywall::managementApiAuth();

    $costumer_info = $management_api->users->get($user['sub']);

    var_dump($costumer_info);

}


?>