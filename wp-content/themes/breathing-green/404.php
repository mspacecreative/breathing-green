<?php get_header(); ?>

<div id="main-content">
	<div class="et_pb_section" style="padding: 10% 0 50px; background: url(../wp-content/uploads/2018/07/pureplant-title-bg.jpg); background-size: cover;">
		<div class="et_pb_row">
			<h1 style="text-align: center; color: #fff;"><?php esc_html_e('No Results Found','breathing-green'); ?></h1>
		</div>
	</div>
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
				<article id="post-0" <?php post_class( 'et_pb_post not_found' ); ?>>
					<p><?php esc_html_e('The page you requested could not be found. Try refining your search, or use the navigation above.','breathing-green'); ?></p>
				</article> <!-- .et_pb_post -->
			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php

get_footer();
