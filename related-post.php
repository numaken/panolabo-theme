<div class="relatedposts">
<h4 class="sub-midashi">関連記事</h4>

<?php
	$orig_post = $post;
	global $post;
	$tags = wp_get_post_tags($post->ID);

	if ($tags) {
		$tag_ids = array();
		foreach($tags as $individual_tag)
		$tag_ids[] = $individual_tag->term_id;
		$args = array(
			'tag__in' => $tag_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page'=>5, // 表示する関連記事の数
			'caller_get_posts'=>1
	);

	$my_query = new wp_query( $args );
	while( $my_query->have_posts() ) {
		$my_query->the_post();
	?>

	<div class="relatedthumb clearfix">
		<a href="<? the_permalink()?>"><?php the_post_thumbnail(array(80,80)); ?>
		<h5><?php the_title(); ?></h5>
		</a>
		<p class="spnone"><?php echo esc_attr( $post->my_description ); ?></p>
	</div>

	<?php } // while文ここまで
	} // IF文ここまで
	$post = $orig_post;
	wp_reset_query();
	?>
</div>