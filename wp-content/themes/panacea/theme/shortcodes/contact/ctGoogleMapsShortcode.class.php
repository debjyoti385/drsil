<?php
/**
 * Google maps shortcode
 */
class ctGoogleMapsShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Google maps';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'google_maps';
	}

	/**
	 * Enqueue scripts
	 */

	public function enqueueScripts() {

		wp_register_script('google-map-api', 'http://maps.google.com/maps/api/js?sensor=false');
		wp_register_script('jquery-gmap', CT_THEME_ASSETS . '/js/jquery.gmap.min.js', array('jquery', 'google-map-api'), '2.1');
		wp_register_script('ct-infobox', CT_THEME_ASSETS . '/js/infobox_packed.js', array('google-map-api'));
		wp_enqueue_script('jquery-gmap');
		wp_enqueue_script('google-map-api',false,array(),false,true);
		wp_enqueue_script('ct-infobox');
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

		$id = rand(100, 1000);


			if (is_numeric($height)) {
				$height = $height . 'px';
			}else{
				$height = '300px';
			}
			$height = 'height:' . $height . ';';

		$html = '';


		if ($title!='') {
		$html = '<h3 class="huge">'.$title.'</h3><div'.$this->buildContainerAttributes(array('class'=>array('simpleFrame','noBtm')),$atts).'>
                    <div id="map_canvas' . $id . '" style="' . $height . '">
                    </div>
                </div>';
		}else{
			$html = '<div'.$this->buildContainerAttributes(array('class'=>array('simpleFrame','noBtm','gMapContainer')),$atts).'>
                        <div id="map_canvas' . $id . '" style="' . $height . '">
                        </div>
                    </div>';
		}
		$this->addInlineJS($this->getInlineJS($attributes, $id));
		return $html;
	}


	/**
	 * returns inline js
	 * @param $attributes
	 * @return string
	 */
	protected function getInlineJS($attributes, $id){
		extract($attributes);

		/* fix */
		$search = array('G_NORMAL_MAP', 'G_SATELLITE_MAP', 'G_HYBRID_MAP', 'G_DEFAULT_MAP_TYPES', 'G_PHYSICAL_MAP');
		$replace = array('ROADMAP', 'SATELLITE', 'HYBRID', 'HYBRID', 'TERRAIN');
		$maptype = str_replace($search, $replace, $maptype);
		/* end fix */

		$disableDoubleClickZoom = ($doubleclickzoom == 'false'||$doubleclickzoom =='0') ? 'false' : 'true';


			return '/* custom google map marker */

			jQuery(document).ready(function () {
				function initializeMap() {
			        var secheltLoc = new google.maps.LatLng(' . $latitude . ', ' . $longitude . ');

					var myMapOptions = {
						 zoom: ' . $zoom . '
						,center: secheltLoc
						,mapTypeId: google.maps.MapTypeId.' . $maptype . '
						,scrollwheel:'.$scrollwheel.'
						,disableDoubleClickZoom:'.$disableDoubleClickZoom.'
					};
					var theMap = new google.maps.Map(document.getElementById("map_canvas' . $id . '"), myMapOptions);
					jQuery("#map_canvas' . $id . '").text("new google.maps");

					var marker'.$id.' = new google.maps.Marker({
						map: theMap,
						draggable: true,
						position: new google.maps.LatLng(' . $latitude . ', ' . $longitude . '),
						visible: true
					});

					var boxText = document.createElement("div");
					boxText.style.cssText = " ";

					var myOptions = {
						 content: boxText
						,disableAutoPan: false
						,maxWidth: 0
						,pixelOffset: new google.maps.Size(-30, -30)
						,zIndex: null
						,boxStyle: {
			              background: " "
						  ,opacity: 1.0
						  ,width: "60px"
			              ,height: "60px"
						 }
						,closeBoxMargin: "10px 2px 2px 2px"
					    ,closeBoxURL: ""
						,infoBoxClearance: new google.maps.Size(1, 1)
						,isHidden: false
						,pane: "floatPane"
						,enableEventPropagation: false
					};

					google.maps.event.addListener(marker'.$id.', "click", function (e) {
						ib.open(theMap, this);
					});

					var ib = new InfoBox(myOptions);

					ib.open(theMap, marker'.$id.');
				}


			    jQuery(window).load(function () {

			        initializeMap();

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
			"height" => array('label' => __('height', 'ct_theme'), 'default' => '286', 'type' => 'input'),
			"latitude" => array('label' => __('latitude', 'ct_theme'), 'default' => 0, 'type' => 'input'),
			"longitude" => array('label' => __('longitude', 'ct_theme'), 'default' => 0, 'type' => 'input'),
			"zoom" => array('label' => __('zoom', 'ct_theme'), 'default' => 16, 'type' => 'input'),
			"scrollwheel" => array('default' => 'true', 'type' => 'checkbox', 'label' => __('Scroll Wheel', 'ct_theme')),
			'doubleclickzoom' => array('default' => 'true', 'type' => 'checkbox', 'label' => __('Doubleclick zoom', 'ct_theme')),
			"maptype" => array('label' => __('map type', 'ct_theme'), 'default' => 'ROADMAP', 'type' => 'select', 'choices' => array('ROADMAP' => __('ROADMAP', 'ct_theme'), 'SATELLITE' => __('SATELLITE', 'ct_theme'), 'HYBRID' => __('HYBRID', 'ct_theme'), 'TERRAIN' => __('TERRAIN', 'ct_theme'))),
			'title' => array('label' => __('title', 'ct_theme'), 'default' => '', 'type' => 'input', 'help' => __("Title", 'ct_theme')),

		);

	}
}

new ctGoogleMapsShortcode();