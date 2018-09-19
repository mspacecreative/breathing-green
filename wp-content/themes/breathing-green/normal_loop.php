<div class="product-loading"><i class="fa fa-spinner fa-pulse" aria-hidden="true"></i></div>
<div id="response">
	<?php
	$post_type = 'products';
	 
	// Get all the taxonomies for this post type
	$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type, 'order' => 'DESC', ) );
	 
	foreach( $taxonomies as $taxonomy ) :
	
		$terms = get_terms( $taxonomy );
		
		foreach( $terms as $term ) : ?>
		
		        <?php
		        $args = array(
		                'post_type' => 'products',
		                'posts_per_page' => -1,
		                'tax_query' => array(
		                    array(
		                        'taxonomy' => $taxonomy,
		                        'field' => 'slug',
		                        'terms' => $term->slug
		                    )
		                )
		 
		            );
		        $posts = new WP_Query($args);
		        if( $posts->have_posts() ): ?>
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
									<p><?php _e('Strain: '); ?><?php echo get_the_term_list( $post->ID, 'strain' ); ?></p>
											   			
									<?php the_content(); ?>
											   			                       
									<ul>
									   	<?php if( get_field('thc_content') ): ?>
									   	<li><?php _e('THC Content: '); ?><?php the_field('thc_content'); ?><?php _e('%'); ?></li>
									   	<li class="progress-bar animatedParent animateOnce">
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
				endif; ?>
				</ul>
		<?php endforeach;
	endforeach; ?>
</div>