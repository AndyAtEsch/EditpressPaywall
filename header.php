<!doctype html >
<!--[if IE 8]>    <html class="ie8" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta charset="<?php bloginfo( 'charset' );?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->
<meta name="_globalsign-domain-verification" content="fqfz4Wrt59H76YmQhmhQcRiiV8OWD7FQ73R9hw7Sjy" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/wp-content/themes/Newspaper/Newspaper/style.css?ver=7.7" />





<?php
$home_dir = realpath(dirname(__FILE__)."/../../../");

include $home_dir."/vendor/autoload.php";

use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'editpress-jz.eu.auth0.com',
  'client_id' => '2T4OUyFi8uIZA1O7CnWZOYInKe4Nef2Q',
  'client_secret' => 'GbsTKOU3COx3iRMMWdezhXj7npL570-VhpuGX6t0ARrPwofaISEK0gRHov6eK8po',
  'redirect_uri' => 'http://3.82.40.80/index.php',
  'scope' => 'openid',
]);

var_dump($auth0);

$userInfo = $auth0->getUser();
var_dump($userInfo);

$page_type = "page";
if ( is_single() ){
$page_type="premium";
}

$current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


?>

<!-- Pool -->
<script>
  !function(w,d,s,u,p,t,o){
      w[p]=w[p]||function(){(w[p]._q=w[p]._q||[]).push(arguments)},
      t=d.createElement(s),o=d.getElementsByTagName(s)[0],
      t.async=1,t.src=u,o.parentNode.insertBefore(t,o)
  }(window, document, "script", "https://assets.poool.fr/poool.min.js", "poool");

  // Remplacez XXXX-XXXX-XXXX-XXXX par votre identifiant d'application
  poool("init", "CXWOC-HD92Y-ZWC2P-AF9WF");
  poool("config","wait_for_dom_load", true);
  // Pour être en conformité avec la norme RGPD, nous avons mis
  // en place un paramètre de configuration qu'il vous est nécessaire
  // de renseigner lors de l’implémentation.
  //
  // Par défaut, la valeur est définie à "false" et coupe le
  // fonctionnement de Poool. Un paywall par défaut sera affiché.
  //
  // ⚠️ Important : vous devez au préalable récolter le consentement
  // auprès de vos utilisateurs
  //
  // Remplacez <boolean> par la valeur du consentement de l'utilisateur
  poool("config", "cookies_enabled", true);
//console.log("<?php echo $page_type;?>");
  // Rajoutez ici toutes les lignes de configuration/textes/styles/events
  // dont vous pourriez avoir besoin
  //
  poool("config", "debug", true);
  poool('config', 'login_url', 'http://54.173.144.82/login.php?url=<?php echo $current_url ?>');

  // Insérez aussi le tag à la fin de votre tunnel de conversion,
  // quand l'utilisateur s'est abonné avec succès, en rajoutant
  // cette ligne (à l'image d'un pixel de conversion Facebook ou Twitter)
  //
  // poool("send", "conversion");

  // ⚠️ Très important : poool("send","page-view"); doit absolument
  // être la dernière ligne de votre configuration Poool.
  // Toute ligne de configuration ajoutée aprés sera ignorée.
  //
  // Remplacez par le type de page en cours
  // ex: poool("send", "page-view", "premium")
  // Types de pages disponibles : https://dev.poool.fr/sdk/actions#page-view
//poool('config', 'app_name', 'Jeudi Preprod');

  poool("send", "page-view", "<?php echo $page_type;?>");

</script>
<!-- End Poool -->


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N7LM9ML');</script>
<!-- End Google Tag Manager -->

<script
      src="https://js.chargebee.com/v2/chargebee.js"
      data-cb-site="editpress-test"
    ></script>

<?php
    wp_head(); /** we hook up in wp_booster @see td_wp_booster_functions::hook_wp_head */
    ?>


</head>

<?php


function checkIfArticleIsPremium($postid){
 $array_cat = get_the_category($postid);
//var_dump($array_cat);

foreach( $array_cat as $cat){
$cat = get_category($cat);
if ( $cat->slug === "premium" ) return true;
}

return 0;

}

function checkIfUserIsPremium(){
	$user = wp_get_current_user();
// Get all the user roles as an array.
	$user_roles = $user->roles;

// Check if the role is present in the array.
if ( in_array( 'um_subscriber-premium', $user_roles, true ) ) {
    // Do something.
    return true;
}

return 0;
}


 ?>

<body class="eupopup eupopup-top" <?php //body_class() ?> itemscope="itemscope" itemtype="<?php echo td_global::$http_or_https?>://schema.org/WebPage">

<?php




global $connected;

$connected = 0;




if (!$userInfo) {
  echo '<a href="/login.php">Login via AUTH0 //</a>';

} else {
    // User is authenticated
    // Say hello to $userInfo['name']
    // print logout button
    echo '<a href="/profile.php">Profile AUTH0</a>';
    $connected = 1;
}
 ?>


<?php  include(ABSPATH."/adtech/ad-tech-1x.php"); ?>
<div style="margin:0 auto; max-width:994px;">
<?php  include(ABSPATH."/adtech/ad-tech-leaderboard.php"); ?>
</div>
    <?php /* scroll to top */?>
    <div class="td-scroll-up"><i class="td-icon-menu-up"></i></div>

    <?php locate_template('parts/menu-mobile.php', true);?>
    <?php locate_template('parts/search.php', true);?>


    <div id="td-outer-wrap" class="td-theme-wrap">
    <?php //this is closing in the footer.php file ?>

        <?php
        /*
         * loads the header template set in Theme Panel -> Header area
         * the template files are located in ../parts/header
         */
        td_api_header_style::_helper_show_header();

        do_action('td_wp_booster_after_header'); //used by unique articles
