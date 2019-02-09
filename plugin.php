<?php
/*
Plugin Name: Multisite Resource Monitor
Plugin URI: https://github.com/DevSpace-Hosting/Multisite-Resource-Monitor
Description: Ensures WordPress subsites aren't abusing network resources.
Version: 2-8-2019
Author: DevSpace Hosting
Author URI: https://github.com/DevSpace-Hosting
*/

add_action('wp_loaded', 'check_network_resource_abuse');
    function check_network_resource_abuse() {	

    	if(($GLOBALS['pagenow'] == 'wp-login.php') == false && is_admin() == false) {

			// Check subsite storage space.
			if(get_space_used() > get_space_allowed())
				suspend_website_mrm();
    	}    	
    }

function suspend_website_mrm() {
	wp_redirect(plugins_url( 'multisite-resources-abused/html/website-suspended.html', dirname(__FILE__) ));
	exit;
}

?>
