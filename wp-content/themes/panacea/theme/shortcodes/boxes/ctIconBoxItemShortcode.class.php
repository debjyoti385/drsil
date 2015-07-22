<?php

/**
 * ctChapter shortcode
 */
class ctIconBoxItemShortcode extends ctShortcode {

	/**
	 * @var bool
	 */

	protected static $hasJs = false;

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Icon Box Item';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'icon_box_item';
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
	 *
	 */
	public function handle($atts, $content = null) {
		extract(shortcode_atts($this->extractShortcodeAttributes($atts), $atts));
		if (!self::$hasJs) {
			$this->addInlineJS($this->getInlineJS());
			self::$hasJs = true;
		}
		return do_shortcode('
			<div'.$this->buildContainerAttributes(array('class'=>array('serviceEl')),$atts).'>
                <div class="btmBx revealBtn " >
                    <h5>' . $title . '</h5>
                    <div class="divider-triangle"></div>
                </div>
                <div class="revealContent parallax">
                    <div class="divider-triangle"></div>
                    <p>' . $content . '</p>
                </div>
            </div>
        ');
	}

	protected function getInlineJS() {
		return '
			jQuery(window).load(function () {
				// services : reveal content
                jQuery(".serviceEl .revealBtn").click(function () {
                    jQuery(this).toggleClass("expanded").next(".revealContent").stop().slideToggle(400, "swing");
                });

			});
		';
	}

	public function getParentShortcodeName() {
		return 'icon_box';
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
				'title' => array('label' => __('title', 'ct_theme'), 'default' => '', 'type' => 'input', 'help' => __("Title text", 'ct_theme')),
				'content' => array('label' => __('content', 'ct_theme'), 'default' => '', 'type' => 'textarea')


		);
	}
}

new ctIconBoxItemShortcode();



