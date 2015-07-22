<?php
/**
 * List shortcode
 */
class ctListShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'List';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'list';
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
		if($title!=''){
			$title ='<h6>'.$title.'</h6>';
		}
		if($icon !=''){
			$icon = str_replace('icon-', 'ico-', $icon);
		}
		$customClass = '';
		if ($class!=''){
			$customClass = $class;
		}
		return do_shortcode('
			<div'.$this->buildContainerAttributes(array('class'=>array('List2')),$atts).'>
				'.$title.'
                <ul class="'.$customClass.' signs '.$icon . '">'. $content.'</ul>
            </div>'
		);
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'title'=>array('label'=>__('Title','ct_theme'),'type'=>'input','default'=>''),
			'icon' => array('icon' => __('Icon', 'ct_theme'), 'type' => "icon", 'default' => '','link'=>CT_THEME_ASSETS.'/shortcode/awesome/index.html'),
			'content' => array('label' => __('content', 'ct_theme'), 'default' => '', 'type' => 'textarea', 'help' => "html li elements", 'example' => '<li>list item</li><li>list item</li>'),
			'class'=>array('label'=>__('Custom class','ct_theme'),'type'=>'input','default'=>'', 'help' => "Set custom class to element"),

		);
	}
}

new ctListShortcode();