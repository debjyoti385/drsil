<?php
/**
 * Contact shortcode
 */
class ctContactShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'Contact';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'contact';
	}

	/**
	 * Handles shortcode
	 * @param $atts
	 * @param null $content
	 * @return string
	 */

	public function handle($atts, $content = null) {
		extract(shortcode_atts($this->extractShortcodeAttributes($atts), $atts));

		$htmlOpeninghours = '';
		$htmlEmail = '';
		$htmlPhone = '';
		$arrayOpeninghours = array();
		$arrayEmail = array();
		$arrayPhone = array();
		$arrayOpeninghours = explode(",", $openinghours);
		$arrayEmail = explode(",", $email);
		$arrayPhone = explode(",", $phone);
		if ($openinghours != '') {
			$htmlOpeninghours = '<div class="iconBox"> <i class="icon-time"></i>';
			foreach ($arrayOpeninghours as $value) {
				$htmlOpeninghours = $htmlOpeninghours . $value . '</br>';
			}
			$htmlOpeninghours = $htmlOpeninghours .'</div>';
		}
		if ($email != '') {
			$i = 0;
			$htmlEmail = '<div class="iconBox"><i class="icon-envelope-alt"></i>';
			foreach ($arrayEmail as $value) {
				 $htmlEmail = $htmlEmail .' <a href="mailto:' . $value . '">' . $value . '</a></br>';
			}
			$htmlEmail = $htmlEmail .'</div>';
		}
		if ($phone != '') {
			$i = 0;
			$htmlPhone = '<div class="iconBox"><i class="icon-phone"></i>';
			foreach ($arrayPhone as $value) {
				$htmlPhone = $htmlPhone . $value;
			}
			$htmlPhone  = $htmlPhone .'</div>';
		}
		$headerHtml='';
		if($header !=''){
			$headerHtml = '<h3 class="huge" >' . $header . '</h3>';;
		}
        $cParams=array(
            'class'=>array('dashedBox','flat','contactBox')
        );
		return
			$headerHtml .'
			<div'.$this->buildContainerAttributes($cParams,$atts).'>
                <h3 class="light">
                    ' . $contacttitle . '
                    <span>' . $address . '</span>
                </h3>' .
				$htmlOpeninghours  .
				$htmlPhone  .
				$htmlEmail
				.do_shortcode($content).'
         </div>';


	}

	/**
	 * Returns config
	 *
	 * @return null
	 */
	public function getAttributes() {
		return array(
			'widgetmode' => array('default' => 'false', 'type' => false),
			'header'=> array('label' => __('header', 'ct_theme'), 'default' => '', 'type' => 'input'),
			'contacttitle' => array('label' => __('contact title', 'ct_theme'), 'default' => '', 'type' => 'input'),
			'phone' => array('label' => __('phone', 'ct_theme'), 'default' => '', 'type' => 'input', 'help' => __("separating items with a comma", 'ct_theme')),
			'email' => array('label' => __('email', 'ct_theme'), 'default' => '', 'type' => 'input', 'help' => __("separating items with a comma", 'ct_theme')),
			'address' => array('label' => __('address', 'ct_theme'), 'default' => '', 'type' => 'input'),
			'openinghours' => array('label' => __('opening hours', 'ct_theme'), 'default' => '', 'type' => "input",  'help' => __("separating items with a comma", 'ct_theme')),
			'content' => array('label' => __('content', 'ct_theme'), 'default' => '', 'type' => "textarea"),
		);
	}
}

new ctContactShortcode();