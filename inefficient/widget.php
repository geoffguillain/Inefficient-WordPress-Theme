<?php

class IWP_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'iwp_widget',
			'description' => 'This widget displays 3 random results about test',
		);
		parent::__construct( 'iwp_widget', 'My inefficient Widget', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget.
		$query = new WP_Query( array( 's' => 'test', 'posts_per_page' => 3, 'orderby' => 'rand' ) );
		
		if ( $query->have_posts() ) {
			echo '<ul>';
			while ( $query->have_posts() ) {
				$query->the_post();
				echo '<li><a href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></li>';
			}
			echo '</ul>';
		}
	}

}

add_action( 
	'widgets_init',
	function() {
		register_widget( 'IWP_Widget' );
	}
);
