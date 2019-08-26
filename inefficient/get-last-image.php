<?php

function iwt_get_last_image( $post_id ) {
	$args = array(
		'order'          => 'DESC',
		'post_mime_type' => 'image',
		'post_parent'    => $post_id,
		'post_status'    => inherit,
		'post_type'      => 'attachment',
	);
 
	$attachments = get_children( $args );
 
	if ( $attachments ) {
		$rekeyed_array = array_values( $attachments );
		$child_image   = $rekeyed_array[0]; 
		echo '<img src="' . esc_url( wp_get_attachment_url( $child_image->ID ) ) . '" class="current" />';
	}
}
