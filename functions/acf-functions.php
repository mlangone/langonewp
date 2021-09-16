<?php
/*
 * Include ACF pro in the theme
 */

// Define path and URL to the ACF plugin.
define( 'OI_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'OI_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Include the ACF plugin.
include_once( OI_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
	return OI_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
//add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
//function my_acf_settings_show_admin( $show_admin ) {
//	return false;
//}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {

	// remove original path (optional)
	unset($paths[0]);


	// append path
	$paths[] = get_stylesheet_directory() . '/includes/acf/acf-json';


	// return
	return $paths;

}