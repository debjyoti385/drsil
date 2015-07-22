<?php
require_once CT_THEME_LIB_DIR . '/types/ctPageTypeBase.class.php';

/**
 * page type
 */

class ctPageType extends ctPageTypeBase {

	/**
	 * Adds meta box
	 */

	public function addMetaBox() {
		parent::addMetaBox();
		add_meta_box("page-template-meta", __("Template settings", 'ct_theme'), array($this, "pageTemplateMeta"), "page", "normal", "high");
	}

	/**
	 * page template settings
	 */

	public function pageTemplateMeta() {
		global $post;
		$custom = get_post_custom($post->ID);
		$title = isset($custom["show_title"][0]) ? $custom["show_title"][0] : "";
		$bread = isset($custom["show_breadcrumbs"][0]) ? $custom["show_breadcrumbs"][0] : "";
		$slider = isset($custom["slider"][0]) ? $custom["slider"][0] : "";
		$video = isset($custom["video_background"][0]) ? $custom["video_background"][0] : "";
		?>
		<p>
			<label for="show_title"><?php _e('Show title', 'ct_theme') ?>: </label>
			<select id="show_title" name="show_title">
				<option value="global" <?php echo selected('global', $title) ?>><?php _e("use global settings", 'ct_theme') ?></option>
				<option value="yes" <?php echo selected('yes', $title) ?>><?php _e("show title", 'ct_theme') ?></option>
				<option value="no" <?php echo selected('no', $title) ?>><?php _e("hide title", 'ct_theme') ?></option>
			</select>
		</p>
		<p class="howto"><?php _e("Show page title?", 'ct_theme') ?></p>

		<p>
			<label for="show_breadcrumbs"><?php _e('Show breadcrumbs', 'ct_theme') ?>: </label>
			<select id="show_breadcrumbs" name="show_breadcrumbs">
				<option value="global" <?php echo selected('global', $bread) ?>><?php _e("use global settings", 'ct_theme') ?></option>
				<option value="yes" <?php echo selected('yes', $bread) ?>><?php _e("show breadcrumbs", 'ct_theme') ?></option>
				<option value="no" <?php echo selected('no', $bread) ?>><?php _e("hide breadcrumbs", 'ct_theme') ?></option>
			</select>
		</p>
		<p class="howto"><?php _e("Show breadcrumbs?", 'ct_theme') ?></p>


		<p>
			<label for="slider"><?php _e('Above menu', 'ct_theme') ?>: </label>
			<textarea id="slider" class="regular-text" name="slider" cols="100" rows="10"><?php echo $slider; ?></textarea>
		</p>
		<p class="howto"><?php _e("Above menu code", 'ct_theme') ?></p>

		<p>
			<label for="video_background"><?php _e('Video background', 'ct_theme') ?>: </label>
			<textarea id="video_background" class="regular-text" name="video_background" cols="100" rows="1"><?php echo $video; ?></textarea>
		</p>
		<p class="howto"><?php _e("Video background", 'ct_theme') ?></p>
	<?php
	}


	public function saveDetails() {
		parent::saveDetails();
		global $post;

		$fields = array('show_title', 'show_breadcrumbs', 'slider', 'video_background');
		foreach ($fields as $field) {
			if (isset($_POST[$field])) {
				update_post_meta($post->ID, $field, $_POST[$field]);
			}
		}
	}
}

new ctPageType();