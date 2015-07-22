<?php
/**
 * Accordion shortcode
 */
class ctAccordionShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Accordion';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'accordion';
	}

	/**
	 * Handles shortcode
	 * @param $atts
	 * @param null $content
	 * @return string
	 */

	public function handle($atts, $content = null) {
		extract(shortcode_atts($this->extractShortcodeAttributes($atts), $atts));

		$id = rand(100, 1000);
        $cParams=array(
            'id'=>'accordion'.$id ,
            'class'=>array('panel-group','accordion')
        );
		$headerHtml = $header ? ' <h4>' . $header . '</h4>' : '';
		return do_shortcode($headerHtml . '<div'.$this->buildContainerAttributes($cParams,$atts).'>' . $content . '</div>');
	}




	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'header' => array('label' => __('header', 'ct_theme'),'default' => '', 'type' => 'input'),
		);
	}

	/**
	 * Child shortcode info
	 * @return array
	 */

	public function getChildShortcodeInfo() {
		return array('name' => 'accordion_item', 'min' => 1, 'max' => 20, 'default_qty' => 2);
	}
}

new ctAccordionShortcode();