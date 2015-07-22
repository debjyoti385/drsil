<?php
/**
 * ctChapter shortcode
 */
class ctChapterShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Chapter';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'chapter';
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
        $cParams=array(
            'id'=>$id,
            'class'=>array('chapter')
        );
		$html ='
		<div'.$this->buildContainerAttributes($cParams,$atts).'>
	        <div class="sectionBox">
	        	<div class="divider-triangle"></div>
	        	'.do_shortcode($content).'
	        <!-- / sectionBox -->
	        </div>
 		 </div>
		';

		return $html;

	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'id'=> array('label' => __('Title', 'ct_theme'), 'default' => 'chapter', 'type' => 'input'),
			'content' => array('label' => __('content', 'ct_theme'), 'default' => '', 'type' => 'textarea')
		);
	}
}

new ctChapterShortcode();