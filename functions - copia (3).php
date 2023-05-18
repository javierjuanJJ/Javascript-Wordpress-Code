<?php

function ow_enqueue_script3( $hook )
{
	wp_register_script(
		'ow-js',
		get_theme_file_uri('assets/js/openwebinars-script.js'),
		array('jquery'),
		time(),
		false,
	);
	if ($hook == 'index.php') {
		wp_enqueue_script('ow-js');
	}
}

add_action('admin_enqueue_scripts', 'ow_enqueue_script3');