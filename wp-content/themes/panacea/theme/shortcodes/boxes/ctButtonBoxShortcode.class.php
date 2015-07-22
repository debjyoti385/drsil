<?php
/**
 * Button Box shortcode
 */
class ctButtonBoxShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Button box';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'button_box';
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
		if($title!=''){
			$title='<h4>'.$title.'</h4>';
		}
		return '
			<div'.$this->buildContainerAttributes(array('class'=>array('boxButton')),$atts).'>
                <div class="buttonFrame">
                	'.$title.'
                    <p>'.do_shortcode($content).'</p>
                </div>

                <a href="'.$link.'" class="boxColor">
	                <i class="'.$icon.'"></i>
	                <div class="click">'.$buttontext.'</div>
                </a>


			</div>
		';
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'buttontext' => array('label' => __('button text', 'ct_theme'), 'default' =>__('Click Here', 'ct_theme'), 'type' => 'input', 'help' => __("Button text", 'ct_theme')),
			'link' => array('label' => __('link', 'ct_theme'), 'default' => '', 'type' => 'input', 'help' => __("Button link", 'ct_theme')),
			'icon' => array('icon' => __('Icon', 'ct_theme'), 'type' => "icon", 'default' => '', 'link' => CT_THEME_ASSETS . '/shortcode/awesome/index.html'),
			'title' => array('title' => __('Title', 'ct_theme'), 'default' => '', 'type' => 'input'),
			'content' => array('label' => __('content', 'ct_theme'), 'default' => '', 'type' => "textarea"),
		);
	}
}

new ctButtonBoxShortcode();