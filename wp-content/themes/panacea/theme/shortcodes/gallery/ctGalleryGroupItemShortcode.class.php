<?php
/**
 * ctChapter shortcode
 *
 */
class ctGalleryGroupItemShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Gallery group item';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'gallery_group_item';
	}

	/**
	 * Returns shortcode type
	 * @return mixed|string
	 */

	public function getShortcodeType() {
		return self::TYPE_SHORTCODE_ENCLOSING;
	}

	public function enqueueScripts() {
		wp_register_script('ct-pagescroller', CT_THEME_ASSETS . '/js/jquery.pagescroller.lite.js', array('jquery'));
		wp_enqueue_script('ct-pagescroller');

		wp_register_script('ct-colorbox', CT_THEME_ASSETS . '/js/jquery.colorbox-min.js', array('jquery'));
		wp_enqueue_script('ct-colorbox');

		wp_register_script('ct-isotope', CT_THEME_ASSETS . '/js/jquery.isotope.min.js', array('jquery'));
		wp_enqueue_script('ct-isotope');
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

		$CSSfilters = '';
		$arrayFilters = array();
		$html = '';
		$arrayFilters = explode(",", $groups);

		foreach ($arrayFilters as $value) {
			$CSSfilters .= $html . $value . ' ';
		}

		if (!$link) {
			$url = $image;
			$class = 'colorUp';
		} else {
			$url = $link;
			$class = '';
		}
        $cParams=array(
            'class'=>array('galleryItem',$CSSfilters)
        );
		$this->addInlineJS($this->getInlineJS());
		return '
					<div'.$this->buildContainerAttributes($cParams,$atts).'>
                        <div class="galPhoto">' . do_shortcode('[img width="'.$width.'" height="'.$height.'" src="' . $image . '"][/img]') . '
                            <div class="galOverlay"></div>
							<div class="galLink">
                                <a href="' . $url . '" class="' . $class . '" ></a>
                                    <span class="galTitle">' . $title . '</span>
                            </div>
                        </div>
                    </div>
			';

	}

protected function getInlineJS() {
	return '';

}

	/**
	 * Parent shortcode name
	 * @return null
	 */

	public function getParentShortcodeName() {
		return 'gallery_group';
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'image' => array('label' => __("Image", 'ct_theme'), 'default' => '', 'type' => 'image', 'help' => __("Image", 'ct_theme')),
			'width' => array('label' => __("Width", 'ct_theme'), 'default' => '', 'type' => false),
			'height' => array('label' => __("Height", 'ct_theme'), 'default' => '', 'type' => false),
			'title' => array('label' => __("Title", 'ct_theme'), 'default' => '', 'type' => 'input', 'help' => __("Title text", 'ct_theme')),
			'link' => array('label' => __('LINK', 'ct_theme'), 'help' => __("If you do not put the url, when you click the image will be displayed as a slide", 'ct_theme')),
			'groups' => array('label' => __("Filters", 'ct_theme'), 'default' => '', 'type' => 'input', 'help' => __("Filter names, please write after the space", 'ct_theme'))
		);
	}
}

new ctGalleryGroupItemShortcode();



