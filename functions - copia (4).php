<?php

function ow_enqueue_script4()
{
	wp_register_script(
		'ow-js2',
		get_theme_file_uri('assets/js/openwebinars-script2.js'),
		array('jquery'),
		time(),
		false,
	);

	wp_localize_script(
		'ow-js2',
		'ajax_object',
		array(
			'url' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'ow-nonce' ),
			'hook' => 'ow_action',
		),
	);

	wp_enqueue_script('ow-js2');
}

add_action('wp_enqueue_scripts', 'ow_enqueue_script4');

function ow_load_posts() {
	$posts = new WP_Query(
		array(
			'post_type' => 'post',
			'post_per_page' => 5,
		)
	);

	if ($posts->have_posts()){
		echo '<ul>';

		while ($posts->have_posts()){
			$posts->the_post();
			echo '<li><a href="' . get_the_permalink() . '"> ' . get_the_title() . '</a> </li>';
		}

		echo '</ul>';
	}

	wp_die();

}

add_action('wp_ajax_ow_action', 'ow_load_posts');