<?php
/**
 * ctChapter shortcode
 */
class ctIconBoxShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Icon Box';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'icon_box';
	}

	/**
	 * Returns shortcode type
	 * @return mixed|string
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
		return do_shortcode('
            <div'.$this->buildContainerAttributes(array('class'=>array('serviceEl')),$atts).'>
                <div class="bigIcon">
                    <i class=" '. $icon .' "></i>
                </div>
                <div class="btmBx">
                    <h4>'. $title .'</h4>
					<p>'. $text . '</p>
                    <div class="divider-triangle"></div>
                </div>
                '. $content .'
            </div>');
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'icon' => array('icon' => __('Icon', 'ct_theme'), 'type' => "icon", 'default' => '', 'link' => CT_THEME_ASSETS . '/shortcode/awesome/index.html'),
			'title' => array('title' => __('Title', 'ct_theme'), 'default' => '', 'type' => 'input'),
			'text' => array('text' => __('Text', 'ct_theme'), 'default' => '', 'type' => 'input')
		);
	}

	/**
	 * Child shortcode info
	 * @return array
	 */

	public function getChildShortcodeInfo() {
		return array('name' => 'icon_box_item', 'min' => 0, 'max' => 20, 'default_qty' => 1);
	}
}

new ctIconBoxShortcode();



