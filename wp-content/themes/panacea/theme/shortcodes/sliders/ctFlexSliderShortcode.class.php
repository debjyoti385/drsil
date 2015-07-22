<?php
/**
 * Flex Slider shortcode
 */
class ctFlexSliderShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Flex Slider';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'flex_slider';
	}

	public function enqueueScripts() {
		wp_register_script('ct-flex-slider', CT_THEME_ASSETS . '/js/jquery.flexslider-min.js', array('jquery'));
		wp_enqueue_script('ct-flex-slider');
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
		$id = rand(100,1000);
		$this->addInlineJS($this->getInlineJS($attributes, $id));

		$fullHtml = $fullheight == "true" ? 'flexFull' : '';

        $cParams=array(
            'id'=>'flexslider'.$id,
            'class'=>array('flexslider','loading-slider',$fullHtml)
        );

		return do_shortcode('
			<div'.$this->buildContainerAttributes($cParams,$atts).'>
				<ul class="slides">'
					. $content .
				'</ul>
			</div>
		');
	}

	/**
	 * returns JS
	 * @param $id
	 * @return string
	 */
	protected function getInlineJS($attributes, $id) {
		extract($attributes);

		return 'jQuery(window).load(function () {
				    jQuery("#flexslider' . $id . '").flexslider({
				        animation: "' . $effect . '",              //String: Select your animation type, "fade" or "slide"
				        direction: "horizontal",        //String: Select the sliding direction, "horizontal" or "vertical"
				        reverse: false,                 //{NEW} Boolean: Reverse the animation direction
				        animationLoop: true,             //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
				        smoothHeight: true,            //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode
				        startAt: 0,                     //Integer: The slide that the slider should start on. Array notation (0 = first slide)
				        slideshow: true,                //Boolean: Animate slider automatically
				        slideshowSpeed: ' . $pause . ',           //Integer: Set the speed of the slideshow cycling, in milliseconds
					    animationSpeed: ' . $animspeed . ',           //Integer: Set the speed of animations, in milliseconds
				        initDelay: 0,                   //{NEW} Integer: Set an initialization delay, in milliseconds
				        randomize: false,               //Boolean: Randomize slide order

				        // Primary Controls
				        controlNav: ' . $controlnav . ',               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
				        directionNav: ' . $dirnav . ',             //Boolean: Create navigation for previous/next navigation? (true/false)

				        // Usability features
				        pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements highly recommended
				        pauseOnHover: true,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
				        touch: true,                    //{NEW} Boolean: Allow touch swipe navigation of the slider on touch-enabled devices
				        useCSS: true,                   //{NEW} Boolean: Slider will use CSS3 transitions if available


				        // Secondary Navigation
				        keyboard: true,                 //Boolean: Allow slider navigating via keyboard left/right keys
				        multipleKeyboard: false,        //{NEW} Boolean: Allow keyboard navigation to affect multiple sliders. Default behavior cuts out keyboard navigation with more than one slider present.
				        mousewheel: false,              //{UPDATED} Boolean: Requires jquery.mousewheel.js (https://github.com/brandonaaron/jquery-mousewheel) - Allows slider navigating via mousewheel


				        // Callback API
				        start: function () {
				            jQuery(".flexslider.flexFull").removeClass("loading-slider");

				        }
				    });
				});

			';




	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'effect' => array('label' => __('effect', 'ct_theme'), 'default' => 'fade', 'type' => 'select', 'choices' => array("slide" => "slide", "fade" => "fade"), 'help' => __("Slider effect", 'ct_theme')),
			'pause' => array('label' => __('pause time', 'ct_theme'), 'default' => 7000, 'type' => 'input', 'help' => __('how long each slide will show in miliseconds (1 sec = 1000 milisec)', 'ct_theme')),
			'animspeed' => array('label' => __('animation speed', 'ct_theme'), 'default' => 800, 'type' => 'input', 'help' => __('slide transition speed in miliseconds (1 sec = 1000 milisec)', 'ct_theme')),
			'controlnav' => array('label' => __('show control navigation', 'ct_theme'), 'default' => 'true', 'type' => 'select', 'choices' => array("true" => __("true", "ct_theme"), "false" => __("false", "ct_theme"))),
			'fullheight' => array('label' => __('full height slider ?', 'ct_theme'), 'default' => 'true', 'type' => 'checkbox', 'help' => __("true / false", 'ct_theme')),
			'dirnav' => array('label' => __('show direction navigation', 'ct_theme'), 'default' => 'true', 'type' => 'select', 'choices' => array("true" => __("true", "ct_theme"), "false" => __("false", "ct_theme"))),
		);
	}

	public function getChildShortcodeInfo() {
		return array('name' => 'flex_slider_item', 'min' => 1, 'max' => 20, 'default_qty' => 3);
	}


}

new ctFlexSliderShortcode();