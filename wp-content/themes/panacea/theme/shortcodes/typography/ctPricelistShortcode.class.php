<?php
/**
 * Pricelist shortcode
 */
class ctPricelistShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Pricelist';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'pricelist';
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
		if($style=='normal'){
			$style='<div'.$this->buildContainerAttributes(array('class'=>array('price-box')),$atts).'>';
		}else{
			$style=' <div'.$this->buildContainerAttributes(array('class'=>array('price-box','price-box-special')),$atts).'>';
		}
		$buttonHtml = $buttonlabel ? ('<div><a href="' . $buttonlink . '" class="btn">' . $buttonlabel . '</a></div>') : '';

		return '
			'.$style.'
                <h3>' . $title . '</h3>
                   <span class="price">
                   '. $currency.' '.$price . '
                   <sup>' . $subprice . '</sup>
                   <sub>'. __('monthly', 'ct_theme').'</sub>
                </span>
                ' . $content . '
                <div class="divider-triangle"></div>
                 <br>
                ' . $buttonHtml . '
            </div>'
		;
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'title' => array('label' => __('title', 'ct_theme'), 'default' => '', 'type' => 'input'),
			'style' => array('label' => __('style', 'ct_theme'), 'default' => __('normal', 'ct_theme'), 'type' => 'select', 'choices' => array('normal' => __('normal', 'ct_theme'), 'special' => __('special', 'ct_theme'))),
			'currency' => array('label' => __('currency', 'ct_theme'), 'default' => __('$', 'ct_theme'), 'type' => 'input'),
			'price' => array('label' => __('price', 'ct_theme'), 'default' => '', 'type' => 'input','example'=>'456,50'),
			'subprice' => array('label' => __('subprice', 'ct_theme'), 'default' => '', 'type' => 'input'),
			'buttonlabel' => array('default' => '', 'type' => 'input', 'label' => __("button label", 'ct_theme')),
			'buttonlink' => array('default' => '#', 'type' => 'input', 'label' => __("button link", 'ct_theme')),
			'content' => array('label' => __('content', 'ct_theme'), 'default' => '', 'type' => 'textarea'),
			);

	}
}

new ctPricelistShortcode();
