<?php

function iwt_posts_already_shown( $id = null ) {
	static $posts;
	if ( ! isset( $posts ) ) {
		$posts = array();
	}
	if ( ! is_null( $id ) ) {
		$posts[] = $id;
	}
	return $posts;
}

function iwt_more_by_author() {
	$author = get_the_author_meta( 'ID' );
	
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
		'post_status'    => 'publish',
		'author'         => $author,
	);

	$display_name = get_the_author();

	$args[ 'post__not_in' ] = iwt_posts_already_shown();

	$author_query = new WP_Query( $args );

	if ( $author_query->have_posts() ) : ?> 
		<h2 class="author-name">Read More from <?php echo esc_html( $display_name ); ?>:</h2> 
		<?php while ( $author_query->have_posts() ) : $author_query->the_post(); ?>
			<div class="iwt-card">
				<a class='iwt-card__image' href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'small' ); ?>
				</a>
				<div class="iwt-card__text">
					<h3 class="iwt-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				</div >
			</div>
			<?php 
		endwhile;
	endif;
	wp_reset_postdata();
}
