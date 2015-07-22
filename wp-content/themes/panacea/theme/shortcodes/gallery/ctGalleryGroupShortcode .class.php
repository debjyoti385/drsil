<?php

/**
 * Native WP Gallery shortcode
 */
class ctGalleryGroupShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Gallery group';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'gallery_group';
	}

	/**
	 * Shortcode type
	 * @return string
	 */
	public function getShortcodeType() {
		return self::TYPE_SHORTCODE_ENCLOSING;
	}

	public function enqueueScripts() {
		wp_register_script('ct-ba-bbq', CT_THEME_ASSETS . '/js/jquery.ba-bbq.min.js', array('jquery'));
		wp_enqueue_script('ct-ba-bbq');
	}

	/**
	 * Handles shortcode
	 * @param $atts
	 * @param null $content
	 * @return string
	 */

	public function handle($atts, $content = null) {
		extract(shortcode_atts($this->extractShortcodeAttributes($atts), $atts));
		$losowy = rand(10, 1000);
		$arrayGroups = array();
		$wynikArrayGroups = array();
		$arrayGroups = explode('),', $groups);
		$i = 0;
		$j = 0;
		$grupa = 0;
		foreach ($arrayGroups as $key => $value) {
			$b = explode('(', $value);
			foreach ($b as $key2 => $value2) {
				//$c = explode(',', $value2);
				if ($i % 2 == 0) {
					$grupa = $value2;
				}
				if ($i % 2 == 1) {
					$wynikArrayGroups[$j][$grupa] = $value2;
				}
				$i++;
				$j++;
			}
		}

		//var_dump($groups);


		switch ($columns) {
			case 2:
				$columns = 'galleryContainer col2';

				break;
			case 3:
				$columns = 'galleryContainer col3';

				break;
			case 4:
				$columns = 'galleryContainer';
				break;


			default:
				$columns = 'galleryContainer';
		}

		$htmlIcon = '';
		if ($icon != '') {
			$htmlIcon = '<i class="' . $icon . '">
                    </i>';
		}

		// If empty $header then don't generate gallery icon and title
		$htmlH3 = '';
		if ($header !== '') {
			$htmlH3 = '<h3 class="std pull-left">' . $htmlIcon . $header . '
					</h3>';
		}


		$html = '';
		$html = '
            <div id="gallery' . $losowy . '" class="row">';

		if (count($arrayGroups) > 1 && $groups !== '') {

			$html .= '
			    <div class="col-md-12">' . $htmlH3 . '
                    <div id="galleryOptions" class="clearfix pull-right">
                        <ul id="filters" class="option-set clearfix">
                            <li><a href="#filter=*">' . __('All', 'ct_theme') . '</a></li>';
			foreach ($wynikArrayGroups as $key => $value) {
				foreach ($value as $key2 => $value2) {
					$value2 = str_replace(')', '', $value2);
					$html = $html . '<li><a href="#filter=.' . str_replace(',', ',', $value2) . '">' . $key2 . '</a></li>';
				}
			}
			$html .= '  </ul>
			        </div>
			    </div>
			</div>';
		} else {
			if ($header != '') {
				$html .= '
				        <div class="col-md-12">
				            ' . $htmlH3 . '
				        </div>
				    </div>';
			}
		}
		$html = $html . '
			<div'.$this->buildContainerAttributes(array('class'=>array($columns)),$atts).'>
                <div id="iContainer" class="clickable clearfix ">
                    ' . do_shortcode($content) . '
                </div>
                <!-- #iContainer -->
            </div>
        <!--gallery end!-->

        ';
		//$this->enqueueScripts();
		$this->addInlineJS($this->getInlineJS());

		return $html;
	}


	protected function getInlineJS() {
		$ap = "'";
		return '
if (jQuery.Isotope) {

	/* colorbox init */
jQuery(document).ready(function () {


    jQuery(".galleryItem").bind("touchstart", function(e) {
        var $this = jQuery(this);
        if($this.hasClass("hover_touch")) {

				setTimeout(function () {
					$this.removeClass("hover_touch");
			  }, 1000);

        } else {
          $this.addClass("hover_touch");
          e.preventDefault();
        }
    });


	jQuery("a.colorUp").colorbox({
		rel: "gal",
		maxWidth: "95%"
	});

});

    // ISOTOPE INIT

    jQuery.Isotope.prototype._getCenteredMasonryColumns = function () {
        this.width = this.element.width();

        var parentWidth = this.element.parent().width();

        // i.e. options.masonry && options.masonry.columnWidth
        var colW = this.options.masonry && this.options.masonry.columnWidth || // or use the size of the first item
                this.$filteredAtoms.outerWidth(true) || // if there"s no items, use size of container
                parentWidth;

        var cols = Math.floor(parentWidth / colW);
        cols = Math.max(cols, 1);

        // i.e. this.masonry.cols = ....
        this.masonry.cols = cols;
        // i.e. this.masonry.columnWidth = ...
        this.masonry.columnWidth = colW;
    };

    jQuery.Isotope.prototype._masonryReset = function () {
        // layout-specific props
        this.masonry = {};
        // FIXME shouldn"t have to call this again
        this._getCenteredMasonryColumns();
        var i = this.masonry.cols;
        this.masonry.colYs = [];
        while (i--) {
            this.masonry.colYs.push(0);
        }
    };

    jQuery.Isotope.prototype._masonryResizeChanged = function () {
        var prevColCount = this.masonry.cols;
        // get updated colCount
        this._getCenteredMasonryColumns();
        return ( this.masonry.cols !== prevColCount );
    };

    jQuery.Isotope.prototype._masonryGetContainerSize = function () {
        var unusedCols = 0, i = this.masonry.cols;
        // count unused columns
        while (--i) {
            if (this.masonry.colYs[i] !== 0) {
                break;
            }
            unusedCols++;
        }

        return {
            height: Math.max.apply(Math, this.masonry.colYs),
            // fit container to columns that have been used;
            width: (this.masonry.cols - unusedCols) * this.masonry.columnWidth
        };
    };


    jQuery(window).load(function () {

        var $container = jQuery("#iContainer"), // object that will keep track of options
                isotopeOptions = {}, // defaults, used if not explicitly set in hash
                defaultOptions = {
                    filter: "*",
                    sortBy: "original-order",
                    sortAscending: true,
                    layoutMode: "masonry"
                };


        var setupOptions = jQuery.extend({}, defaultOptions, {
            itemSelector: ".galleryItem",
            masonry: {
                // columnWidth: $container.width() / 4

            }
        });

        // set up Isotope
        $container.isotope(setupOptions);

        var $optionSets = jQuery("#galleryOptions").find(".option-set"), isOptionLinkClicked = false;

        // switches selected class on buttons
        function changeSelectedLink($elem) {
            // remove selected class on previous item
            $elem.parents(".option-set").find(".selected").removeClass("selected");
            // set selected class on new item
            $elem.addClass("selected");
        }


        $optionSets.find("a").click(function () {
            var $this = jQuery(this);
            // don"t proceed if already selected
            if ($this.hasClass("selected")) {
                return;
            }
            changeSelectedLink($this);
            // get href attr, remove leading #
            var href = $this.attr("href").replace(/^#/, ""), // convert href into object
            // i.e. "filter=.inner-transition" -> { filter: ".inner-transition" }
                    option = jQuery.deparam(href, true);
            // apply new option to previous
            jQuery.extend(isotopeOptions, option);
            // set hash, triggers hashchange on window
            jQuery.bbq.pushState(isotopeOptions);
            isOptionLinkClicked = true;
            adjustParallax($this);
            return false;
        });


        var hashChanged = false;

        jQuery(window).bind("hashchange", function (event) {
            // get options object from hash
            var hashOptions = window.location.hash ? jQuery.deparam.fragment(window.location.hash, true) : {}, // do not animate first call
                    aniEngine = hashChanged ? "best-available" : "none", // apply defaults where no option was specified
                    options = jQuery.extend({}, defaultOptions, hashOptions, { animationEngine: aniEngine });
            // apply options from hash
            $container.isotope(options);
            // save options
            isotopeOptions = hashOptions;

            // if option link was not clicked
            // then we"ll need to update selected links
            if (!isOptionLinkClicked) {
                // iterate over options
                var hrefObj, hrefValue, $selectedLink;
                for (var key in options) {
                    hrefObj = {};
                    hrefObj[ key ] = options[ key ];
                    // convert object into parameter string
                    // i.e. { filter: ".inner-transition" } -> "filter=.inner-transition"
                    hrefValue = jQuery.param(hrefObj);
                    // get matching link
                    $selectedLink = $optionSets.find(' . $ap . 'a[href="#' . $ap . ' + hrefValue +' . $ap . '"  ]' . $ap . ');
                    changeSelectedLink($selectedLink);
                }
            }

            isOptionLinkClicked = false;
            hashChanged = true;
        })// trigger hashchange to capture any hash data on init
                .trigger("hashchange");

    });

}';

	}

	/**
	 * Child shortcode info
	 * @return array
	 */

	public function getChildShortcodeInfo() {
		return array('name' => 'gallery_group_item', 'min' => 1, 'max' => 50, 'default_qty' => 3);
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		return array(
				'header' => array('label' => __('Title', 'ct_theme'), 'default' => '', 'type' => "input"),
				'icon' => array('label' => __('Icon', 'ct_theme'), 'type' => "icon", 'default' => 'icon-picture', 'link' => CT_THEME_ASSETS . '/shortcode/awesome/index.html'),
				'columns' => array('label' => __('Columns', 'ct_theme'), 'default' => '4', 'type' => 'select', 'choices' => array(2 => 2, 3 => 3, 4 => 4),),
				'groups' => array('label' => __('Groups', 'ct_theme'), 'default' => '', 'type' => "input", 'help' => __('Separate group names by commas.Group will appear as buttons in the Gallery', 'ct_theme')),
		);
	}
}

new ctGalleryGroupShortcode();