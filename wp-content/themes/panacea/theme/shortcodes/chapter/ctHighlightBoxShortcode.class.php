<?php
/**
 * ctChapterMiniCf shortcode
 * Mini contact form
 */
class ctHighlightBoxShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Highlight Box';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'highlight_box';
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
		$html ='
		<div'.$this->buildContainerAttributes(array('class'=>array('dashedBox'.'flat')),$atts).'>
            '.do_shortcode($content).'
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
			'content' => array('label' => __('content', 'ct_theme'), 'default' => '', 'type' => 'textarea')
		);
	}
}

new ctHighlightBoxShortcode();

