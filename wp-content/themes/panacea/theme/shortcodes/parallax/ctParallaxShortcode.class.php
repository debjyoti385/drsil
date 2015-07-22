<?php
/**
 * Parallax shortcode
 */
class ctParallaxShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Parallax';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'parallax';
	}

	/**
	 * Returns shortcode type
	 * @return mixed|string
	 */
	public function getShortcodeType() {
		return self::TYPE_SHORTCODE_ENCLOSING;
	}

	public function enqueueScripts() {
		wp_register_script('ct-parallax', CT_THEME_ASSETS . '/js/jquery.stellar.min.js', array('jquery'));
		wp_enqueue_script('ct-parallax');
	}

	/**
	 * Handles shortcode
	 * @param $atts
	 * @param null $content
	 * @return string
	 */
	public function handle($atts, $content = null) {
		extract(shortcode_atts($this->extractShortcodeAttributes($atts), $atts));
		$this->addInlineJS($this->getInlineJS(), true);
		return do_shortcode('
			<div'.$this->buildContainerAttributes(array('class'=>array('parallaxSection')),$atts).'>
				<div class="parallax" data-stellar-background-ratio="'.$ratio.'" data-bg-overlay="'.$overlay.'" data-bg-opacity="'.$opacity.'" style="background-image: url('.$imgsrc.')">
					<div class="parallaxOverlay"></div>
					'.$content.'
				</div>
			</div>'
		);
	}

	/**
	 * returns JS
	 * @param $id
	 * @return string
	 */
	protected function getInlineJS() {
		return '
			jQuery(window).load(function () {
			    // Detecting IE
			    var oldIE = false;
			    if (jQuery("html").is(".ie8, .ie9")) {
			        oldIE = true;
			    }

				if (jQuery("body").hasClass("videoPage")||(oldIE)) {
					return false;
				}
                if ((jQuery.stellar)&&(!(jQuery.browser.mobile)&&(!isiPad))) {
                    jQuery.stellar({
                        // Set scrolling to be in either one or both directions
                        horizontalScrolling: false,
                        verticalScrolling: true,
                        // Set the global alignment offsets
                        horizontalOffset: 0,
                        verticalOffset: 0,
                        // Refreshes parallax content on window load and resize
                        responsive: false,
                        // Select which property is used to calculate scroll.
                        // Choose "scroll", "position", "margin" or "transform",
                        // or write your own "scrollProperty" plugin.
                        scrollProperty: "scroll",
                        // Select which property is used to position elements.
                        // Choose between "position" or "transform",
                        // or write your own "positionProperty" plugin.
                        positionProperty: "position",
                         // Enable or disable the two types of parallax
                        parallaxBackgrounds: true,
                        parallaxElements: false,
                        // Hide parallax elements that move outside the viewport
                        hideDistantElements: true,
                        // Customise how elements are shown and hidden
                        hideElement: function ($elem) {
                            $elem.hide();
                        },
                        showElement: function ($elem) {
                            $elem.show();
                        }
                    });
                    var userScrolled = false;
                    jQuery(window).resize(function () {
                        userScrolled = true;
                    });
					setInterval(function () {
                        if (userScrolled) {
                            //Do stuff
                            // jQuery(window).data("plugin_stellar").destroy();
                            // jQuery(window).data("plugin_stellar").init();
                            jQuery(window).data("plugin_stellar").refresh();
							userScrolled = false;
                        }
                    }, 2000);
				}
			});
            // color parallax overlay
            jQuery(".parallax").each(function () {
	            $this = jQuery(this);
                //var bgOverlay = $this.data("bg-overlay");
                if ((typeof $this.data("bg-overlay") != "undefined") && (typeof $this.data("bg-opacity") != "undefined")) {
                    var rgba = hexToRgb($this.data("bg-overlay"), $this.data("bg-opacity"));
                    $this.find(".parallaxOverlay").css("background-color", rgba);
                }
            });

			function adjustParallax($e) {
                // jQuery(window).data("plugin_stellar").refresh();
                //jQuery(window).data("plugin_stellar").destroy();
                //jQuery(window).data("plugin_stellar").init();
				var y = jQuery(window).scrollTop();  //your current y position on the page
                scrollToElement($this, y - 1, callback);
				return;
			}
			function callback(el) {

             /*
            setTimeout(function() {
				jQuery(".parallax").each(function() {
                   // jQuery(this).removeClass("paraAnim");
                    });

                    // jQuery(window).data("plugin_stellar").refresh();

             }, 500);
            */
		}

		';
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'ratio' => array('label' => __("ratio", 'ct_theme'), 'default' => '0.4', 'type' => 'input', 'help' => __("data-stellar-background-ratio", 'ct_theme')),
			'overlay' => array('label' => __("overlay", 'ct_theme'), 'default' => '', 'type' => 'input', 'help' => __("data-bg-overlay", 'ct_theme')),
			'opacity' => array('label' => __("opacity", 'ct_theme'), 'default' => '0', 'type' => 'input', 'help' => __("data-bg-opacity", 'ct_theme')),
			'imgsrc' => array('label' => __("imgsrc", 'ct_theme'), 'default' => '', 'type' => 'image', 'help' => __("Image", 'ct_theme')),
			'content' => array('label' => __('content', 'ct_theme'), 'default' => '', 'type' => "textarea")
		);
	}
}

new ctParallaxShortcode();