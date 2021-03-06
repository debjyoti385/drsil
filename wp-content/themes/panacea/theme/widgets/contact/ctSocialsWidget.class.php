<?php
require_once CT_THEME_LIB_WIDGETS . '/ctShortcodeWidget.class.php';

/**
 * Socials widget
 * @author hc
 */
class ctSocialsWidget extends ctShortcodeWidget {

	/**
	 * Creates wordpress
	 */
	function __construct() {
		$widget_ops = array('classname' => 'widget_socials', 'description' => __('Your socials', 'ct_theme'));
		parent::__construct('socials', 'CT - ' . __('Socials', 'ct_theme'), $widget_ops);
	}

	/**
	 * Returns shortcode class
	 * @return mixed
	 */
	protected function getShortcodeName() {
		return 'socials';
	}
}

register_widget('ctSocialsWidget');
