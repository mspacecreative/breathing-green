<ul class="et-social-icons">

<li class="et-social-icon et-social-facebook">
	<a href="<?php the_field('facebook_link', 'options'); ?>" target="_blank" class="icon">
		<span><?php esc_html_e( 'Facebook', 'Divi' ); ?></span>
	</a>
</li>
<li class="et-social-icon et-social-twitter">
	<a href="<?php the_field('twitter_link', 'options'); ?>" target="_blank" class="icon">
		<span><?php esc_html_e( 'Twitter', 'Divi' ); ?></span>
	</a>
</li>
<li class="et-social-icon et-social-instagram">
	<a href="<?php the_field('instagram_link', 'options'); ?>" target="_blank" class="icon">
		<span><?php esc_html_e( 'Instagram', 'Divi' ); ?></span>
	</a>
</li>
<li class="et-social-icon et-social-linkedin">
	<a href="<?php the_field('linkedin_link', 'options'); ?>" target="_blank" class="icon">
		<span><?php esc_html_e( 'LinkedIn', 'Divi' ); ?></span>
	</a>
</li>
<?php if ( 'on' === et_get_option( 'divi_show_google_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-google-plus">
		<a href="<?php echo esc_url( et_get_option( 'divi_google_url', '#' ) ); ?>" class="icon">
			<span><?php esc_html_e( 'Google', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>
<?php if ( 'on' === et_get_option( 'divi_show_rss_icon', 'on' ) ) : ?>
<?php
	$et_rss_url = '' !== et_get_option( 'divi_rss_url' )
		? et_get_option( 'divi_rss_url' )
		: get_bloginfo( 'rss2_url' );
?>
	<li class="et-social-icon et-social-rss">
		<a href="<?php echo esc_url( $et_rss_url ); ?>" class="icon">
			<span><?php esc_html_e( 'RSS', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>

</ul>