<?php
/*
 * Plugin Name: M Space Product Filter
 * Plugin URI: http://mspacecreative.com
 * Description: Filter products by strain
 * Version: 1.0
 * Author: Matt Cyr
 * Author URI: http://mspacecreative.com
 */

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 
// Creating the widget 
class wpb_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'wpb_widget', 
 
// Widget name will appear in UI
__('Products Filter', 'wpb_widget_domain'), 
 
// Widget description
array( 'description' => __( 'Filter products by strain', 'wpb_widget_domain' ), ) 
);
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
 
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title']; ?>
 
<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
	<?php
		if( $terms = get_terms( 'strain' ) ) : // to make it simple I use default categories
			echo '<select name="strainfilter">';
			echo '<option value="' . $terms . '">All Strains</option>';
			foreach ( $terms as $term ) :
				echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
			endforeach;
			echo '</select>';
		endif;
	?>
	<button>Apply filter</button>
	<input type="hidden" name="action" value="myfilter">
</form>
<?php echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

function misha_filter_function(){

	$args = array(
		'orderby' => 'date', // we will sort posts by date
		'order'	=> 'ASC' // ASC or DESC
	);
 
	// for taxonomies / categories
	if( isset( $_POST['strainfilter'] ) )
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'strain',
				'field' => 'id',
				'terms' => $_POST['strainfilter'],
			)
		);
		
 	$query = new WP_Query( $args );
 	
 	if( $query->have_posts() ) : ?>
 
	<ul class="products-list clearfix">
		
		<?php while( $query->have_posts() ): $query->the_post(); ?>
			
			<li class="product-box clearfix" id="post-<?php the_ID(); ?>">
				<div class="product-icon-container">
					<?php if ( has_post_thumbnail() ) {
					    the_post_thumbnail();
					} ?>
				</div>
						   			
				<div class="copy-container">
					<h3><?php  echo get_the_title(); ?></h3>
					<p><?php _e('Strain: '); ?><?php echo get_the_term_list( $post->ID, 'strain' ); ?></p>
							   			
					<?php the_content(); ?>
							   			                       
					<ul>
					   	<?php if( get_field('thc_content') ): ?>
					   	<li><?php _e('THC Content: '); ?><?php the_field('thc_content'); ?><?php _e('%'); ?></li>
					   	<li class="progress-bar animatedParent animateOnce" style="margin-bottom: 10px;">
									   		<span class="animated slideIn" style="width: <?php the_field('animated_graph'); ?>%; left: -<?php the_field('animated_graph'); ?>%; transform: translateX(-<?php the_field('animated_graph'); ?>%);"></span>
									   	</li>
					   	<?php endif; ?>
					   	<?php if( get_field('cbd_content') ): ?>
					   	<li><?php _e('CBD Content: '); ?><?php the_field('cbd_content'); ?><?php _e('%'); ?></li>
					   	<?php endif; ?>
					</ul>
					
					<?php if(get_field('product_link') ): ?>
					<!--<a class="green_cta_button" href="#">--><p style="margin-top: 25px;"><?php _e('Coming soon…'); ?></p><!--</a>-->
					<?php endif; ?>
				</div>
						   			
			</li>
		<?php endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found'; ?>
	
	</ul>
	
	<?php endif; ?>
 
	<?php die();
}

add_action('wp_ajax_myfilter', 'misha_filter_function'); 
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');