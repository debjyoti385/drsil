<?php
$sections[] = array(
	'icon' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_114_list.png',
	'title' => __('Socials', 'ct_theme'),
	'group' => __("Socials", 'ct_theme'),
	'fields' => array(
		array(
			'id' =>'fb',
			'title' =>__("Facebook username", 'ct_theme'),
			'type' => 'text'
		),
		array(
			'id' =>'twit',
			'title' =>__("Twitter username", 'ct_theme'),
			'type' => 'text'
		),
		array(
			'id' =>'google',
			'title' =>__("Google+ username", 'ct_theme'),
			'type' => 'text'
		),
		array(
			'id' =>'linkedin',
			'title' =>__("LinkedIn username", 'ct_theme'),
			'type' => 'text'
		),
		array(
			'id' =>'pinterest',
			'title' =>__("Pinterest username", 'ct_theme'),
			'type' => 'text'
		),
		array(
			'id' =>'dribbble',
			'title' =>__("Dribbble username", 'ct_theme'),
			'type' => 'text'
		),
		array(
			'id' =>'flickr',
			'title' =>__("Flickr username", 'ct_theme'),
			'type' => 'text'
		),
		array(
			'id' =>'tumblr',
			'title' =>__("Tumblr username", 'ct_theme'),
			'type' => 'text'
		),
		array(
			'id' =>'instagram',
			'title' =>__("Instagram username", 'ct_theme'),
			'type' => 'text'
		),
		array(
			'id' =>'youtube',
			'title' =>__("Youtube movie", 'ct_theme'),
			'type' => 'text'
		),
		array(
			'id' =>'vimeo',
			'title' =>__("Vimeo url - with http://", 'ct_theme'),
			'type' => 'text'

		),
		array(
			'id' =>'phone',
			'title' =>__("Phone number to call by Skype", 'ct_theme'),
			'type' => 'text'
		),
		array(
			'id' =>'skype',
			'title' =>__("Skype user", 'ct_theme'),
			'type' => 'text'
		),
		array(
			'id' =>'email',
			'title' =>__("Email address", 'ct_theme'),
			'type' => 'text'
		),
		array(
			'id' =>'rss',
			'title' =>__("Rss", 'ct_theme'),
			'type' => 'select',
			'options' => array('yes' => "yes", 'no' => "no"),
			'std' => 'no'
		)

	)
)
?>
