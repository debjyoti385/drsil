<?php
/**
 * List shortcode
 */
class ctCoursesListItemShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Courses List Item';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'courses_list_item';
	}

	/**
	 * Returns shortcode type
	 * @return mixed|string
	 */
	public function getShortcodeType() {
		return self::TYPE_SHORTCODE_ENCLOSING;
	}

public function enqueueScripts() {
		wp_register_script('ct-carousel', CT_THEME_ASSETS . '/js/jquery.rs.carousel.min.js', array('jquery'));
		wp_enqueue_script('ct-carousel');
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
			<li'.$this->buildContainerAttributes(array(),$atts).'>
				<h5>
					<span class="date">'.$date.'<span></span></span>
	                <a href="'.$url.'">'.$title.'</a>
	                <a href="'.$url.'" class="pull-right"><i class="'.$icon.'"></i></a>
	            </h5>
	            <p>'.$content.'</p>
			</li>
		');
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'title' => array('label' => __('Title', 'ct_theme'), 'default' => '', 'type' => 'input'),
			'date'=>array('label' => __('Date', 'ct_theme'), 'default' => '', 'type' => 'input'),
			'url' => array('label' => __('url link', 'ct_theme'),'default' => '', 'type' => 'input',  'help' => __('Direct link to ivent', 'ct_theme'), 'example' => "http://www.createit.pl/"),
			'icon' => array('label' => __('Icon', 'ct_theme'), 'type' => "icon", 'default' => '', 'link' => CT_THEME_ASSETS . '/shortcode/awesome/index.html'),
			'content' => array('label' => __('content', 'ct_theme'), 'default' => '', 'type' => 'textarea')

		);
	}

	/**
	 * Parent shortcode name
	 * @return null
	 */
	public function getParentShortcodeName() {
		return 'courses_list';
	}

}

new ctCoursesListItemShortcode();