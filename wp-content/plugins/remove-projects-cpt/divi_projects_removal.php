<?php

/*
 * Plugin Name: Remove Projects CPT
 * Plugin URI: http://mspacecreative.com
 * Description: remove the default projects CPT from the menu
 * Version: 1.0
 * Author: Matt Cyr
 * Author URI: http://mspacecreative.com
 */
 
function mytheme_et_project_posttype_args( $args ) {
	return array_merge( $args, array(
		'public'              => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'show_in_nav_menus'   => false,
		'show_ui'             => false
	));
}
add_filter( 'et_project_posttype_args', 'mytheme_et_project_posttype_args', 10, 1 );