<?php
/*
Plugin Name: Multisite Resource Monitor
Plugin URI: https://marcwoodyard.com
Description: Checks to make sure that all subsites aren't abusing network resources.
Version: 1.0
Author: Marc Woodyard
Author URI: https://marcwoodyard.com
*/

add_action('muplugins_loaded', 'check_subsite_for_resource_abuse');

    function check_subsite_for_resource_abuse()
    {
        //Lets set some variables.
        $space_allowed = get_space_allowed();
	    $space_used = get_space_used();
	    
	    if((!is_admin()) && $space_used > $space_allowed)
	    {
	        //Looks like we found a rule breaker.
	        wp_redirect( 'https://YourDomain.com/Error_Page.html' );
	        exit;
	    }
	    //Looks like they're playing by the rules.
    }

?>
