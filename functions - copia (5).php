<?php

function ow_send_data()
{
	echo 'Hola, ' . $_POST['name'];
	wp_die();
}

add_action('wp_ajax_ow_action2', 'ow_send_data');




function ow_register_plugin2()
{
	add_menu_page(
		__('Openwebinars2', 'textdomain'),
		'OpenWebinars2'
		,'manage_options',
		'openwebinars2',
		'ow_menu_page2',
		'',
		null
	);
}

function ow_menu_page2()
{
	echo '<input type="button" id="ow-load-button" value="Load Posts">';
}

add_action('admin_menu','ow_register_plugin2');



function ow_enqueue_script5()
{
	wp_register_script(
		'ow-js3',
		get_theme_file_uri('assets/js/openwebinars-script3.js'),
		array('jquery'),
		time(),
		false,
	);

	wp_localize_script(
		'ow-js3',
		'ajax_object',
		array(
			'url' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'ow-nonce' ),
		),
	);

	wp_enqueue_script('ow-js3');
}

add_action('admin_enqueue_scripts', 'ow_enqueue_script5');