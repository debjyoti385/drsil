<?php
/**
 * Helper functions for theme
 */

if (!function_exists('ct_get_footer_settings')) {
	/**
	 * Setup dynamic footer. This function is automatically called by plugin
	 * @see plugin/footer-columns
	 * @param $default
	 * @return array
	 */
	function ct_get_footer_settings($default) {
		return array_merge(
				$default,
				array(
						'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
						'after_widget' => '</div></section>',
						'before_title' => '<h3>',
						'after_title' => '</h3>',
						'definitions' => array(
								'2l' => array(
										'columns' => array(8, 4)
								),
								'2r' => array(
										'columns' => array(4, 8)
								)
						),
						'numbers' => array(1 => 1, 2 => 2, '2 ' . __("columns (left wide)", 'ct_theme') => '2l', '2 ' . __("columns (right wide)", 'ct_theme') => '2r', 3 => 3),
						'default_number' => 3
				));
	}
}

/**
 * Custom plugins extension
 */
if (!function_exists('ct_css_animate_extension')) {
	function ct_css_animate_extension($shortcodes) {
		$shortcodes[] = 'parallax';
		return $shortcodes;
	}

	add_action('ct.css_animate.compatible_shortcodes', 'ct_css_animate_extension');
}

/**
 * Enqueue scripts
 */
if (!function_exists('ct_theme_scripts')) {
	function ct_theme_scripts() {

		wp_register_script('ct-modernizr', CT_THEME_ASSETS . '/js/modernizr.custom.js', array('jquery'));
		wp_enqueue_script('ct-modernizr');

		wp_register_script('ct-colorbox', CT_THEME_ASSETS . '/js/jquery.colorbox-min.js', array('jquery'));
		wp_enqueue_script('ct-colorbox');

		wp_register_script('ct-pagescroller', CT_THEME_ASSETS . '/js/jquery.pagescroller.lite.js', array('jquery'));
		wp_enqueue_script('ct-pagescroller');

		wp_register_script('ct_queryloader', CT_THEME_DIR_URI . '/assets/js/jquery.queryloader2.min.js', array('jquery'), null, true);
		wp_enqueue_script('ct_queryloader');

		wp_register_script('ct_onepager', CT_THEME_DIR_URI . '/assets/js/onepager.js', array('jquery','ct_main'), null, true);
		wp_enqueue_script('ct_onepager');

		wp_register_script('ct-hoverIntent', CT_THEME_ASSETS . '/js/jquery.hoverIntent.minified.js', array('jquery'));
		wp_enqueue_script('ct-hoverIntent');

		wp_register_script('ct_selectnav', CT_THEME_DIR_URI . '/assets/js/selectnav.min.js', array('jquery'), null, true);
		wp_enqueue_script('ct_selectnav');

		wp_register_script('ct-modernizr', CT_THEME_ASSETS . '/js/modernizr.custom.js', array('jquery'));
        wp_enqueue_script('ct-modernizr');

        if (file_exists(CT_THEME_DIR . '/assets/css/style2.css')) {
            wp_enqueue_style('ct_theme2', CT_THEME_DIR_URI . '/assets/css/style2.css', array('ct_theme'), null);
        } elseif (file_exists(CT_THEME_DIR . '/assets/less/style2.less')) {
            wp_enqueue_style('ct_theme2', CT_THEME_DIR_URI . '/ct/css.php?file=css/style2.css', array('ct_theme'), null);
        }
	}
}

add_action('wp_enqueue_scripts', 'ct_theme_scripts');


/**
 * Theme activation
 */

function ct_theme_activation() {
	$theme_data = wp_get_theme();
	//add crop option
	if (!get_option("medium_crop")) {
		add_option("medium_crop", "1");
	} else {
		update_option("medium_crop", "1");
	}

	//add current version
	add_option('Panacea_theme_version', $theme_data->get('Version'));
}

ct_theme_activation();

/**
 * returns video html for video format post
 */
if (!function_exists('ct_post_video')) {
	function ct_post_video($postid, $width = 500, $height = 300) {
		$m4v = get_post_meta($postid, 'videoM4V', true);
		$ogv = get_post_meta($postid, 'videoOGV', true);
		$direct = get_post_meta($postid, 'videoDirect', true);
		echo do_shortcode('[video width="' . $width . '" height="' . $height . '" link="' . $direct . '" m4v="' . $m4v . '" ogv="' . $ogv . '"]');
	}
}

/**
 * returns audio html for audio format post
 */
if (!function_exists('ct_post_audio')) {
	function ct_post_audio($postid, $width = 500, $height = 300) {
		$mp3 = get_post_meta($postid, 'audioMP3', TRUE);
		$ogg = get_post_meta($postid, 'audioOGA', TRUE);
		$poster = get_post_meta($postid, 'audioPoster', TRUE);
		$height = get_post_meta($postid, 'audioPosterHeight', TRUE);

		// Calc $height for small images; large will return same value
		$height = $height * $width / 580;

		echo do_shortcode('[audio width="' . $width . '" mp3="' . $mp3 . '" ogg="' . $ogg . '" poster="' . $poster . '" posterheight="' . $height . '"]');
	}
}

/**
 * show single post title?
 */
if (!function_exists('ct_get_single_post_title')) {
	function ct_get_single_post_title($postType = 'page') {
		$show = get_post_meta(get_post() ? get_the_ID() : null, 'show_title', TRUE);
		if ($show == 'global' || $show == '') {
			if ($postType == 'page' && ct_get_option('pages_single_show_title', 1)) {
				return get_the_title();
			}
			if ($postType == 'post' && ct_get_option('posts_single_page_title', '')) {
				return ct_get_option('posts_single_page_title', '');
			}
			if ($postType == 'portfolio' && ct_get_option('portfolio_single_page_title', '')) {
				return ct_get_option('portfolio_single_page_title', '');
			}
		}
		if ($show == "yes") {
			if ($postType == 'post' && ct_get_option('posts_single_page_title', '')) {
				return ct_get_option('posts_single_page_title', '');
			}
			if ($postType == 'portfolio' && ct_get_option('portfolio_single_page_title', '')) {
				return ct_get_option('portfolio_single_page_title', '');
			}
		}
		return $show == "yes" ? get_the_title() : '';
	}
}

/**
 * single post/page subtitle?
 */
if (!function_exists('ct_get_single_post_subtitle')) {
	function ct_get_single_post_subtitle($postType = 'page') {
		$subtitle = get_post_meta(get_post() ? get_the_ID() : null, 'subtitle', TRUE);
		return $subtitle;
	}
}

/**
 * show single post breadcrumbs?
 */
if (!function_exists('ct_show_single_post_breadcrumbs')) {
	function ct_show_single_post_breadcrumbs($postType = 'page') {
		$show = get_post_meta(get_post() ? get_the_ID() : null, 'show_breadcrumbs', TRUE);
		if ($show == 'global' || $show == '') {
			if ($postType == 'page') {
				return ct_get_option('pages_single_show_breadcrumbs', 1);
			}
			if ($postType == 'post') {
				return ct_get_option('posts_single_show_breadcrumbs', 1);
			}
			if ($postType == 'portfolio') {
				return ct_get_option('portfolio_single_show_breadcrumbs', 1);
			}
		}
		return $show == "yes";
	}
}

/**
 * show index post title?
 */
if (!function_exists('ct_get_index_post_title')) {
	function ct_get_index_post_title($postType = 'page') {
		$show = get_post_meta(get_post() ? get_the_ID() : null, 'show_title', TRUE);
		if (is_search()) {
			return __('Search results', 'ct_theme');
		}
		if ($show == 'global' || $show == '') {
			if ($postType == 'post' && ct_get_option('posts_index_show_p_title', 1)) {
				$id = ct_get_option('posts_index_page');
				$page = get_post($id);
				return $page ? $page->post_title : '';
			}
			if ($postType == 'portfolio' && ct_get_option('portfolio_index_show_p_title', 1)) {
				$id = ct_get_option('portfolio_index_page');
				$page = get_post($id);
				return $page ? $page->post_title : '';
			}
			if ($postType == 'faq' && ct_get_option('faq_index_show_title', 1)) {
				$id = ct_get_option('faq_index_page');
				$page = get_post($id);
				return $page ? $page->post_title : '';
			}
		}
		return $show == "yes" ? get_the_title() : '';
	}
}

/**
 * single post/page subtitle?
 */
if (!function_exists('ct_get_index_post_subtitle')) {
	function ct_get_index_post_subtitle($postType = 'page') {
		if (is_search()) {
			return '';
		}
		if ($postType == 'post' && ct_get_option('posts_index_show_p_title', 1)) {
			$id = ct_get_option('posts_index_page');
			$subtitle = $id ? get_post_meta($id, 'subtitle', TRUE) : '';
			return $subtitle;
		}

		$subtitle = get_post_meta(get_post() ? get_the_ID() : null, 'subtitle', TRUE);
		return $subtitle;
	}
}


/**
 * show index post breadcrumbs?
 */
if (!function_exists('ct_show_index_post_breadcrumbs')) {
	function ct_show_index_post_breadcrumbs($postType = 'page') {
		$show = get_post_meta(get_post() ? get_the_ID() : null, 'show_breadcrumbs', TRUE);
		if ($show == 'global' || $show == '') {
			if ($postType == 'post') {
				return ct_get_option('posts_index_show_breadcrumbs', 1);
			}
			if ($postType == 'portfolio') {
				return ct_get_option('portfolio_index_show_breadcrumbs', 1);
			}
			if ($postType == 'faq') {
				return ct_get_option('faq_index_show_breadcrumbs', 1);
			}
		}
		return $show == "yes";
	}
}


/**
 * add menu shadow ?
 */
if (!function_exists('ct_add_menu_shadow')) {
	function ct_add_menu_shadow() {
		return ct_get_option('style_menu_shadow', 'no') == 'yes';
	}
}


/**
 * slider code
 */
if (!function_exists('ct_slider_code')) {
	function ct_slider_code() {
		if (is_home()) {
			$id = ct_get_option('posts_index_page');
			$slider = $id ? get_post_meta($id, 'slider', TRUE) : '';
		} else {
			$slider = get_post_meta(get_post() ? get_the_ID() : null, 'slider', TRUE);
		}
		return $slider;
	}
}

/**
 * image size for posts
 */
if (!function_exists('ct_show_single_post_image_size')) {
	function ct_show_single_post_image_size() {
		$show = get_post_meta(get_post() ? get_the_ID() : null, 'image_size', TRUE);
		if ($show == 'global' || $show == '') {
			return ct_get_option('post_featured_image_type', 'full');
		}
		return $show;
	}
}

/**
 * socials code
 */
if (!function_exists('ct_socials_code')) {
	function ct_socials_code() {
		$socials = '';
		ct_get_option('posts_index_page');
		if (ct_get_option('fb') != '') {
			$socials .= 'fb="' . ct_get_option('fb') . '" ';
		}
		if (ct_get_option('twit') != '') {
			$socials .= 'twit ="' . ct_get_option('twit') . '" ';
		}
		if (ct_get_option('google') != '') {
			$socials .= 'google="' . ct_get_option('google') . '" ';
		}
		if (ct_get_option('linkedin') != '') {
			$socials .= 'linkedin="' . ct_get_option('linkedin') . '" ';
		}
		if (ct_get_option('pinterest') != '') {
			$socials .= 'pinterest="' . ct_get_option('pinterest') . '" ';
		}
		if (ct_get_option('dribbble') != '') {
			$socials .= 'dribbble="' . ct_get_option('dribbble') . '" ';
		}
		if (ct_get_option('flickr') != '') {
			$socials .= 'flickr="' . ct_get_option('flickr') . '" ';
		}
		if (ct_get_option('tumblr') != '') {
			$socials .= 'tumblr="' . ct_get_option('tumblr') . '" ';
		}
		if (ct_get_option('instagram') != '') {
			$socials .= 'instagram="' . ct_get_option('instagram') . '" ';
		}
		if (ct_get_option('youtube') != '') {
			$socials .= 'youtube="' . ct_get_option('youtube') . '" ';
		}
		if (ct_get_option('vimeo') != '') {
			$socials .= 'vimeo="' . ct_get_option('vimeo') . '" ';
		}
		if (ct_get_option('phone') != '') {
			$socials .= 'phone="' . ct_get_option('phone') . '" ';
		}
		if (ct_get_option('skype') != '') {
			$socials .= 'skype ="' . ct_get_option('skype') . '" ';
		}
		if (ct_get_option('email') != '') {
			$socials .= 'email ="' . ct_get_option('email') . '" ';
		}

		if (ct_get_option('rss') == 'yes') {
			$socials .= 'rss="' . ct_get_option('rss') . '" ';
		}

		if ($socials != '') {
			$socials = '[socials ' . $socials . ']';
		}
		return $socials;
	}
}


if (!function_exists('ct_video_background')) {
	function ct_video_background() {
		$html = get_post_meta(get_post() ? get_the_ID() : null, 'video_background', TRUE);
		return $html;
	}
}

if (!function_exists('new_excerpt_more')) {
	function new_excerpt_more($more) {
		return '';
	}
}
add_filter('excerpt_more', 'new_excerpt_more');