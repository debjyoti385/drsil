<?php
/**
 * ctChapter shortcode
 *
 */
class ctIconTextShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Icon text';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'icon_text';
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
	 *
	 */
	public function handle($atts, $content = null) {
		extract(shortcode_atts($this->extractShortcodeAttributes($atts), $atts));

		$iconHtml = $icon ? '<i class="' . $icon . '"></i>' : '';
		$html = '
          <div'.$this->buildContainerAttributes(array('class'=>array('iconBox')),$atts).'>
            '. $iconHtml . '
            <span>'. $label .'</span>'.$content.'
           </div>
       ';
		return $html;
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'icon' => array('icon' => __('Icon', 'ct_theme'), 'type' => "icon", 'default' => '', 'link' => CT_THEME_ASSETS . '/shortcode/awesome/index.html'),
			'label' => array('label' => __('Label', 'ct_theme'), 'default' => '', 'type' => 'input'),
			'content' => array('label' => __('content', 'ct_theme'), 'default' => '', 'type' => 'textarea')
		);
	}
}

new ctIconTextShortcode ();



 