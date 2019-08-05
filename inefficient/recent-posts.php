<?php

function iwt_last_posts() {
	$args = array(
		'post_type'        => 'post',
		'posts_per_page'   => 3,
	);

	$query = get_posts( $args );

	if ( $query->have_posts() ): 
		while ( $query->have_posts() ) : $query->the_post(); ?>

			<div class="iwt-card">
				<a class='iwt-card__image' href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'small' ); ?>
				</a>
				<div class="iwt-card__text">
					<h3 class="iwt-card__title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
				</div >
			</div>

		<?php endwhile; ?>
	<?php endif; 
}