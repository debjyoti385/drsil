<?php
/**
 * Native WP Gallery shortcode
 */
class ctWorksShortcode extends ctShortcodeQueryable {

	protected $ok = false;

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Works Shortcode';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'works';
	}

	/**
	 * Shortcode type
	 * @return string
	 */
	public function getShortcodeType() {
		return self::TYPE_SHORTCODE_ENCLOSING;
	}


	public function enqueueScripts() {


		wp_register_script('ct-isotope', CT_THEME_ASSETS . '/js/jquery.isotope.min.js', array('jquery'));
		wp_enqueue_script('ct-isotope');

		wp_register_script('ct-ba-bbq', CT_THEME_ASSETS . '/js/jquery.ba-bbq.min.js', array('jquery'));
		wp_enqueue_script('ct-ba-bbq');

		wp_register_script('ct-pretty-photo', CT_THEME_ASSETS . '/js/jquery.prettyPhoto.js', array('jquery'));
		wp_enqueue_script('ct-pretty-photo');


	}

	/**
	 * Adds dynamically slider so that ajax call will already have it
	 */
	protected function enqueueAjaxScripts() {
		wp_enqueue_script('ct-bx-slider', CT_THEME_ASSETS . '/js/jquery.bxslider.min.js');
	}


	/**
	 * Handles shortcode
	 * @param $atts
	 * @param null $content
	 * @return string
	 *
	 * Wejście: [works groups="Button1(portfolio_category),Button2(portfolio_category),(...)"][/works]
	 * Wyjście: shortcode GalleryGroup
	 */
	public function handle($atts, $content = null) {
		$attributes = array();

		$attributes = shortcode_atts($this->extractShortcodeAttributes($atts), $atts);
		extract($attributes);
		$recentposts = $this->getCollection($attributes, array('post_type' => 'portfolio'));



		$arrayGroups = array();
		$wynikArrayGroups = array();
		$arrayGroups = explode('),', $groups);
		$i = 0;
		$j = 0;
		$grupa = 0;
		foreach ($arrayGroups as $key => $value) {
			$b = explode('(', $value);
			foreach ($b as $key2 => $value2) {
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

		$wynikArrayGroups[$j - 1][$grupa] = str_replace(')', '', $wynikArrayGroups[$j - 1][$grupa]);


		$strShortcode = '[gallery_group header="' . $header . '" icon="'.$icon.'" columns="' . $columns . '" groups="' . $groups . '"]';
		$itemsCollector = array();
		$terms = array();
		$key = array();

		$width = 235;
		$height  =235;

		switch ($columns) {
			case 2:
				$thumb = 'thumb_2_cols';
				$width = 460;
				$height = 337;
				break;
			case 3:
				$thumb = 'thumb_3_cols';
				$width = 300;
				$height = 220;
				break;
			case 4:
				$thumb = 'thumb_4_cols';
				break;

			default:
				$thumb = 'thumb_4_cols';
		}


		foreach ($recentposts as $p) {
			$imgsrc = ct_get_feature_image_src($p->ID, $thumb);
			$terms = (get_the_terms($p->ID, 'portfolio_category'));
			foreach ((array)$terms as $key) {
				$itemsCollector[$key->name][] = $imgsrc;

				$arrTitles[$key->name][] = $p->post_title;
				$arrPermalinks[$key->name][] = get_permalink($p->ID);
			}


		}


		foreach ($itemsCollector as $key => $value) {
			foreach ($value as $value2) {
				$nowa[$value2][] = $key;
			}
		}

		foreach ($arrTitles as $key => $value) {
			foreach ($value as $value2) {
				$arrTitles2[$value2][] = '';
			}
		}

		foreach ($arrPermalinks as $key => $value) {
			foreach ($value as $value2) {
				$arrPermalinks2[$value2][] = '';
			}
		}

		$i = 0;
		$titles = array();
		foreach ($nowa as $key => $value) {
			$strFilters = implode(',', $value);
			$arrTitles3 = array_keys($arrTitles2);
			$arrPermalinks3 = array_keys($arrPermalinks2);
			$strShortcode .= '[gallery_group_item title="' . $arrTitles3[$i] . '" image="' . $key . '" groups="' . $strFilters . '" link="' . $arrPermalinks3[$i] . '" width="'.$width.'" height="'.$height.'"][/gallery_group_item]';
			$i++;
		}
		$strShortcode .= '[/gallery_group]';



		return do_shortcode($strShortcode);

	}


	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {

		$atts = $this->getAttributesWithQuery(array(

			'limit' => array('label' => __('limit', 'ct_theme'), 'default' => 4, 'type' => 'input', 'help' => __("Number of portfolio elements", 'ct_theme')),
			'columns' => array('label' => __('columns', 'ct_theme'), 'default' => '4', 'type' => 'select', 'choices' => array('4' => '4', '3' => '3', '2' => '2'), 'help' => __("Number of columns", 'ct_theme')),
			'header' => array('label' => __("header text", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'icon' => array('label' => __('icon', 'ct_theme'), 'type' => "icon", 'default' => 'icon-picture','link'=>CT_THEME_ASSETS.'/shortcode/awesome/index.html'),
			'groups' => array('label' => __('Groups', 'ct_theme'), 'default' => '', 'type' => "input", 'help' => __('Separate group names by commas. Group will appear as buttons in the Gallery', 'ct_theme')),
		));

		if (isset($atts['cat'])) {
			unset($atts['cat']);
		}
		return $atts;
	}
}

new ctWorksShortcode;


