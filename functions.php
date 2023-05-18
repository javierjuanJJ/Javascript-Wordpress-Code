<?php

function ow_register_plugin()
{
	add_menu_page(
		__('Openwebinars', 'textdomain'),
		'OpenWebinars'
		,'manage_options',
		'openwebinars',
		'ow_menu_page',
		'',
		null
	);
}

function ow_menu_page()
{
	echo '<h1>Hello World</h1>';
}

add_action('admin_menu','ow_register_plugin');
