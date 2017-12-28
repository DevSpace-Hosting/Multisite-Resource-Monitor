<?php
/*
Plugin Name: Multisite Resource Monitor
Plugin URI: https://github.com/DevSpace-Hosting/Multisite-Resources-Abused
Description: Checks to make sure that all subsites aren't abusing multisite network resources.
Version: 12/29/2017
Author: Marc Woodyard
Author URI: https://marcwoodyard.com
*/

add_action('wp_loaded', 'check_network_resource_abuse');
    function check_network_resource_abuse() {	

    	if(($GLOBALS['pagenow'] == 'wp-login.php') == false && is_admin() == false) {

			// Check subsite storage space.
			if(get_space_used() > get_space_allowed()) {
				suspend_website_mrm();
			}
    	}    	
    }

function suspend_website_mrm() {
	wp_redirect(plugins_url( 'multisite-resources-abused/website-suspended.html', dirname(__FILE__) ));
	exit;
}

?>
