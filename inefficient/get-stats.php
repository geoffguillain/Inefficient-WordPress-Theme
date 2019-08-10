<?php

function iwt_get_stats( $post_type = 'post', $year = null ) {
	$posts = get_transient( 'posts-stats-'. $post_type );
 
    if ( false === $posts ) {
		$args = array(
			'posts_per_page' => -1,
			'post_type' => $post_type,
			'date_query' => array(
				array(
					'year'  => $year,
				),
			),
    	);
		$posts = new WP_Query( $args ); 
        set_transient( 'posts-stats-' . $post_type, $posts, 2 * HOUR_IN_SECONDS );
    }
 
    return $posts->post_count;
}
