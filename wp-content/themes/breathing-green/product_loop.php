
<?php
/*
 * Loop through Categories and Display Posts within
 */
$post_type = 'products';
 
// Get all the taxonomies for this post type
$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type, 'order' => 'DESC' ) );
 
foreach( $taxonomies as $taxonomy ) :
 
    // Gets every "category" (term) in this taxonomy to get the respective posts
    $terms = get_terms( $taxonomy );
 
    foreach( $terms as $term ) : ?>

        <?php
        $args = array(
                'post_type' => $post_type,
                'posts_per_page' => -1,  //show all posts
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'slug',
                        'terms' => $term->slug,
                    )
                )
 
            );
        $posts = new WP_Query($args);
 
        if( $posts->have_posts() ): ?> 
        
         <h1 class="category-title"><?php echo $term->name; ?></h2>
         
         <ul class="products-list clearfix">
         
	        <?php while( $posts->have_posts() ) : $posts->the_post(); ?>
	        	
					<li class="product-box clearfix">
						<div class="product-icon-container">
							<?php if ( has_post_thumbnail() ) {
							    the_post_thumbnail();
							} ?>
						</div>
	        					   			
						<div class="copy-container">
							<h3><?php  echo get_the_title(); ?></h3>
									   			
							<?php the_content(); ?>
									   			                       
							<ul>
							   	<?php if( get_field('thc_content') ): ?>
							   	<li><?php _e('THC Content: '); ?><?php the_field('thc_content'); ?><?php _e('%'); ?></li>
							   	<!--<li class="progress-bar" style="margin-bottom: 10px;">
							   		<span class="progress-bar-inner"></span>
							   		<span class="hidden-graph"><span class="animate" style="transform: scaleX(<?php the_field('animated_graph'); ?>);"></span></span>
							   	</li>-->
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
	 
	        <?php endwhile; endif; ?>
        
        </ul>
 
    <?php endforeach;
 
endforeach; ?>