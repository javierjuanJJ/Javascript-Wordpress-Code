<?php

function ow_enqueue_script2()
{
	wp_register_script(
		'ow-js',
		get_theme_file_uri('assets/js/openwebinars-script.js'),
		array('jquery'),
		time(),
		false,
	);
	if (is_home() || is_front_page()) {
		wp_enqueue_script('ow-js');
	}
}

add_action('wp_enqueue_scripts', 'ow_enqueue_script2');