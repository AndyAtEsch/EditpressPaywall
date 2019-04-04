<?php
/*
Plugin Name: Editpress Paywall
*/


require __DIR__ . '/vendor/autoload.php';
use Auth0\SDK\Auth0;


/*
 * Plugin constants
 */

if(!defined('EDITPAYWALL_URL'))
	define('EDITPAYWALL__URL', plugin_dir_url( __FILE__ ));
if(!defined('EDITPAYWALL__PATH'))
	define('EDITPAYWALL__PATH', plugin_dir_path( __FILE__ ));
 


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

echo EDITPAYWALL_URL;

?>