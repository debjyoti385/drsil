<?php


$sections[] = array(
	'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_086_display.png',
	'title' => __('Layout', 'ct_theme'),
	'group' => __("Style", 'ct_theme'),
	'fields' => array(
		array(
			'id' => 'style_show_preloader',
			'title' => __("Show preloader?", 'ct_theme'),
			'type' => 'select',
			'options' => array('yes' => __('yes', "ct_theme"), 'no' => __('no', "ct_theme"),),
			'std' => 'yes'
		),
	)
);


$sections[] = array(
	'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_100_font.png',
	'title' => __('Font', 'ct_theme'),
	'group' => __("Style", 'ct_theme'),
	'fields' => array(
		array(
			'id' => 'style_font_style',
			'title' => __("Font style", 'ct_theme'),
			'type' => 'google_webfonts',
			'options' => array("Arial" => "Arial")
		),

		array(
			'id' => 'style_font_size',
			'type' => 'text',
			'std' => '16',
			'title' => __('Default font size (px)', 'ct_theme'),
		),
		array(
			'id' => 'style_font_size_h1',
			'type' => 'text',
			'std'=>61,
			'title' => __('H1 font size (px)', 'ct_theme'),
		),
		array(
			'id' => 'style_font_size_h2',
			'type' => 'text',
			'std'=>50,
			'title' => __('H2 font size (px)', 'ct_theme'),
		), array(
			'id' => 'style_font_size_h3',
			'type' => 'text',
			'std'=>36,
			'title' => __('H3 font size (px)', 'ct_theme'),
		),
		array(
			'id' => 'style_font_size_h4',
			'type' => 'text',
			'std'=>25,
			'title' => __('H4 font size (px)', 'ct_theme'),
		),
		array(
			'id' => 'style_font_size_h5',
			'type' => 'text',
			'std'=>18,
			'title' => __('H5 font size (px)', 'ct_theme'),
		),
		array(
			'id' => 'style_font_size_h6',
			'type' => 'text',
			'std'=>16,
			'title' => __('H6 font size (px)', 'ct_theme'),
		)
	)
);

$sections[] = array(
	'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_091_adjust.png',
	'title' => __('Color', 'ct_theme'),
	'desc' => __(sprintf("To setup colors please use built-in Wordpress Theme Customizer available %s", '<a href="' . admin_url('customize.php') . '">' . __('here', 'ct_theme') . '</a>'), 'ct_theme'),
	'group' => __("Style", 'ct_theme'),
	'fields' => array()
);