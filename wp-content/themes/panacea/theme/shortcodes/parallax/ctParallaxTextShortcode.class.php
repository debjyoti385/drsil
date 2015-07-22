<?php
/**
 * Dropcap shortcode
 */
class ctParallaxText extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Parallax Text';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'parallax_text';
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
		if ($title != '') {
			return do_shortcode('
				<div'.$this->buildContainerAttributes(array('class'=>array('container')),$atts).'>
					<h3>'.$title.'</h3>
					<p>'.$content.'<p>
				</div>'
			);
		} else {
			return do_shortcode('
				<div'.$this->buildContainerAttributes(array('class'=>array('container')),$atts).'>
					<blockquote>
						<p>'.$content.'<p>
					</blockquote>
				</div>');
		}

	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'title' => array('label' => __('title', 'ct_theme'), 'default' => '', 'type' => 'input'),
			'content' => array('label' => __('content', 'ct_theme'), 'default' => '', 'type' => "textarea")
		);
	}
}

new ctParallaxText();