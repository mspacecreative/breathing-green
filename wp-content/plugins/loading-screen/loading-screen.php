<?php
/*
 * Plugin Name: Loading Screen
 * Plugin URI: http://mspacecreative.com
 * Description: Shows animated logo and black screen during page load
 * Version: 1.0
 * Author: Matt Cyr
 * Author URI: http://mspacecreative.com
 */
 
 function page_loading() {
 	wp_enqueue_style( 'loading-css', plugin_dir_url( __FILE__ ) . 'css/cover.css', array(), null );
 	wp_enqueue_script( 'loading-script', plugin_dir_url( __FILE__ ) . 'js/cover.js', array(), null );
 }
 
 function page_cover() {
 		ob_start(); ?>
 			<div id="cover">
 				<div class="loader-container">
 					<i class="fa fa-spinner fa-pulse" aria-hidden="true"></i>
 				</div>
 			</div>
 		<?php echo ob_get_clean();
 }
 	
 add_action( 'wp_head', 'page_cover' );
 add_action( 'wp_enqueue_scripts', 'page_loading' );