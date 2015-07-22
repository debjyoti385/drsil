<?php
/**
 * Video shortcode
 */
class ctVideoBackgroundShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Video Background';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'video_background';
	}

	/**
	 * Add styles
	 */

	public function enqueueHeadScripts() {
		wp_register_script('ct_TYPlayer', CT_THEME_ASSETS  . '/js/jquery.mb.YTPlayer.js', array('jquery'), null, true);
		wp_enqueue_script('ct_TYPlayer');
	}


	/**
	 * Handles shortcode
	 * @param $atts
	 * @param null $content
	 * @return string
	 */

	public function handle($atts, $content = null) {
		$attributes = shortcode_atts($this->extractShortcodeAttributes($atts), $atts);
		extract($attributes);
		$a="'";
		$this->addInlineJS($this->getInlineJS());
        $cParams=array(
            'id'=>'bgndVideo',
            'class'=>array('panel','videoPlayer'),
            'data-property'=>'{videoURL:'.$a.''.$link.''.$a.',containment:'.$a.'body'.$a.',autoPlay:true, mute:true, startAt:2, quality: '.$a.'hd720'.$a.', opacity:1}'
        );
		return '<a'.$this->buildContainerAttributes($cParams,$atts).'>My video</a>
		';
	}

	/**
	 * returns inline js
	 * @param $id
	 * @param $attributes
	 * @return string
	 */
	protected function getInlineJS() {
		return '
			jQuery(document).ready(function () {
				// init video page
				if (jQuery().mb_YTPlayer) {
                    jQuery(".videoPlayer").mb_YTPlayer();
					jQuery("#bgndVideo").on("YTPStart",function(){
						jQuery("#ct_preloader").fadeOut(600);
					})
				}
			});
		';
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'link' => array('default' => '', 'type' => 'input', 'label' => __('Link', 'ct_theme'), 'help' => __('Direct movie link', 'ct_theme'), 'example' => "http://www.youtube.com/watch?v=Vpg9yizPP_g")
		);
	}
}

new ctVideoBackgroundShortcode();