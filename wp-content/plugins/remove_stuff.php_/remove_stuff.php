<?php
/* 
Plugin Name: M Space Deregister WordPress Stuff
Plugin URI: http://mspacecreative.com
Description: Removes unwanted functionality in backend
Version: 1.0
Author: Matt Cyr
Author URI: http://mspacecreative.com
*/

function remove_menus(){
  
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'edit-comments.php' );          //Comments
  
}

// Removes Comments from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');			//Comments
	$wp_admin_bar->remove_node( 'new-post' );		//Posts
	$wp_admin_bar->remove_node( 'new-popuppress' );	//Popup Press
}

add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );
add_action( 'admin_menu', 'remove_menus' );