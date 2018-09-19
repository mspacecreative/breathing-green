<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	<?php 
	$id=51; 
	$post = get_post($id); 
	$content = apply_filters('the_content', $post->post_content); 
	echo $content;  
	?>
</div> <!-- #main-content -->

<?php

get_footer();