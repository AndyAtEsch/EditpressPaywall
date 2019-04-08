<?php
/*
Plugin Name: Editpress Paywall
*/

/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/

require __DIR__ . '/vendor/autoload.php';


use Auth0\SDK\Auth0;
use josegonzalez\Dotenv\Loader;
use Auth0\SDK\Store\SessionStore;
use Auth0\SDK\API\Management;
use Auth0\SDK\API\Authentication;
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

        
$auth0 = new Auth0([
    'domain' => getenv('AUTH0_DOMAIN'),
    'client_id' => getenv('AUTH0_CLIENT_ID'),
    'client_secret' => getenv('AUTH0_CLIENT_SECRET'),
    'redirect_uri' => getenv('AUTH0_REDIRECT_URI'),
    'scope' => 'openid',
  ]);


    /**
 * Class EditpressPayWall
 *
 * This class creates the option page and add the web app script
 */
class EditpressPaywall{




    static function generateAuth0Token(){

        // Generate Auth0 Token
        $config = [
            'client_secret' => getenv('AUTH0_CLIENT_SECRET'),
            'client_id' => getenv('AUTH0_CLIENT_ID'),
            'audience' => "https://".getenv('AUTH0_DOMAIN')."/api/v2/"
          ];

        //  var_dump($config);
          var_dump(getenv('AUTH0_DOMAIN'));

          $auth0_api = new Authentication(getenv('AUTH0_DOMAIN'));
          $result = $auth0_api->client_credentials($config);

          return $result["access_token"];
    }


    static function auth0UserIsConnected(){
        $store = new SessionStore();
        $user  = $store->get('user');

        if ( $user ) return $user;
        else return FALSE;
    }



    static function managementApiAuth(){
        $token = EditpressPaywall::generateAuth0Token();
        return new Management( $token, getenv('AUTH0_DOMAIN') );
    }

    /* Constructor
*  Set Auth Connection
*/

    function __construct() {

		register_activation_hook( __FILE__, array( $this, 'activate' ) );

		add_action( 'init', array( $this, 'rewrite' ) );
		add_filter( 'query_vars', array( $this, 'query_vars' ) );
        add_action( 'template_include', array( $this, 'change_template' ) );
 
    }
    
  

	function activate() {
		set_transient( 'editpressPaywall_flush', 1, 60 );
	}

	function rewrite() {
		add_rewrite_endpoint( 'dump', EP_PERMALINK );
		
        add_rewrite_rule( '^login$', 'index.php?login=1', 'top' );
        add_rewrite_rule( '^logout$', 'index.php?logout=1', 'top' );
        add_rewrite_rule( '^profile$', 'index.php?profile=1', 'top' );

		if(get_transient( 'editpressPaywall_flush' )) {
			delete_transient( 'editpressPaywall_flush' );
			flush_rewrite_rules();
		}
	}

	function query_vars($vars) {
        $vars[] = 'login';
		$vars[] = 'logout';
        $vars[] = 'profile';
		return $vars;
	}

	function change_template( $template ) {

        if( get_query_var( 'login', false ) !== false ) {
			//Check plugin directory next
			$newTemplate = plugin_dir_path( __FILE__ ) . 'templates/login.php';
			if( file_exists( $newTemplate ) )
				return $newTemplate;
		}

		if( get_query_var( 'logout', false ) !== false ) {
			//Check plugin directory next
			$newTemplate = plugin_dir_path( __FILE__ ) . 'templates/logout.php';
			if( file_exists( $newTemplate ) )
				return $newTemplate;
		}

		if( get_query_var( 'profile', false ) !== false ) {
			//Check plugin directory next
			$newTemplate = plugin_dir_path( __FILE__ ) . 'templates/profile.php';
			if( file_exists( $newTemplate ) )
				return $newTemplate;
		}

		//Fall back to original template
		return $template;
		//require_once(__DIR__ . '/index.php');


	}

}

new EditpressPaywall;





?>