<?php

function ow_register_plugin3()
{
	add_menu_page(
		__('Openwebinars3', 'textdomain'),
		'OpenWebinars3'
		,'manage_options',
		'openwebinars3',
		'ow_menu_page3',
		'',
		null
	);
}

function ow_menu_page3()
{
	echo '
<input type="text" id="ow-post-title-text" placeholder="Write a title post">
<br>
<textarea id="ow-post-content-text" placeholder="Write a content post"></textarea>
<br>

<input type="button" id="ow-create-post-button" value="Create post">';
}

add_action('admin_menu','ow_register_plugin3');



function ow_enqueue_script6()
{
	wp_register_script(
		'ow-js4',
		get_theme_file_uri('assets/js/openwebinars-script4.js'),
		array('jquery'),
		time(),
		false,
	);

	wp_localize_script(
		'ow-js4',
		'ajax_object',
		array(
			'url' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'ow-nonce' ),
		),
	);

	wp_enqueue_script('ow-js4');
}

add_action('admin_enqueue_scripts', 'ow_enqueue_script6');

function my_create_wordpress_post_programmatically(){
	$wordpress_post = array(
		'post_title' => $_POST['title'],
		'post_content' => $_POST['content'],
		'post_status' => 'publish',
		'post_author' => 1,
		'post_type' => 'post'
	);

	wp_insert_post( $wordpress_post );
	wp_die();
}

add_action('wp_ajax_ow_action4','my_create_wordpress_post_programmatically');