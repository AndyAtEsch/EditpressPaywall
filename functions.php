<?php

/*
 * Load ChargeBee Environment
 */
function loadChargebeeEnvironment(){
    ChargeBee_Environment::configure(getenv('CHARGEBEE_SITE'),getenv('CHARGEBEE_SITE_API_KEY'));
}

/*
 * Get UserPortalSessions Sessions
 */
function getChargebeePortalSession($chargebee_id){
    $result = ChargeBee_PortalSession::create(array(
        "redirectUrl" => getenv('AUTH0_REDIRECT_URI'),
        "customer" => array(
            "id" => $chargebee_id
        )
    ));
    return $result->portalSession();

}
?>

