<?php

function iwt_load_more( $perPage = 5 ) {
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $perPage,
		'paged' => $paged,
		'post_status' => 'publish',
	);
	$my_query = new WP_Query( $args );
	$args['posts_per_page'] = -1;
	$my_query_num_rows = new WP_Query( $args );

	if ( $my_query->have_posts() ) :
		while ( $my_query->have_posts() ) : $my_query->the_post();
		echo '<div class="iwt-card">';
			echo esc_html( get_the_title() );
		echo '</div>';
		endwhile;
	endif;

	$show_load_more = false;
	if ( $paged * $perPage < $my_query_num_rows->post_count ) {
		$show_load_more = true;
	}

	if ( true === $show_load_more ) {
		echo '<button>Load more</button>';
	}
}