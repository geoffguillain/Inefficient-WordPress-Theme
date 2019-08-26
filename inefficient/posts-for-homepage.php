<?php
/**
 * Get 3 posts that are not hidden if displayed on the homepage
 */
function iwt_posts_for_homepage() {
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
		'meta_query'     => array(
			array(
				'meta_key'   => 'hide_on_homepage',
				'meta_value' => false,
			),
		),
	);

	$query = new WP_Query( $args );

	return $query;
}
