<?php
/**
 * Bar shortcode
 */
class ctGraphCircleShortcode extends ctShortcode {

	/**
	 * Enqueue scripts
	 */
	public function enqueueScripts() {
		wp_register_script('jquery-easy-pie', CT_THEME_ASSETS . '/js/jquery.easy-pie-chart.js', array('jquery'));
		wp_enqueue_script('jquery-easy-pie');
	}

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Circle';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'graph_circle';
	}

	/**
	 * Handles shortcode
	 * @param $atts
	 * @param null $content
	 * @return string
	 */
	public function handle($atts, $content = null) {
		extract(shortcode_atts($this->extractShortcodeAttributes($atts), $atts));
		$this->addInlineJS($this->getInlineJS());
		$text = '<span class="text">' . $text . '</span>';
		if ($icon) {
			$text = '<span class="text"><i class="' . $icon . '"></i></span>';
		}
        $cParams=array(
            'class'=>array('graph-percent','pie-chart'),
            'data-percent'=>$percent,
            'data-barcolor'=>$barcolor,
			'data-trackcolor'=>$trackcolor,
            'data-scalecolor'=>$scalecolor,
            'data-linecap'=>$linecap,
            'data-linewidth'=>$linewidth,
            'data-size'=>$size,
            'data-animate'=>$animate
        );
		return '
			<div'.$this->buildContainerAttributes($cParams,$atts).'>
               ' . $text . '
            </div>
        ';
	}

	/**
	 * returns JS
	 * @param $id
	 * @return string
	 */
	protected function getInlineJS() {
		return '
			jQuery(window).load(function () {
                /* easy pie chart */
                jQuery(".pie-chart").each(function () {
                    var $t = jQuery(this);
                    var scaleColor = $t.attr("data-scalecolor");
                    var trackColor = $t.attr("data-trackcolor");
			        $t.easyPieChart({
                        animate: $t.attr("data-animate"),
                        barColor: $t.attr("data-barcolor"),
                        trackColor: trackColor,
                        scaleColor: scaleColor == "false" ? false : scaleColor,
                        lineCap: $t.attr("data-linecap"),
                        lineWidth: $t.attr("data-linewidth"),
                        size: $t.attr("data-size")
                    });
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
			'percent' => array('label' => __('percent', 'ct_theme'), 'default' => '', 'type' => 'input', 'help' => __('in %', 'ct_theme')),
			'text' => array('label' => __("text inside circle", 'ct_theme'), 'help' => __('if icon selected, text will not be displayed', 'ct_theme')),
			'icon' => array('label' => __('entypo icon', 'ct_theme'), 'type' => "icon", 'default' => '', 'link' => CT_THEME_ASSETS . '/shortcode/awesome/index.html'),
			'barcolor' => array('label' => __('bar color', 'ct_theme'), 'default' => '#2db7ff', 'type' => 'colorpicker', 'help' => __('The color of the curcular bar.', 'ct_theme')),
			'trackcolor' => array('label' => __('track color', 'ct_theme'), 'default' => '#e6e6e6', 'type' => 'colorpicker', 'help' => __('The color of the track for the bar, leave it blank to disable rendering.', 'ct_theme')),
			'scalecolor' => array('label' => __('scale color', 'ct_theme'), 'default' => 'false', 'type' => 'colorpicker', 'help' => __('The color of the scale lines, leave it blank to disable rendering.', 'ct_theme')),
			'linecap' => array('label' => __('line cap', 'ct_theme'), 'default' => 'default', 'type' => "select", 'choices' =>array('butt' => __('button', 'ct_theme'), 'round' => __('round', 'ct_theme'), 'square' => __('square', 'ct_theme')),'help' => __('defines how the ending of the bar line looks like', 'ct_theme')),
			'linewidth' => array('label' => __("Width of the bar line", 'ct_theme'), 'default' => '15', 'help' => __('in px', 'ct_theme')),
			'size' => array('label' => __("size of chart", 'ct_theme'), 'default' => '170', 'help' => __('in px', 'ct_theme')),
			'animate' => array('label' => __('animation speed', 'ct_theme'), 'default' => '1000', 'help' => __('Time in milliseconds (1000 is 1 second) for a eased animation of the bar growing, or 0 to deactivate.', 'ct_theme')),
		);
	}
}

new ctGraphCircleShortcode();