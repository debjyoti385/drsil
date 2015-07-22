<?php
/**
 * Recent posts
 */
class ctRecentPostsShortcode extends ctShortcodeQueryable {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Recent posts';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'recent_posts';
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
		$recentposts = $this->getCollection($attributes);
		$headerHtml = $header ? ('<h6>'.$header.'</h6>') : '';
		$html = '';

		if ($widgetmode == 'true') {
			foreach ($recentposts as $p) {
				$picture='';
				if($type=='image'){

					$picture='<a class="pull-left" href="' . get_permalink($p) . '">
                            '.get_the_post_thumbnail($p->ID,array(84,82)).'
                             </a>';
				}
				$html .= '
					<li class="media">
						'.$picture.'
						<a href="' . get_permalink($p) . '">
                        <p class="media-heading">'.$p->post_title.'</p>
                        <div class="media-body">
                            <p>'.substr(strip_tags($p->post_content),'0','70').'</p>
                        </div>
                        </a>
                        <span class="date">'.get_the_time('M d, Y', $p).'</span>
			        </li>';
			}
			return do_shortcode('
				<div'.$this->buildContainerAttributes(array('class'=>array('inner')),$atts).'>
					'.$headerHtml .'
				<ul class="media-list">'.$html.'</ul>
				</div>'
			);
		}else {
			foreach ($recentposts as $p) {
				$picture='';
				if($type=='image'){
				$picture='<a class="pull-left" href="' . get_permalink($p) . '">
                            '.get_the_post_thumbnail($p->ID,array(84,82)).'
                             </a>';
				}
				$html .= '
					<li class="media">
						'.$picture.'
						<a href="' . get_permalink($p) . '">
                        <p class="media-heading">'.$p->post_title.'</p>
                        <div class="media-body">
                            <p>'.substr(strip_tags($p->post_content),'0','70').'</p>
                        </div>
                        </a>
                        <span class="date">'.get_the_time('M d, Y', $p).'</span>
			        </li>';
			}
			return do_shortcode(
				$headerHtml .'
				<ul'.$this->buildContainerAttributes(array('class'=>array('media-list')),$atts).'>'.$html.'</ul>'
			);
		}
	}

	/**
	 * Shortcode type
	 * @return string
	 */
	public function getShortcodeType() {
		return self::TYPE_SHORTCODE_SELF_CLOSING;
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		$atts = $this->getAttributesWithQuery(array(
			'widgetmode' => array('default' => 'false', 'type' => false),
			'header' => array('label' => __("header text", 'ct_theme'), 'default' => '', 'type' => 'input'),
			'limit' => array('label' => __('limit', 'ct_theme'), 'default' => 2, 'type' => 'input'),
			'type'=>array('label' => __('type', 'ct_theme'), 'default' => 'simple', 'type' => "select", 'choices' => array('simple' => __('simple','ct_theme'), 'image' => __('image','ct_theme')))
		));
		return $atts;
	}
}

new ctRecentPostsShortcode();