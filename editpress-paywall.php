<?php
/*
Plugin Name: Editpress Paywall
*/


require __DIR__ . '/vendor/autoload.php';

use Auth0\SDK\Auth0;
use josegonzalez\Dotenv\Loader;

/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/

/*
 * Plugin constants
 */
if(!defined('EDITPAYWALL_URL'))
	define('EDITPAYWALL_URL', plugin_dir_url( __FILE__ ));
if(!defined('EDITPAYWALL_PATH'))
	define('EDITPAYWALL_PATH', plugin_dir_path( __FILE__ ));
 
/*
* Loader Env File
*/
$Dotenv = new Loader(__DIR__ . '/.env');
$Dotenv->parse()->putenv(true);

// Get environment variables
echo 'My Auth0 domain is ' . getenv('AUTH0_DOMAIN');


    /**
 * Class Feedier
 *
 * This class creates the option page and add the web app script
 */
class EditpressPaywall
{
 
    /**
     * Feedier constructor.
     *
     * The main plugin actions registered for WordPress
     */
    public function __construct()
    {
 
    }
 
}
 
/*
 * Starts our plugin class, easy!
 */
new EditpressPaywall();



?>