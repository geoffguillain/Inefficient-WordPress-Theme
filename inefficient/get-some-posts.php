<?php

function iwt_get_some_posts( $limit = 1 ) {
	
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => min( intval( $limit ), 10 ),
		'paged'          => $paged,
		'post_status'    => 'publish',
		'orderby'        => 'rand',
	);

	$posts = new WP_Query( $args );

	return $posts;
}
