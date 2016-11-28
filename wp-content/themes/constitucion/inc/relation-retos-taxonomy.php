<?php
function create_taxonomy_retos( $post_id, $post ) {
	// file_put_contents(
	// 	'/Users/alejandrosandoval/Desktop/php.txt',
	// 	var_export( $post, true )
	// );

	if ($post->post_type != 'grandes-retos' )
		return '';

	if ($post->post_status == 'trash') {
		$category = get_term_by('slug', $post->post_name, 'taxonomy-grandes-retos');
		wp_delete_term( $category->term_id, 'taxonomy-grandes-retos' );
		return '';
	}

	$term_name = trim($post->post_title);

	if ( ! term_exists( $post->post_name, 'taxonomy-grandes-retos' ) ){
		wp_insert_term( $term_name, 'taxonomy-grandes-retos', array('slug' => $post->post_name) );
	}

}
add_action( 'wp_insert_post', 'create_taxonomy_retos', 10, 3 );