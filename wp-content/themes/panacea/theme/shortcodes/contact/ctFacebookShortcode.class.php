<?php
require_once CT_THEME_LIB_DIR . '/shortcodes/socials/ctFacebookFeedShortcodeBase.class.php';
/**
 * Facebook shortcode
 */
class ctFacebookShortcode extends ctFacebookFeedShortcodeBase {

	/**
	 * Handles shortcode
	 * @param $atts
	 * @param null $content
	 * @return string
	 */
	public function handle($args, $content = null) {
		$attributes = shortcode_atts($this->extractShortcodeAttributes($args), $args);
		extract($attributes);

		return do_shortcode('
			<div id="fb-root"></div>
			<script>
				(function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {
                        return;
                    }
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                    fjs.parentNode.insertBefore(js, fjs);
				}(document, "script", "facebook-jssdk"));
			</script>
			<h4>Facebook</h4>
			<div'.$this->buildContainerAttributes(array('class'=>array('soc-container')),$args).'>
                <div class="fb-like-box" data-href="https://www.facebook.com/pages/' . $pageid . '/' . $token . '" data-colorscheme="dark"
                 data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
            </div>
		');
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		$args = array_merge(
			array(
				'widgetmode' => array('default' => 'false', 'type' => false),
			), parent::getAttributes());
		return $args;
	}
}

new ctFacebookShortcode();