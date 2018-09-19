<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	<div class="et_pb_section" style="padding: 10% 0 50px; background: url(../../../wp-content/uploads/2018/07/pureplant-title-bg.jpg); background-size: cover;">
		<div class="et_pb_row">
			<h1 style="text-align: center; color: #fff;"><?php echo single_cat_title(); ?></h1>
		</div>
	</div>
	<div class="container" style="padding-bottom: 58px; max-width: 850px;">
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<ul class="products-list clearfix">
				<?php while ( have_posts() ) : the_post(); ?>
				<li class="product-box clearfix">
					<div class="product-icon-container">
						<?php if ( has_post_thumbnail() ) {
						    the_post_thumbnail();
						} ?>
					</div>
							   			
					<div class="copy-container">
                                               <h3><a href="<?php the_permalink(); ?>"><?php  echo get_the_title(); ?></a></h3>
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
						<!--<a class="green_cta_button" href="#">--><p><?php _e('Coming soon…'); ?></p><!--</a>-->

	<a class="green_cta_button" href="<?php the_permalink(); ?>"><?php _e('Learn More'); ?></a>
<?php endif; ?>
					</div>
							   			
				</li>

			<?php endwhile; ?>
			</ul>
			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php

get_footer();