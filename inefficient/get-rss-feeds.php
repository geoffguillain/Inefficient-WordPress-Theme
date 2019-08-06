<?php

function get_rss_feeds() {
	
	$iwt_feeds = array(
		'http://mydomain.com/category1/feed/',
		'http://mydomain.com/category2/feed/',
		'http://mydomain.com/category3/feed/',
		'http://mydomain.com/category4/feed/',
		'http://mydomain.com/category5/feed/',
	);

	$rss = fetch_feed( $iwt_feeds );

	$maxitems = 0;

	if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly
		// Figure out how many total items there are, but limit it to 20. 
		$maxitems = $rss->get_item_quantity( 20 );
		// Build an array of all the items, starting with element 0 (first element).
		$rss_items = $rss->get_items( 0, $maxitems );
	endif;
	?>

	<ul>
		<?php if ( $maxitems === 0 ) : ?>
			<li><?php echo( 'No items' ); ?></li>
		<?php else : ?>
			<?php // Loop through each feed item and display each item as a hyperlink. ?>
			<?php foreach ( $rss_items as $item ) : ?>
				<li>
					<a href="<?php echo esc_url( $item->get_permalink() ); ?>"
						title="<?php echo 'Posted ' . esc_html( $item->get_date('j F Y | g:i a') ); ?>">
						<?php echo esc_html( $item->get_title() ); ?>
					</a>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>

	<?php
}
