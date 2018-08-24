<?php

/* MAIN STYLESHEET */
function my_theme_enqueue_styles() {

	$parent_style = 'parent-style';
	
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ));
	
	wp_register_style('animate', get_stylesheet_directory_uri() . '/css/animations.css', array(), '1.0', 'all');
	wp_enqueue_style('animate');
	
	//wp_register_style('slick-theme-css', get_stylesheet_directory_uri() . '/css/slick-theme.css', array(), '1.0', 'all');
	//wp_enqueue_style('slick-theme-css');
	
	//wp_register_style('para-styles', get_stylesheet_directory_uri() . '/js/dzsparallaxer/dzsparallaxer.css', array(), '1.0', 'all');
	//wp_enqueue_style('para-styles');
}

function footer_scripts() {
	
	wp_register_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
	wp_enqueue_script('scripts');
	
	wp_register_script('fontawesome', 'https://use.fontawesome.com/6ccd600e51.js', array('jquery'), null, true);
	wp_enqueue_script('fontawesome');
	
	wp_register_script('animate-it', get_stylesheet_directory_uri() . '/js/css3-animate-it.js', array('jquery'), null, true);
	wp_enqueue_script('animate-it');
	
	//wp_register_script('scrollreveal', 'https://unpkg.com/scrollreveal/dist/scrollreveal.min.js', array('jquery'), null, true);
	//wp_enqueue_script('scrollreveal');
	
	//wp_register_script('masonry-js', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array('jquery'), null, true);
	//wp_enqueue_script('masonry-js');
	
	//wp_register_script('images-loaded', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array('jquery'), null, true);
	//wp_enqueue_script('images-loaded');
	
	//wp_register_script('object-fit', get_stylesheet_directory_uri() . '/js/fitie.js', array('jquery'), null, true);
	//wp_enqueue_script('object-fit');
}

// Callback function to insert 'styleselect' into the $buttons array
function my_new_mce_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons', 'my_new_mce_buttons' );


// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
    // Define the style_formats array
    $style_formats = array(
            array(
                'title' => 'CTA Button',
                'block' => 'a',
                'classes' => 'cta_button',
                'wrapper' => true
                ),
            array(
                'title' => 'Green CTA Button',
                'block' => 'a',
                'classes' => 'green_cta_button',
                'wrapper' => true
                ),
            array(
                'title' => 'Heading with green line rule',
                'block' => 'h1',
                'classes' => 'overline-heading'
                ),
            array(
                'title' => 'White Intro Heading',
                'block' => 'h1',
                'classes' => 'wh-intro-heading'
                ),
            array(
                'title' => 'Option Box Title',
                'block' => 'h1',
                'classes' => 'option-box-title'
                )
        );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  

    return $init_array;  

}

// ACF OPTIONS PAGE
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

// ALLOW EDITORS TO VIEW APPEARANCE MENU ITEM
$role_object = get_role( 'editor' );

// add $cap capability to this role object
$role_object->add_cap( 'edit_theme_options' );

// PRODUCTS LOOP
function product_loop() {
	ob_start();
		include('product_loop.php');
	return ob_get_clean();
}

// INCLUDE CPT IN CATEGORIES
function custom_post_type_cat_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_category()) {
      $query->set( 'post_type', array( 'post', 'products' ) );
    }
  }
}

/* ACTIONS & FILTERS */
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
add_action('init', 'footer_scripts');
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );
/* SHORTCODES */
add_shortcode( 'product_loop', 'product_loop' );
/* CPT IN CATEGORIES */
add_action('pre_get_posts','custom_post_type_cat_filter');