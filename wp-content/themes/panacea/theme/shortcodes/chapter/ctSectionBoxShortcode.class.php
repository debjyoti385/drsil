<?php
/**
 * ctChapter shortcode
 *
 */
class ctSectionBoxShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Section Box';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'section_box';
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
		$html    ='
          <h3'.$this->buildContainerAttributes(array('class'=>array('std','withIcon')),$atts).'><i class="'.$icon.'"></i>'.$title.'</h3><p>'.do_shortcode($content).'</p>
       ';
		return $html;

	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'icon' => array('label' => __('icon', 'ct_theme'), 'type' => "icon", 'default' => '','link'=>CT_THEME_ASSETS.'/shortcode/awesome/index.html'),
			'title' => array('label' => __('title', 'ct_theme'), 'default' => '', 'type' => 'input'),
			'content' => array('label' => __('content', 'ct_theme'), 'default' => '', 'type' => 'textarea'),
		);
	}
}

new ctSectionBoxShortcode();

 