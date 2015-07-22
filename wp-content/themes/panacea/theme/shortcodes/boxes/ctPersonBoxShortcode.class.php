<?php
/**
 * Person Box shortcode
 */
class ctPersonBoxShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Person box';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'person_box';
	}

	/**
	 * Shortcode type
	 * @return string
	 */
	public function getShortcodeType() {
		return self::TYPE_SHORTCODE_ENCLOSING;
	}


	/**
	 * Handles shortcode
	 * @param $atts
	 * @param null $content
	 * @return string
	 */
	public function handle($atts, $content = null) {
		extract(shortcode_atts($this->extractShortcodeAttributes($atts), $atts));
		$socials = '';
		if ($fb != ' ') {
			$socials .= 'fb="' . $fb . '" ';
		}
		if ($twit != ' ') {
			$socials .= 'twit ="' . $twit . '" ';
		}
		if ($google != ' ') {
			$socials .= 'google="' . $google . '" ';
		}
		if ($linkedin != ' ') {
			$socials .= 'linkedin="' . $linkedin . '" ';
		}
		if ($pinterest != ' ') {
			$socials .= 'pinterest="' . $pinterest . '" ';
		}
		if ($dribbble != ' ') {
			$socials .= 'dribbble="' . $dribbble . '" ';
		}
		if ($flickr != ' ') {
			$socials .= 'flickr="' . $flickr . '" ';
		}
		if ($tumblr != ' ') {
			$socials .= 'tumblr="' . $tumblr . '" ';
		}
		if ($instagram != ' ') {
			$socials .= 'instagram="' . $instagram . '" ';
		}
		if ($youtube != ' ') {
			$socials .= 'youtube="' . $youtube . '" ';
		}
		if ($vimeo != ' ') {
			$socials .= 'vimeo="' . $vimeo . '" ';
		}
		if ($phone != ' ') {
			$socials .= 'phone="' . $phone . '" phonelabel="'.$phonelabel.'" ';
		}
		if ($skype != ' ') {
			$socials .= 'skype ="' . $skype . '" ';
		}
		if ($email != ' ') {
			$socials .= 'email ="' . $email . '" emaillabel="'.$emaillabel.'" ';
		}
		$socials = '[socials ' . $socials . ']';

		return do_shortcode('
			<div'.$this->buildContainerAttributes(array('class'=>array('personBox','btmBx')),$atts).'>
                <div class="simpleFrame">
	                <img src="'. $imgsrc .'" alt="">
                </div>
                <h4>
	                '. $header .'
                    <span>'. $subheader .'</span>
                </h4>
               '.$socials .'
				<p>'.$content.'</p>
				<div class="divider-triangle"></div>
            </div>');
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'imgsrc' => array('label' => __("source", 'ct_theme'), 'default' => '', 'type' => 'image', 'help' => __("Image", 'ct_theme')),
			'header' => array('label' => __('header', 'ct_theme'), 'default' => '', 'type' => 'input', 'help' => __("Header text", 'ct_theme')),
			'subheader' => array('label' => __('subheader', 'ct_theme'), 'default' => '', 'type' => 'input', 'help' => __("Subheader text", 'ct_theme')),
			'content' => array('label' => __('content', 'ct_theme'), 'default' => '', 'type' => "textarea"),
			'fb' => array('label' => __("Facebook username", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'twit' => array('label' => __("Twitter username", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'dribbble' => array('label' => __("Dribbble username", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'google' => array('label' => __("Google+ username", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'linkedin' => array('label' => __("LinkedIn username", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'pinterest' => array('label' => __("Pinterest username", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'flickr' => array('label' => __("Flickr username", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'tumblr' => array('label' => __("Tumblr username", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'instagram' => array('label' => __("Instagram username", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'youtube' => array('label' => __("Youtube movie", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'vimeo' => array('label' => __("Vimeo movie", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'phone' => array('label' => __("Phone number to call by Skype", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'phonelabel' => array('label' => __("Phone tooltip label", 'ct_theme'), 'default' => __("Phone", 'ct_theme'), 'type' => 'input'),
			'skype' => array('label' => __("Skype user", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'email' => array('label' => __("Email address", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'emaillabel' => array('label' => __("Email tooltip label", 'ct_theme'), 'default' => __("Email", 'ct_theme'), 'type' => 'input'),
		);
	}
}

new ctPersonBoxShortcode();