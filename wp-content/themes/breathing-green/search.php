<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	<div class="et_pb_section" style="padding: 10% 0 50px; background: url(wp-content/uploads/2018/07/pureplant-title-bg.jpg); background-size: cover;">
		<div class="et_pb_row">
			<h1 style="text-align: center; color: #fff;"><?php _e('Search results for: '); ?><?php echo get_search_query(); ?></h1>
		</div>
	</div>
	
	<div class="container" style="padding-bottom: 58px;">
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<?php if ( have_posts() ) {
				while ( have_posts() ) {
					the_post(); ?>
				<article style="border-bottom: 1px solid #e9e9e9; padding-top: 25px;">
					<h3 style="margin-bottom: 5px;"><a href="<?php the_permalink(); ?>"><?php  echo get_the_title(); ?></a></h3>
					<a class="green_cta_button" style="margin-bottom: 25px;" href="<?php the_permalink(); ?>"><?php _e('Learn More'); ?></a>
				</article>

				<?php } ?>
			<?php } ?>
			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php

get_footer();