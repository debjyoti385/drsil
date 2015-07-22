<?php
/**
 * List shortcode
 */
class ctCoursesListShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Courses Listt';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'courses_list';
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
		$id = rand(100,1000);
		extract(shortcode_atts($this->extractShortcodeAttributes($atts), $atts));
		$attributes = shortcode_atts($this->extractShortcodeAttributes($atts), $atts);
		$this->addInlineJS($this->getInlineJS($attributes, $id));
		return do_shortcode('
			<div'.$this->buildContainerAttributes(array('class'=>array('listPresentation')),$atts).'>
            	<div id="rs-carousel'.$id.'" class="module">
                	<div class="rs-carousel-mask" style="height:430px">
                    	<ul>' . $content . '</ul>
	                </div>
	            </div>
	        </div>'
		);
	}

	/**
	 * returns JS
	 * @param $id
	 * @return string
	 */
	protected function getInlineJS($attributes, $id) {
		extract($attributes);
		return '
			jQuery(document).ready(function () {
                jQuery("#rs-carousel'.$id.'").carousel({
                    touch: Modernizr && Modernizr.touch,
                    translate3d: Modernizr && Modernizr.csstransforms3d,
                    itemsPerTransition: 1,
                    continuous: false,
                    loop: true,
                    pagination: false,
                    orientation: "vertical",
                    mask: ".rs-carousel-mask",
                    whitespace: true
                });
            });
		';
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array();
	}

	/**
	 * Child shortcode info
	 * @return array
	 */
	public function getChildShortcodeInfo() {
		return array('name' => 'courses_list_item', 'min' => 2, 'max' => 20, 'default_qty' => 3);
	}
}

new ctCoursesListShortcode();