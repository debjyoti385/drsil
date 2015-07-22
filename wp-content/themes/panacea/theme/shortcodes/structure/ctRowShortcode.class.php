<?php

/**
 * Wide row shortcode
 */
class ctRowShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Row';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'row';
	}

	/**
	 * Handles shortcode
	 * @param $atts
	 * @param null $content
	 * @return string
	 */

	public function handle($atts, $content = null) {
		extract(shortcode_atts($this->extractShortcodeAttributes($atts), $atts));
		$iconHtml = '';
		$iconClass = '';
		if ($icon !== '') {
			$iconHtml = '<i class="' . $icon . '"></i>';
			$iconClass = 'withIcon';
		}

		$headerHtml = $header ? ('<h' . $headertype . ' class="std ' . $iconClass . '">' . $iconHtml . $header . '</h' . $headertype . '>') : '';

		$class = $class ? (' ' . $class) : '';

		$style = '';
		$class1 = '';
		if ($space == 'true' || $space == 'yes') {
			$class1 .= ' space';
		} elseif ($space == 'false' || $space == 'no') {
			$class1 .= ' nospace';
		} elseif ($space != '' && is_numeric($space)) {
			$style .= 'style=" margin-bottom:' . $space . 'px; "';
		} elseif ($space != '') {
			$class1 .= $space;
		}


		$id = $id ?  $id : '';
		$narrowDivOpen = ($narrowcontent == 'true' || $narrowcontent == 'yes' || $narrowcontent == '1') ? '<div class="container ' . $class1 . '" ' . $style . '>' : '';
		$narrowDivClose = ($narrowcontent == 'true' || $narrowcontent == 'yes' || $narrowcontent == '1') ? '</div>' : '';
        $cParams=array(
            'id'=>$id,
            'class'=>array('row')
        );

		return do_shortcode( $narrowDivOpen .'<div'.$this->buildContainerAttributes($cParams,$atts).'>' . $headerHtml .  $content . '</div>'. $narrowDivClose);
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {


		return array(
				'id' => array('label' => __('header id', 'ct_theme'), 'default' => '', 'type' => 'input', 'help' => __("html id attribute", 'ct_theme')),
				'header' => array('label' => __('header', 'ct_theme'), 'default' => '', 'type' => 'input', 'help' => __("Header text", 'ct_theme')),
				'headertype' => array('label' => __('type', 'ct_theme'), 'default' => '3', 'type' => 'select', 'options' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6')),
				'class' => array('label' => __('CSS class', 'ct_theme'), 'default' => '', 'type' => 'input'),
				'space' => array('label' => __('add inner space?', 'ct_theme'), 'default' => '', 'type' => 'input', 'help' => __("yes: default space, no: no space, value like 5: 5px bottom space", 'ct_theme')),
				'icon' => array('label' => __('icon', 'ct_theme'), 'type' => "icon", 'default' => '', 'link' => CT_THEME_ASSETS . '/shortcode/awesome/index.html'),
				'narrowcontent' => array('label' => __('narrow content?', 'ct_theme'), 'type' => "checkbox", 'default' => false, 'help' => __("Make content narrow even if inside full width container?", 'ct_theme'))
		);
	}

	/**
	 * Zwraca rodzaj shortcode
	 * @return string
	 */
	public function getShortcodeType() {
		return self::TYPE_SHORTCODE_ENCLOSING;
	}


	/**
	 * is template with sidebar?
	 * @return bool
	 */
	protected function isSidebar() {
		return is_page_template('page-custom.php') || is_page_template('page-custom-left.php');
	}
}

new ctRowShortcode();