<?php
//in which order we embed tabs
$order = array('general', 'style', 'pages', 'posts', 'portfolio', 'faq','socials', 'code', 'custom');
//$order = array('general','pages','posts','code');

$args['menu_title'] = __('Theme Options', 'ct_theme');
$args['page_title'] = __('Panacea Options', 'ct_theme');

$args['intro_text'] = __('Welcome to theme\'s options pages.', 'ct_theme');

$args['page_type'] = 'submenu';

$args['show_import_export'] = false;
$args['dev_mode'] = false;

$args['opt_name'] = 'panacea_options';
$args['page_position'] = 27;

$args['google_api_key'] = 'AIzaSyBmPRa5TGlBRbUUV-pVPU3GxXRkD4lBtUU';

$args['show_import_export'] = true;


?>