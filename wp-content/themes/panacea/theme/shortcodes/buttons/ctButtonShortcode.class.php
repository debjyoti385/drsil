<?php
/**
 * Button shortcode
 */
class ctButtonShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Button';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'button';
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

		$id = $id ? $id: '';
		$color = $color ? ' btn-' . $color : '';
		$size = $size=='medium' ? '' : ('btn-' . $size);

		$iconHtml = $icon ? '<i class="' . $icon . ' icon-' . $iconplace . '"></i> ' : '';
		$leftIconHtml = '';
		$rightIconHtml = '';
		if($iconplace == 'left'){
			$leftIconHtml = $iconHtml;
		}else{
			$rightIconHtml = $iconHtml;
		}

		if ($width) {
			if (is_numeric($width)) {
				$width = $width . 'px';
			}
			$width = ' style="width:' . $width . ';"';
		} else {
			$width = '';
		}
        $cParams=array(
            'id'=>$id,
            'class'=>array('btn',$size,$color),
            'style'=>'width:' . $width . ';'
        );
		if ($link != '') {
			$content = ' <a href="' . $link . '"'.$this->buildContainerAttributes($cParams,$atts).'>'.  $leftIconHtml . trim($content) . $rightIconHtml .'</a>';
		}else{
			$content = ' <button type="button"'.$this->buildContainerAttributes($cParams,$atts).'>'.  $leftIconHtml . trim($content) . $rightIconHtml . '</button>';
		}
			return $content;
	}
 /**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {

		return array(
			'id' => array('default' => false, 'type' => false),
			'size' => array('label' => __('size', 'ct_theme'), 'default' => '', 'type' => 'select', 'choices' => array('sm' => __('small', 'ct_theme'), '' => __('medium', 'ct_theme'), 'lg' => __('large', 'ct_theme'), 'block' => __('block', 'ct_theme')), 'help' => __("Button size",'ct_theme')),
			'link' => array('label' => __('link', 'ct_theme'),'help' => __("ex. http://www.google.com",'ct_theme')),
			'width' => array('label' => __('width', 'ct_theme'),'type' => "input"),
			'color' => array('label' => __('color', 'ct_theme'),'default' => 'default', 'type' => "select", 'choices' => array('default' => __('Default','ct_theme'), 'primary' => __('primary', 'ct_theme'), 'inactive' => __('inactive', 'ct_theme'), 'inverse' => __('inverse', 'ct_theme'), 'info' => __('info', 'ct_theme'), 'success' => __('success', 'ct_theme'), 'warning' => __('warning', 'ct_theme'), 'danger' => __('danger', 'ct_theme'))),
			'icon' => array('label' => __('icon', 'ct_theme'),'type' => "icon", 'default' => '','link'=>CT_THEME_ASSETS.'/shortcode/awesome/index.html'),
			'iconplace' => array('label' => __('icon place', 'ct_theme'), 'default' => 'left', 'type' => 'select', 'choices' => array('left' => __('left', 'ct_theme'), 'right' => __('right', 'ct_theme'))),
			'content' => array('label' => __('content', 'ct_theme'), 'default' => '', 'type' => 'textarea'),
			'nofollow' => array('label' => __('nofollow', 'ct_theme'),'type' => "checkbox", 'default' => 'true'),
		);
	}
}

new ctButtonShortcode();